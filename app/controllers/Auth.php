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
		/*} elseif (!$this->tools->captcha_check($this->input->post('g-recaptcha-response'))) {
			$this->session->set_flashdata('error', 'Hay problemas con el captcha.');
			redirect('auth/login');
		// Si la validación pasa, entonces ejecutamos el modal*/
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