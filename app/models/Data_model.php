<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

	public function get_all_data(){
		$jsonurl = 'app/data/data.json';
		$json = file_get_contents($jsonurl,0,null,null);
		$json_output = json_decode($json);
		return $json_output;
	}

	###################
	# CRUD DE SLIDERS #
	###################

	// Obtener todos los sliders
	public function get_sliders() {
		$output = $this->get_all_data();
		return $output->sliders;
	}

	// Crear un slider
	public function new_slider() {
		$data = array(
				'id' 		=> uniqid(),
				'title'		=> $this->input->post('title'),
				'lead'		=> $this->input->post('lead'),
				'btn_text'	=> $this->input->post('text'),
				'btn_link'	=> $this->input->post('url'),
				'order'		=> $this->input->post('order')
			);
		$jsonurl = 'app/data/data.json';
		$inp = file_get_contents($jsonurl,0,null,null);
		$tempArray = json_decode($inp,true);
		array_push($tempArray['sliders'], $data);
		$jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
		$result = file_put_contents($jsonurl, $jsonData);
	}

	// Eliminar un slider
	public function remove_slider($id) {
		$jsonurl = 'app/data/data.json';
		$inp = file_get_contents($jsonurl,0,null,null);
		$tempArray = json_decode($inp,true);
		foreach($tempArray['sliders'] as $key => $value) {
		   if($value['id'] == $id){
		      unset($tempArray['sliders'][$key]);
		   }
		};
		$jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
		$result = file_put_contents($jsonurl, $jsonData);
	}

	###################
	# CRUD DE PÁGINAS #
	###################

	// Obtener todas las páginas
	public function get_pages() {
		$output = $this->get_all_data();
		return $output->pages;
	}

	// Obtener página por slug
	public function get_page_slug($slug) {
		$output = $this->get_all_data();
		foreach ($output->pages as $page){
        	if ($page->slug != $slug ) {
        		continue;
        	} else {
        		return $page;
        	}
        }
	}

	// Obtener página por id
	public function get_page_id($id) {
		$output = $this->get_all_data();
		foreach ($output->pages as $page){
        	if ($page->id != $id ) {
        		continue;
        	} else {
        		return $page;
        	}
        }
	}

	// Crear una página
	public function new_page() {
		$data = array(
				'id' 			=> uniqid(),
				'slug'			=> $this->input->post('slug'),
				'title'			=> $this->input->post('title'),
				'date'			=> time(),
				'is_published'	=> $this->input->post('is_published')
			);
		$jsonurl = 'app/data/data.json';
		$inp = file_get_contents($jsonurl,0,null,null);
		$tempArray = json_decode($inp,true);
		array_push($tempArray['pages'], $data);
		$jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
		$result = file_put_contents($jsonurl, $jsonData);

		$mdurl = 'app/data/md/'.$data['id'].'.md';
		$result2 = file_put_contents($mdurl, $this->input->post('content'));
	}

	// Eliminar una página
	public function remove_page($id) {
		$jsonurl = 'app/data/data.json';
		$inp = file_get_contents($jsonurl,0,null,null);
		$tempArray = json_decode($inp,true);
		foreach($tempArray['pages'] as $key => $value) {
		   if($value['id'] == $id){
		      unset($tempArray['pages'][$key]);
		   }
		};
		$jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
		$result = file_put_contents($jsonurl, $jsonData);

		$mdurl = 'app/data/md/'.$id.'.md';
		$result2 = unlink($mdurl);
	}

	// Actualizar una página
	public function update_page($id) {
		$data = array(
				'slug'			=> $this->input->post('slug'),
				'title'			=> $this->input->post('title'),
				'is_published'	=> $this->input->post('is_published')
			);
		$jsonurl = 'app/data/data.json';
		$inp = file_get_contents($jsonurl,0,null,null);
		$tempArray = json_decode($inp,true);
		foreach($tempArray['pages'] as $key => $value) {
		   if($value['id'] == $id){
		   		$tempArray['pages'][$key]['slug'] = $data['slug'];
		   		$tempArray['pages'][$key]['title'] = $data['title'];
		   		$tempArray['pages'][$key]['is_published'] = $data['is_published'];
		   	}
		};
		$jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
		$result = file_put_contents($jsonurl, $jsonData);

		$mdurl = 'app/data/md/'.$id.'.md';
		$result2 = file_put_contents($mdurl, $this->input->post('content'));
	}

	####################
	# CRUD DE ENTRADAS #
	####################

	// Obtener todas las entradas
	public function get_entries() {
		$output = $this->get_all_data();
		return $output->entries;
	}

	#FIXME No se qué onda esta funcion. Parece estar repetida.
	public function get_entry($slug) {
		$output = $this->get_all_data();
		foreach ($output->entries as $entry){
        	if ($entry->slug != $slug ) {
        		continue;
        	} else {
        		return $entry;
        	}
        }
	}

	// Obtener entrada por slug
	public function get_entry_slug($slug) {
		$output = $this->get_all_data();
		foreach ($output->entries as $entry){
        	if ($entry->slug != $slug ) {
        		continue;
        	} else {
        		return $entry;
        	}
        }
	}

	// Obtener entrada por id
	public function get_entry_id($id) {
		$output = $this->get_all_data();
		foreach ($output->entries as $entry){
        	if ($entry->id != $id ) {
        		continue;
        	} else {
        		return $entry;
        	}
        }
	}

	// Crear una entrada
	public function new_entry() {
		$data = array(
				'id' 			=> uniqid(),
				'slug'			=> $this->input->post('slug'),
				'title'			=> $this->input->post('title'),
				'date'			=> time(),
				'is_published'	=> $this->input->post('is_published')
			);
		$jsonurl = 'app/data/data.json';
		$inp = file_get_contents($jsonurl,0,null,null);
		$tempArray = json_decode($inp,true);
		array_push($tempArray['entries'], $data);
		$jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
		$result = file_put_contents($jsonurl, $jsonData);

		$mdurl = 'app/data/md/'.$data['id'].'.md';
		$result2 = file_put_contents($mdurl, $this->input->post('content'));
	}

	// Eliminar una entrada
	public function remove_entry($id) {
		$jsonurl = 'app/data/data.json';
		$inp = file_get_contents($jsonurl,0,null,null);
		$tempArray = json_decode($inp,true);
		foreach($tempArray['entries'] as $key => $value) {
		   if($value['id'] == $id){
		      unset($tempArray['entries'][$key]);
		   }
		};
		$jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
		$result = file_put_contents($jsonurl, $jsonData);

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
		$jsonurl = 'app/data/data.json';
		$inp = file_get_contents($jsonurl,0,null,null);
		$tempArray = json_decode($inp,true);
		foreach($tempArray['entries'] as $key => $value) {
		   if($value['id'] == $id){
		   		$tempArray['entries'][$key]['slug'] = $data['slug'];
		   		$tempArray['entries'][$key]['title'] = $data['title'];
		   		$tempArray['entries'][$key]['is_published'] = $data['is_published'];
		   	}
		};
		$jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
		$result = file_put_contents($jsonurl, $jsonData);

		$mdurl = 'app/data/md/'.$id.'.md';
		$result2 = file_put_contents($mdurl, $this->input->post('content'));
	}

	###################
	# CRUD DE AJUSTES #
	###################

	
	
}