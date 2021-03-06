<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

###################################################
# JSONDB: Una micro base de datos en formato json #
###################################################
#                                                 #
# Autor: Matías Navarro Carter                    #
#                                                 #
# Licencia: MIT                                   #
#                                                 #
###################################################

class Jsondb {

	/**
	  * Constructor
	  *
	  * @access	public
	  *
	  */
	public function __construct()
	{	
		$this->ci =& get_instance();
		// Load config file
		$this->ci->load->config('jsondb');
		// Get options
		$this->jsondb_url = $this->ci->config->item('jsondb_url');
		
		log_message('debug', "Jsondb Class Initialized");
	}

	protected function decode($array = false) {
		$json = file_get_contents($this->jsondb_url,0,null,null);
		$json_output = json_decode($json, $array);
		return $json_output;
	}

	protected function encode($data) {
		$jsonData = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents($this->jsondb_url, $jsonData);
		return;
	}

	public function new_table($name) {
		$query = $this->decode(true);
		$query[$name] = array();
		return $this->encode($query);
	}

	// Gets all the data from the json
	public function get_all() {
		$query = $this->decode();
		return $query;
	}

	/**
     * Gets all data from a table. Also an specific item (or items) if optional params are present
     * Then returns the data sorted by field if optional params are present
     *
     * @param string $table
     * @param string $field (optional)
     * @param string $value (optional)
     * @return array
     * @throws Error if field or table are not found (TODO)
     */
	public function get($table, $field = false, $value = false, $sortfield = false) {
		$query = $this->decode(true);
		$result = array();
		// Primero veo si tengo que obtener todos los datos o sólo los que ven una condición
		if($field && $value) {
			foreach ($query[$table] as $item) {
				if($item[$field] == $value) {
					$result[] = $item;
				}
	        }  
	    } else {
	    	$result = $query[$table];
	    }
		// Ordeno el result si hay campo. Si no, simplemente devuelvo.
		if ($sortfield) {
        	foreach ($result as $key => $row) {
			    $thesort[$key]  = $row[$sortfield];
			}    
        	array_multisort($thesort, SORT_ASC, $result);
        	return (object) $result;
        } else {
        	return (object) $result;
        } 
	}

	public function get_one($table, $field, $value) {
		$query = $this->decode();
		foreach ($query->$table as $item) {
			if($item->$field == $value) {
				 return $item;
			}
        } 
	}

	// Actualiza una entrada cuyo campo especificado matchea un valor con un array de datos
	public function update($table, $field, $value, $array) {
		$query = $this->decode(true);
		foreach ($query[$table] as $key => $val) {
			if ($val[$field] == $value) {
				$query[$table][$key] = array_replace($query[$table][$key], $array);	
			}
		}
		$this->encode($query);
	}

	public function update_options($data) {
		$query = $this->decode(true);
		$query['options'] = array_replace($query['options'], $data);
		$this->encode($query);
	}

	// Borra una entrada cuyo campo específicado matchea un valor
	public function delete($table, $field, $value) {
		$query = $this->decode(true);
		foreach($query[$table] as $key => $val) {
		   if($val[$field] == $value){
		      unset($query[$table][$key]);
		   }
		}
		$this->encode($query);
	}

	// Inserta una entrada (array de datos) en una tabla específico, le da un id único y devuelve ese id
	public function create($table, $data) {
		$query = $this->decode(true);
		$dbdata['id'] = uniqid();
		foreach ($data as $key => $val) {
			$dbdata[$key] = $val;
		}
		array_push($query[$table], $dbdata);
		$this->encode($query);
		return $dbdata['id'];
	}

}