<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

	public function get_all_data(){
		$query = $this->jsondb->get_all();
		return $query;
	}

	###################
	# CRUD DE SLIDERS #
	###################

	// Obtener todos los sliders por orden
	public function get_sliders() {
		$query = $this->jsondb->get('sliders',false,false,'order');
		return $query;
	}

	// Obtener todos los sliders publicados por orden
	public function get_published_sliders() {
		$query = $this->jsondb->get('sliders','is_published','on','order');
		return $query;
	}

	// Crear un slider
	public function new_slider() {
		$data = array(
				'title'			=> $this->input->post('title'),
				'lead'			=> $this->input->post('lead'),
				'btn_text'		=> $this->input->post('text'),
				'btn_link'		=> $this->input->post('url'),
				'is_published' 	=> filter_var($this->input->post('is_published') , FILTER_VALIDATE_BOOLEAN),
				'order'			=> filter_var($this->input->post('order') , FILTER_VALIDATE_BOOLEAN)
			);
		$this->jsondb->create('sliders', $data);
	}

	// Eliminar un slider
	public function remove_slider($id) {
		$this->jsondb->delete('sliders','id',$id);
	}

	// Obtener un slider por id
	public function get_slider_id($id) {
		$query = $this->jsondb->get_one('sliders', 'id', $id);
		return $query;
	}

	###################
	# CRUD DE PÁGINAS #
	###################

	// Obtener todas las páginas ordenadas por fecha
	public function get_pages() {
		$query = $this->jsondb->get('pages',false, false, 'date');
		return $query;
	}

	// Obtener todas las páginas publicadas ordenadas por orden
	public function get_published_pages() {
		$query = $this->jsondb->get('pages', 'is_published', 'on','order');
		return $query;
	}

	// Obtener página por slug
	public function get_page_slug($slug) {
		$query = $this->jsondb->get_one('pages','slug',$slug);
		return $query;
	}

	// Obtener página por id
	public function get_page_id($id) {
		$query = $this->jsondb->get_one('pages','id',$id);
		return $query;
	}

	// Crear una página
	public function new_page() {
		$data = array(
				'slug'			=> $this->input->post('slug'),
				'title'			=> $this->input->post('title'),
				'date'			=> time(),
				'order'			=> filter_var($this->input->post('order') , FILTER_VALIDATE_BOOLEAN),
				'is_published'	=> filter_var($this->input->post('is_published') , FILTER_VALIDATE_BOOLEAN)
			);
		
		$id = $this->jsondb->create('pages', $data);

		$mdurl = 'app/data/md/'.$id.'.md';
		$result2 = file_put_contents($mdurl, $this->input->post('content'));
	}

	// Eliminar una página
	public function remove_page($id) {
		$this->jsondb->delete('pages','id',$id);

		$mdurl = 'app/data/md/'.$id.'.md';
		$result2 = unlink($mdurl);
	}

	// Actualizar una página
	public function update_page($id) {
		$data = array(
				'slug'			=> $this->input->post('slug'),
				'title'			=> $this->input->post('title'),
				'is_published'	=> filter_var($this->input->post('is_published') , FILTER_VALIDATE_BOOLEAN)
			);
		
		$this->jsondb->update('pages','id',$id, $data);

		$mdurl = 'app/data/md/'.$id.'.md';
		$result2 = file_put_contents($mdurl, $this->input->post('content'));
	}

	####################
	# CRUD DE ENTRADAS #
	####################

	// Obtener todas las entradas ordenadas por fecha
	public function get_entries() {
		$query = $this->jsondb->get('entries',false, false, 'date');
		return $query;
	}

	// Obtener todas las entradas publicadas ordenadas por fecha
	public function get_published_entries() {
		$query = $this->jsondb->get('entries', 'is_published', 'on', 'date');
		return $query;
	}

	// Obtener entrada por slug
	public function get_entry_slug($slug) {
		$query = $this->jsondb->get_one('entries', 'slug', $slug);
		return $query;
	}

	// Obtener entrada por id
	public function get_entry_id($id) {
		$query = $this->jsondb->get_one('entries', 'id', $id);
		return $query;
	}

	// Crear una entrada
	public function new_entry() {
		$data = array(
				'slug'			=> $this->input->post('slug'),
				'title'			=> $this->input->post('title'),
				'date'			=> time(),
				'is_published'	=> filter_var($this->input->post('is_published') , FILTER_VALIDATE_BOOLEAN)
			);
		$id = $this->jsondb->create('entries', $data);

		$mdurl = 'app/data/md/'.$id.'.md';
		$result2 = file_put_contents($mdurl, $this->input->post('content'));
	}

	// Eliminar una entrada
	public function remove_entry($id) {
		$this->jsondb->remove('entries', 'id', $id);

		$mdurl = 'app/data/md/'.$id.'.md';
		$result2 = unlink($mdurl);
	}

	// Actualizar una entrada
	public function update_entry($id) {
		$data = array(
				'slug'			=> $this->input->post('slug'),
				'title'			=> $this->input->post('title'),
				'is_published'	=> $this->input->post('is_published')
			);
		$this->jsondb->update('entries', 'id', $id, $data);	

		$mdurl = 'app/data/md/'.$id.'.md';
		$result2 = file_put_contents($mdurl, $this->input->post('content'));
	}

	###################
	# CRUD DE AJUSTES #
	###################

	// Obtener los ajustes
	public function get_options() {
		$query = $this->jsondb->get('options');
		return $query;
	}

	// Actualizar los ajustes
	public function update_options($data) {
		$this->jsondb->update_options($data);
	}

	####################
	# CRUD DE USUARIOS #
	####################

	// Obtiene un usuario
	public function get_users() {
		$query = $this->jsondb->get('users', false, false, 'created');
		return $query;
	} 
	
}