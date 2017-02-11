<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Data_model');
    }

	public function index() {
		// Ejecutar Modelo y ponerlo en variable
        $sitedata = $this->Data_model->get_all_data();
		// Título de la Página
		$data['title'] = $sitedata->options->site_motto;
		// Vista principal a cargar
		$data['main_content'] = 'home';
		// ¿Navbar?
		$data['navbar'] = true;
		// ¿Barra de título?
		$data['pagetitle'] = false;
		// ¿Footer?
		$data['footer'] = true;
        // Cargar la vista
        $data['sitedata'] = $sitedata;
		$this->load->view('layouts/main', $data);
	}

	public function page($slug){
		// Ir a buscar los datos
        $sitedata = $this->Data_model->get_all_data();
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
		$this->breadcrumbs->unshift('<i class="ion-home"></i> Inicio', '/');
		$this->breadcrumbs->push('Proyectos', '#');
		$this->breadcrumbs->push($pagedata->title, '/home/page/'.$pagedata->slug, true);
		$data['breadcrumb'] = $this->breadcrumbs->show();
		// Pasar markdown y el parsedown
		$data['parsedown'] = new ParsedownExtra();
		$data['mdfile'] = $pagedata->id;
        // Cargar la vista
        $data['pagedata'] = $pagedata;
        $data['sitedata'] = $sitedata;
		$this->load->view('layouts/main', $data);
	}

	public function test() {
		$query = $this->jsondb->create('entries',array('name' => 'Jose Pedro','slug' => 'nolose'));
		echo '<pre>';
		print_r($query);
		exit;
	}
}
