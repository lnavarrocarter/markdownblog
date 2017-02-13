<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

	function __construct() {
        parent::__construct();
        // Cargar el modelo de este controlador
        $this->load->model('Auth_model');
        // Cargar el Data_model
        $this->load->model('Data_model');
    }

	###################################
	# FUNCIONES RELATIVAS A LA SESIÓN #
	###################################

	// Carga la vista de inicio de sesión
	public function login(){
		// Título de la Página
		$data['title'] = 'Iniciar Sesión';
		// Vista principal a cargar
		$data['main_content'] = 'auth/login';
		// ¿Navbar?
		$data['navbar'] = false;
		// ¿Barra de título?
		$data['pagetitle'] = false;
		// ¿Footer?
		$data['footer'] = false;
		//
		$data['options'] = $this->Data_model->get_options();
        // Cargar la vista
		$this->load->view('layouts/main', $data);
	}

	// Función que ejecuta el procedimiento de inicio de sesión
	public function login_action() {
		$this->form_validation->set_rules('email', 'correo electrónico', 'trim|required|min_length[3]|max_length[25]|valid_email');
		$this->form_validation->set_rules('passwd', 'contraseña', 'trim|required|min_length[3]|max_length[15]');
		// Si la validación falló, colocamos un mensaje de error y mandamos de vuelta a la página
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Hay problemas con algunos campos.');
			redirect('auth/login');
		// Comprobamos el recapcha
		} elseif (!$this->tools->captcha_check($this->input->post('g-recaptcha-response'))) {
			$this->session->set_flashdata('error', 'Hay problemas con el captcha.');
			redirect('auth/login');
		// Si la validación pasa, entonces ejecutamos el modal
		} else {
			// Ponemos los input post en un array
			$data = array (
					'email' => $this->input->post('email'),
					'passwd' => $this->input->post('passwd')
				);
			// Luego los mando al modelo
			$result = $this->Auth_model->login($data);
		}
	}

	// Función que ejecuta el procedimiento de cierre de sesión
	public function logout() {
		$this->session->sess_destroy();
		redirect('');
	}

	#######################################
	# FUNCIONES PARA REGISTRO DE USUARIOS #
	#######################################

	// Carga la vista de registro de usuario
	public function register_user() {
		$data['title'] = 'Registro de Usuario';
		$data['main_content'] = 'auth/register_user';
		$this->load->view('layouts/main',$data);
	}

	// Ejectuta el procedimiento para el registro de un nuevo usuario
	public function register_user_action() {
		// Validar el formulario 
		$this->form_validation->set_rules('name', 'Nombre', 'required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('email', 'Correo Electrónico', 'trim|required|min_length[3]|max_length[30]|valid_email');
		$this->form_validation->set_rules('username', 'Nombre de Usuario', 'trim|required|min_length[3]|max_length[15]');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[3]|max_length[15]');
		$this->form_validation->set_rules('password2', 'Confirmación Contraseña', 'trim|required|min_length[3]|max_length[15]|matches[password]');
		$this->form_validation->set_error_delimiters('', '');
		// Si la validación falló, colocamos un mensaje de error y mandamos de vuelta a la página
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Hay problemas con algunos campos: '.validation_errors());
			redirect('auth/register_user');
		// Si la validación pasa, entonces ejecutamos el modal
		} else {
			// Ponemos los input post en variables
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			// Encripto el password
			$hash = password_hash($password, PASSWORD_BCRYPT);
			// Creo un código de validación a partir random string alfanumérico de 10 carácteres
			$validation = random_string('alnum', 20);
			// Guardo los datos en un array
			$data = array(
					'username' 			=> $username,
					'email'				=> $email,
					'password'			=> $hash,
					'name'				=> $name,
					'is_admin'			=> 0,
					'validation_code'	=> $validation,
					'is_validated'		=> 0
				);
			// Ejecuto el modelo que hace el insert y le paso el array
			$result = $this->Auth_model->create_user($data);
			// Si hay errores, lo mandamos al inicio de sesión 
			if (!$result) {
				$this->session->set_flashdata('error','Ha habido un problema escribiendo en la base de datos. Por favor intente nuevamente.');
				redirect('register_user');
			// Si todo está bien, se pasa al envío del correo de confirmación
			} else {
				// Envío el correo
				$this->email->from('info@ncai.cl', 'Ncai SpA');
				$this->email->to($email);
				$this->email->subject('Activación de Cuenta en Ncai SpA');
				$body = $this->load->view('email/auth_validate',$data,TRUE);
				$this->email->message($body);
				// Si el correo no se envió bien, pongo error
				if (!$this->email->send()) {
					echo 'Ocurrió un error enviando el email.';
				}
				$this->session->set_flashdata('success', 'Te has registrado exitosamente. Revisa tu correo electrónico para activar tu cuenta.');
				redirect('auth');
			}
		}
	}

	// Ejecuta el procedimiento para activar usuario registrado y que así se pueda loggear
	public function register_validate($validation_code){
		// Si no hay un validation_code no lo dejo pasar
		if (!$validation_code) {
			redirect('errors/404');
		} else {
			$result = $this->Auth_model->validate_user($validation_code);
			// Si no resulta la query, mandar un mensaje de error y devolver al login
			if($result == FALSE) {
				$this->session->set_flashdata('error', 'Token inválido o ya utlizado.');
				redirect('auth');
			// Si sale bien, se manda al login diciendo que ya puede iniciar sesión con su usuario y contraseña
			} else {
				$this->session->set_flashdata('success', 'Tu cuenta ha sido activada. Ahora puedes iniciar sesión con el usuario y la contraseña con los cuales te registraste.');
				redirect('auth');
			}
		}
	}

	public function create_user_action($data) {
		$data = array(
				'name' 			=> 'Matías Navarro',
				'email' 		=> 'mnavarrocarter@gmail.com',
				'passwd'		=> 'Servusdei@1988',
				'is_admin'		=> true,
				'created'		=> time(),
				'lastlogin'		=> null,
				'ipadd'			=> IP_ADDR,
				'is_verified' 	=> true,
				'is_active'		=> true
			);
		$this->Auth_model->create_user($data);
	}

	#######################################
	# FUNCIONES PARA RECUPERAR CONTRASEÑA #
	#######################################

	// Carga la vista de recuperación de contraseña
	public function pass_recover() {
		$data['title'] = 'Recuperar Contraseña';
		$data['main_content'] = 'auth/pass_recover';
		$this->load->view('layouts/mail',$data);
	}

	// Ejecuta todo el procedimiento de recuperación (verificación, creación token, envio email)
	public function pass_recover_action() {
		$this->form_validation->set_rules('email', 'Correo Electrónico', 'trim|required|min_length[3]|max_length[30]|valid_email');
		$this->form_validation->set_error_delimiters('', '');
		// Si la validación falló, colocamos un mensaje de error y mandamos de vuelta a la página
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Hay problemas con algunos campos: '.validation_errors());
			redirect('auth/pass_recover');
		// Si la validación pasa, entonces ejecutamos el modal
		} else {
			$data['email'] = $this->input->post('email');
			// Generar un código de recuperación 
			$data['recovery_code'] = random_string('alnum', 20);
			$result = $this->Auth_model->pass_recover_start($data['email'], $data['recovery_code']);
			if (!$result) {
				$this->session->set_flashdata('error', 'No tenemos ninguna cuenta asociada a esa dirección de correo.');
				redirect('auth/pass_recover');
			} else {
				// Envío el correo
				$this->email->from('info@ncai.cl', 'Ncai SpA');
				$this->email->to($data['email']);
				$this->email->subject('Reestablecimiento de Contraseña en Ncai SpA');
				$body = $this->load->view('email/auth_recover',$data,TRUE);
				$this->email->message($body);
				// Si el correo no se envió bien, pongo error
				if (!$this->email->send()) {
					echo 'Ocurrió un error enviando el email.';
				}
				$this->session->set_flashdata('success', 'Se te ha enviado un correo electrónico a la cuenta que has especificado con instrucciones para reestablecer tu contraseña.');
				redirect('auth');
			}
		}
	}

	// Carga la vista de elección de nueva contraseña
	public function pass_restore($recovery_code) {
		if (!$recovery_code) {
			redirect('errors/404');
		} else {
			$result = $this->Auth_model->recovery_code_check($recovery_code);
			if (!$result) {
				$this->session->set_flashdata('error', 'Token inválido o ya utlizado.');
				redirect('auth');
			} else {
				$data['title'] = 'Nueva Contraseña';
				$data['main_content'] = 'auth/pass_restore';
				$data['user_id'] = $result->id;
				$this->load->view('layouts/main',$data);
			}
		}
	}

	// Ejecuta el procedimiento de cambio de contraseña (actualiza la db, envia email al usuario)
	public function pass_restore_action($user_id) {
		if(!$user_id) {
			redirect('errors/404');
		} else {
			$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[3]|max_length[15]');
			$this->form_validation->set_rules('password2', 'Confirmación Contraseña', 'trim|required|min_length[3]|max_length[15]|matches[password]');
			// Si la validación falló, colocamos un mensaje de error y mandamos de vuelta a la página
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error', 'Hay problemas con algunos campos: '.validation_errors());
				redirect('auth/pass_restore/'.$recovery_code);
			// Si la validación pasa, entonces ejecutamos el modal
			} else {
				$result = $this->Auth_model->password_update($user_id);
				if (!$result) {
					$this->session->set_flashdata('error', 'No pudimos cambiar tu contraseña.');
					redirect('auth');
				} else {
					// Envío el correo
					$this->email->from('info@ncai.cl', 'Ncai SpA');
					$this->email->to($result);
					$this->email->subject('Contraseña Reestablecida con Éxito');
					$body = $this->load->view('email/auth_success','',TRUE);
					$this->email->message($body);
					// Si el correo no se envió bien, pongo error
					if (!$this->email->send()) {
						echo 'Ocurrió un error enviando el email.';
					}
					$this->session->set_flashdata('success', 'Has cambiado tu contraseña satisfactoriamente.');
					redirect('auth');
				}
			}
		}
	}
}