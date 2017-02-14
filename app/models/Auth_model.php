<?php 

class Auth_model extends CI_Model {

	public function login($data) {
		// Obtener los datos del usuario
		$query = $this->jsondb->get_one('users','email',$data['email']);
		// Verificamos el password con Salt
		$enc_passwd = sha1($query->salt.$data['passwd']);
		// Si la query no devuelve nada, es porque el usuario no existe y se manda error
		if (!$query) {
			$this->session->set_flashdata('error', 'Correo electrónico no existe o es incorrecto.');
			redirect('auth/login');
		// Si la clave no es la misma, se manda error
		} elseif ($enc_passwd != $query->passwd) {
			$this->session->set_flashdata('error', 'Contraseña incorrecta.');
			redirect('auth/login');
		// Si el usuario no está validado, se manda error
		} elseif (!$query->is_verified) {
			$this->session->set_flashdata('error', 'Esta cuenta de usuario aún no ha sido verificada. Por favor, revise su correo electrónico en busca de su email de verificación o <a href="<?php echo base_url();?>auth/pass_recover">solicite uno nuevo</a>.');
			redirect('auth/login');
		} elseif (!$query->is_active) {
			$this->session->set_flashdata('error', 'Esta cuenta de usuario no se encuentra activa. Comuníquese con el administrador de su sistema para resvoler este asunto.');
			redirect('auth/login');
		// Si pasa todo, entonces se procede a guardar la sesión
		} else {
			$userdata = array(
					'id' 		=> $query->id,
					'email' 	=> $query->email,
					'name'		=> $query->name,
					'is_admin' 	=> $query->is_admin,
					'lastlogin'	=> $query->lastlogin,
					'ipadd'	=> $query->ipadd,
					'logged_in' => TRUE
				);
			// Ponemos el array en la sesión			
			$this->session->set_userdata($userdata);
			// Guardamos los datos de lastogin
			$data = array( 
					'lastlogin' => time(),
					'ipadd' 	=> IP_ADDR
				);
			$this->jsondb->update('users', 'id',$_SESSION['id'], $data);
			// Mandamos el mensaje de éxito y redireccionamos
			$this->session->set_flashdata('success', 'Bienvenido '.$_SESSION['name'].'. La última vez que iniciaste sesión fue el '.date('d/m/Y', $_SESSION['lastlogin']).' a las '.date('H:m:s', $_SESSION['lastlogin']).', desde '.$_SESSION['ipadd'].'');
			redirect('admin/settings');
		}
	}

	public function create_user($data) {
		$data['salt'] = uniqid();
		$data['passwd'] = sha1($data['salt'].$data['passwd']); 
		$query = $this->jsondb->create('users',$data);
		return $query;
	}

	public function validate_user($validation_code) {
		$this->db->where('validation_code',$validation_code);
		$validation_db = $this->db->get('users')->row()->validation_code;
		if ($validation_db !== $validation_code) {
			return FALSE;
		} else {
			$this->db->where('validation_code',$validation_code);
			$data = array(
					'validation_code' 	=> NULL,
					'is_validated'		=> 1,
				);
			$result = $this->db->update('users',$data);
			return $result;
		}
	}

	public function pass_recover_start($email, $recovery_code) {
		$this->db->where('email',$email);
		$query = $this->db->get('users');
		if (!$query->result()) {
			return FALSE;	
		} else {
			$this->db->where('email',$email);
			$data = array(
				'recovery_code' => $recovery_code
			);
			$query = $this->db->update('users',$data);
			return $query;		
		}
	}

	public function recovery_code_check($data) {
		$this->db->where('recovery_code',$data);
		$query = $this->db->get('users')->row();
		return $query;
	}

	public function password_update($user_id) {
		// Pongo los input en variables
		$password = $this->input->post('password');
		// Encripto el password
		$hash = password_hash($password, PASSWORD_BCRYPT);
		// Hago el array
		$data = array(
				'password' 		=> $hash,
				'recovery_code' => NULL
			);
		// Busco en la BD
		$this->db->where('id',$user_id);
		// Actualizo
		$query = $this->db->update('users',$data);
		$query2 = $this->db->get('users')->row()->email;
		return $query2;
	}
}