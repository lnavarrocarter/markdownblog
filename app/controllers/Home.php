<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Data_model');
    }

	public function index() {
		// Guardar el último release de GitHub
		$this->tools->save_latest_release();
		// Ejecutar Modelo y ponerlo en variable
        $options = $this->Data_model->get_options();
        $pages = $this->Data_model->get_published_pages();
        $entries = $this->Data_model->get_published_entries();
        $slidersdata = $this->Data_model->get_published_sliders();
        $socials = $this->jsondb->get('socials');
		// Título de la Página
		$data['title'] = $options->site_motto;
		// Vista principal a cargar
		$data['main_content'] = 'home';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = false;
		// ¿Footer?
		$data['footer'] = true;
		// Obtener el lastest release de GitHub
		$data['latest'] = $this->tools->get_latest_release();
        // Cargar la vista
        $data['options'] = $options;
        $data['pages'] = $pages;
        $data['entries'] = $entries;
        $data['socials'] = $socials; 
        $data['slidersdata'] = $slidersdata;
		$this->load->view('layouts/main', $data);
	}

	public function page($slug){
		// Ir a buscar los datos del layout
        $options = $this->Data_model->get_options();
        $pages = $this->Data_model->get_published_pages();
        $entries = $this->Data_model->get_published_entries();
        $socials = $this->jsondb->get('socials');
        // Ir a buscar los datos específicos de la página
        $pagedata = $this->Data_model->get_page_slug($slug);
		// Título de la Página
		$data['title'] = $pagedata->title;
		// Vista principal a cargar
		$data['main_content'] = 'page';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = true;
		// ¿Footer?
		$data['footer'] = true;
		// Breadcrumbs
		$this->breadcrumbs->unshift('<i class="fa fa-home fa-fw"></i> Inicio', '/');
		$this->breadcrumbs->push('Proyectos', '#');
		$this->breadcrumbs->push($pagedata->title, '/home/page/'.$pagedata->slug, true);
		$data['breadcrumb'] = $this->breadcrumbs->show();
		// Pasar markdown y el Cebe Markdown
		$data['parsedown'] = new Parsedown();
		$data['mdfile'] = $pagedata->id;
		// Obtener el lastest release de GitHub
		$data['latest'] = $this->tools->get_latest_release();
        // Cargar la vista y mandar la data
        $data['options'] = $options;
        $data['pages'] = $pages;
        $data['entries'] = $entries;
        $data['socials'] = $socials;
        $data['pagedata'] = $pagedata;
		$this->load->view('layouts/main', $data);
	}

	public function test() {
	}
}