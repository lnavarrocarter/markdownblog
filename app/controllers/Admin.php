<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        // Verifica si hay sesión inciada
        if(!$_SESSION['logged_in']){
        	redirect('error/404');
        }
        $this->load->model('Data_model');
    }

    ########################################
    # FUNCIONES RELACIONADAS A LOS SLIDERS #
    ########################################

    // La vista que lista los sliders
    public function sliders(){
		// Ir a buscar los datos
        $options = $this->Data_model->get_options();
        $pages = $this->Data_model->get_published_pages();
        $entries = $this->Data_model->get_published_entries();
        $socials = $this->jsondb->get('socials');
        $sliderdata = $this->Data_model->get_sliders();
		// Título de la Página
		$data['title'] = 'Administrar Sliders';
		// Vista principal a cargar
		$data['main_content'] = 'admin/sliders';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = true;
		// ¿Footer?
		$data['footer'] = true;
		// Breadcrumbs
		$this->breadcrumbs->unshift('<i class="fa fa-home fa-fw"></i> Inicio', '/');
		$this->breadcrumbs->push('Administrar', '#');
		$this->breadcrumbs->push('Sliders', '/admin/sliders/', true);
		$data['breadcrumb'] = $this->breadcrumbs->show();
		// Obtener el lastest release de GitHub
		$data['latest'] = $this->tools->get_latest_release();
        // Cargar la vista
        $data['options'] = $options;
        $data['pages'] = $pages;
        $data['entries'] = $entries;
        $data['socials'] = $socials;
        $data['sliderdata'] = $sliderdata;
		$this->load->view('layouts/main', $data);
	}

	// La función que crea un slider
	public function create_slider() {
		$this->Data_model->new_slider();
		$this->session->set_flashdata('success','Se ha creado el nuevo slider correctamente.');
		redirect('admin/sliders');
	}

	// La función que elimina un slider
	public function delete_slider($id) {
		$this->Data_model->remove_slider($id);
		$this->session->set_flashdata('success','Se ha eliminado el slider correctamente.');
		redirect('admin/sliders');
	}

	//TODO La función que edita un slider
	public function edit_slider($id) {

	}

	####################################
	# FUNCIONES RELACIONADAS A PÁGINAS #
	####################################

	// La vista que lista las páginas
	public function pages(){
		// Ir a buscar los datos
        $options = $this->Data_model->get_options();
        $pages = $this->Data_model->get_published_pages();
        $entries = $this->Data_model->get_published_entries();
        $socials = $this->jsondb->get('socials');
        $pagedata = $this->Data_model->get_pages();
		// Título de la Página
		$data['title'] = 'Administrar Páginas';
		// Vista principal a cargar
		$data['main_content'] = 'admin/pages';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = true;
		// ¿Footer?
		$data['footer'] = true;
		// Breadcrumbs
		$this->breadcrumbs->unshift('<i class="fa fa-home fa-fw"></i> Inicio', '/');
		$this->breadcrumbs->push('Administrar', '#');
		$this->breadcrumbs->push('Páginas', '/admin/pages/', true);
		$data['breadcrumb'] = $this->breadcrumbs->show();
		// Obtener el lastest release de GitHub
		$data['latest'] = $this->tools->get_latest_release();
        // Cargar la vista
        $data['options'] = $options;
        $data['pages'] = $pages;
        $data['entries'] = $entries;
        $data['socials'] = $socials;
        $data['pagedata'] = $pagedata;
		$this->load->view('layouts/main', $data);
	}

	// La vista para crear la página
	public function create_page() {
		// Ir a buscar los datos
        $options = $this->Data_model->get_options();
        $pages = $this->Data_model->get_published_pages();
        $entries = $this->Data_model->get_published_entries();
        $socials = $this->jsondb->get('socials');
		// Título de la Página
		$data['title'] = 'Nueva Página';
		// Vista principal a cargar
		$data['main_content'] = 'admin/new_page';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = true;
		// ¿Footer?
		$data['footer'] = true;
		// Breadcrumbs
		$this->breadcrumbs->unshift('<i class="fa fa-home fa-fw"></i> Inicio', '/');
		$this->breadcrumbs->push('Administrar', '#');
		$this->breadcrumbs->push('Páginas', '/admin/pages/', true);
		$this->breadcrumbs->push('Nueva Página', '/admin/create_page/', true);
		$data['breadcrumb'] = $this->breadcrumbs->show();
		// Obtener el lastest release de GitHub
		$data['latest'] = $this->tools->get_latest_release();
        // Cargar la vista
        $data['options'] = $options;
        $data['pages'] = $pages;
        $data['entries'] = $entries;
        $data['socials'] = $socials;
		$this->load->view('layouts/main', $data);
	}

	// La función que publica una página
	public function publish_page() {
		$this->Data_model->new_page();
		$this->session->set_flashdata('success','Su nueva página ha sido publicada correctamente.');
		redirect('admin/pages');
	}

	// La función que elimina una página
	public function delete_page($id) {
		$this->Data_model->remove_page($id);
		$this->session->set_flashdata('success','Su página se ha eliminado correctamente.');
		redirect('admin/pages');
	}

	// La vista para editar una página
	public function edit_page($id) {
		// Ir a buscar los datos
        $options = $this->Data_model->get_options();
        $pages = $this->Data_model->get_published_pages();
        $entries = $this->Data_model->get_published_entries();
        $socials = $this->jsondb->get('socials');
        $pagedata = $this->Data_model->get_page_id($id);
		// Título de la Página
		$data['title'] = 'Editar Página';
		// Vista principal a cargar
		$data['main_content'] = 'admin/edit_page';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = true;
		// ¿Footer?
		$data['footer'] = true;
		// Breadcrumbs
		$this->breadcrumbs->unshift('<i class="fa fa-home fa-fw"></i> Inicio', '/');
		$this->breadcrumbs->push('Administrar', '#');
		$this->breadcrumbs->push('Páginas', '/admin/pages/', true);
		$this->breadcrumbs->push('Editar Página', '/admin/edit_page/', true);
		$data['breadcrumb'] = $this->breadcrumbs->show();
		// Obtener el lastest release de GitHub
		$data['latest'] = $this->tools->get_latest_release();
        // Cargar la vista
        $data['options'] = $options;
        $data['pages'] = $pages;
        $data['entries'] = $entries;
        $data['socials'] = $socials;
        $data['pagedata'] = $pagedata;
		$this->load->view('layouts/main', $data);
	}

	// La función que actualiza una página
	public function update_page($id) {
		$this->Data_model->update_page($id);
		$this->session->set_flashdata('success','Tu página ha sido editada exitosamente.');
		redirect('admin/pages');
	}

	#####################################
	# FUNCIONES RELACIONADAS A ENTRADAS #
	#####################################

	// La vista que lista las entradas
	public function entries(){
		// Ir a buscar los datos
        $options = $this->Data_model->get_options();
        $pages = $this->Data_model->get_published_pages();
        $entries = $this->Data_model->get_published_entries();
        $socials = $this->jsondb->get('socials');
        $entriesdata = $this->Data_model->get_entries();
		// Título de la Página
		$data['title'] = 'Administrar Entradas';
		// Vista principal a cargar
		$data['main_content'] = 'admin/entries';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = true;
		// ¿Footer?
		$data['footer'] = true;
		// Breadcrumbs
		$this->breadcrumbs->unshift('<i class="fa fa-home fa-fw"></i> Inicio', '/');
		$this->breadcrumbs->push('Administrar', '#');
		$this->breadcrumbs->push('Entradas', '/admin/entries/', true);
		$data['breadcrumb'] = $this->breadcrumbs->show();
		// Obtener el lastest release de GitHub
		$data['latest'] = $this->tools->get_latest_release();
        // Cargar la vista
        $data['options'] = $options;
        $data['pages'] = $pages;
        $data['entries'] = $entries;
        $data['socials'] = $socials;
        $data['entriesdata'] = $entriesdata;
		$this->load->view('layouts/main', $data);
	}

	// La vista para crear la entrada
	public function create_entry() {
		// Ir a buscar los datos
        $options = $this->Data_model->get_options();
        $pages = $this->Data_model->get_published_pages();
        $entries = $this->Data_model->get_published_entries();
        $socials = $this->jsondb->get('socials');
		// Título de la Página
		$data['title'] = 'Nueva Entrada';
		// Vista principal a cargar
		$data['main_content'] = 'admin/new_entry';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = true;
		// ¿Footer?
		$data['footer'] = true;
		// Breadcrumbs
		$this->breadcrumbs->unshift('<i class="fa fa-home fa-fw"></i> Inicio', '/');
		$this->breadcrumbs->push('Administrar', '#');
		$this->breadcrumbs->push('Entradas', '/admin/entries/', true);
		$this->breadcrumbs->push('Nueva Entrada', '/admin/create_entry/', true);
		$data['breadcrumb'] = $this->breadcrumbs->show();
		// Obtener el lastest release de GitHub
		$data['latest'] = $this->tools->get_latest_release();
        // Cargar la vista
        $data['options'] = $options;
        $data['pages'] = $pages;
        $data['entries'] = $entries;
        $data['socials'] = $socials;
		$this->load->view('layouts/main', $data);
	}

	// La función que publica una entrada
	public function publish_entry() {
		$this->Data_model->new_entry();
		$this->session->set_flashdata('success','Su nueva entrada ha sido publicada correctamente.');
		redirect('admin/entries');
	}

	// La función que elimina una entrada
	public function delete_entry($id) {
		$this->Data_model->remove_entry($id);
		$this->session->set_flashdata('success','Su entrada se ha eliminado correctamente.');
		redirect('admin/entries');
	}

	// La vista que edita una entrada
	public function edit_entry($id) {
		// Ir a buscar los datos
        $options = $this->Data_model->get_options();
        $pages = $this->Data_model->get_published_pages();
        $entries = $this->Data_model->get_published_entries();
        $socials = $this->jsondb->get('socials');
        $entrydata = $this->Data_model->get_entry_id($id);
		// Título de la Página
		$data['title'] = 'Editar Entrada';
		// Vista principal a cargar
		$data['main_content'] = 'admin/edit_entry';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = true;
		// ¿Footer?
		$data['footer'] = true;
		// Breadcrumbs
		$this->breadcrumbs->unshift('<i class="fa fa-home fa-fw"></i> Inicio', '/');
		$this->breadcrumbs->push('Administrar', '#');
		$this->breadcrumbs->push('Entradas', '/admin/entries/', true);
		$this->breadcrumbs->push('Editar Entrada', '/admin/edit_entry/', true);
		$data['breadcrumb'] = $this->breadcrumbs->show();
		// Obtener el lastest release de GitHub
		$data['latest'] = $this->tools->get_latest_release();
        // Cargar la vista
        $data['options'] = $options;
        $data['pages'] = $pages;
        $data['entries'] = $entries;
        $data['socials'] = $socials;
        $data['entrydata'] = $entrydata;
		$this->load->view('layouts/main', $data);
	}

	// La función que actualiza una entrada
	public function update_entry($id) {
		$this->Data_model->update_entry($id);
		$this->session->set_flashdata('success','Tu entrada ha sido editada exitosamente.');
		redirect('admin/entries');
	}

	####################################|
	# FUNCIONES RELACIONADAS A AJUSTES #
	####################################

	// La vista que muestra las opciones
	public function settings() {
		// Ir a buscar los datos
        $options = $this->Data_model->get_options();
        $pages = $this->Data_model->get_published_pages();
        $entries = $this->Data_model->get_published_entries();
        $socials = $this->jsondb->get('socials');
		// Título de la Página
		$data['title'] = 'Ajustes';
		// Vista principal a cargar
		$data['main_content'] = 'admin/settings';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = true;
		// ¿Footer?
		$data['footer'] = true;
		// Breadcrumbs
		$this->breadcrumbs->unshift('<i class="fa fa-home fa-fw"></i> Inicio', '/');
		$this->breadcrumbs->push('Administrar', '#');
		$this->breadcrumbs->push('Ajustes', '/admin/ajustes/', true);
		$data['breadcrumb'] = $this->breadcrumbs->show();
		// Obtener el lastest release de GitHub
		$data['latest'] = $this->tools->get_latest_release();
        // Cargar la vista
        $data['options'] = $options;
        $data['pages'] = $pages;
        $data['entries'] = $entries;
        $data['socials'] = $socials;
		$this->load->view('layouts/main', $data);
	}

	// La función que guarda las opciones
	public function save_settings() {
		$data = array();
		foreach ($_POST as $key => $val){
			$data[htmlspecialchars($key)] = htmlspecialchars($val); 
		}
		$this->Data_model->update_options($data);

		$this->session->set_flashdata('success', 'Tus ajustes se han guardado existosamente.');
		redirect ('admin/settings');
	}

	#########################################
	# FUNCIONES RELACIONADAS A LOS USUARIOS #
	#########################################

	// Carga la vista que lista los usuarios
	public function users() {
		// Ir a buscar los datos
        $options = $this->Data_model->get_options();
        $pages = $this->Data_model->get_published_pages();
        $entries = $this->Data_model->get_published_entries();
        $socials = $this->jsondb->get('socials');
        $usersdata = $this->Data_model->get_users();
		// Título de la Página
		$data['title'] = 'Administrar Usuarios';
		// Vista principal a cargar
		$data['main_content'] = 'admin/users';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = true;
		// ¿Footer?
		$data['footer'] = true;
		// Breadcrumbs
		$this->breadcrumbs->unshift('<i class="fa fa-home fa-fw"></i> Inicio', '/');
		$this->breadcrumbs->push('Administrar', '#');
		$this->breadcrumbs->push('Usuarios', '/admin/entries/', true);
		$data['breadcrumb'] = $this->breadcrumbs->show();
		// Obtener el lastest release de GitHub
		$data['latest'] = $this->tools->get_latest_release();
        // Cargar la vista
        $data['options'] = $options;
        $data['pages'] = $pages;
        $data['entries'] = $entries;
        $data['socials'] = $socials;
        $data['usersdata'] = $usersdata;
		$this->load->view('layouts/main', $data);
	}

	// Carga la vista de creación de usuario
	public function new_user() {

	}

	// Carga la vista del perfil de usuario 
	public function user() {

	}

	// Ejecuta la función que crea un usuario
	public function create_user($data) {
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

}