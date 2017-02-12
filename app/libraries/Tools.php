<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tools {

	public function calculate_time_from($datetime, $full = false) {
	    $now = new DateTime(date("Y-m-d H:i:s"));
	    $ago = new DateTime(date("Y-m-d H:i:s", $datetime));
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'año',
	        'm' => 'mes',
	        'w' => 'semana',
	        'd' => 'día',
	        'h' => 'hora',
	        'i' => 'minuto',
	        's' => 'segundo',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? 'hace '. implode(', ', $string) : 'justo ahora';
	}

	public function save_latest_release() {
		$url = 'https://api.github.com/repos/mnavarrocarter/markdownblog/releases/latest';
		// Get cURL resource
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $url,
		    CURLOPT_USERAGENT => 'Request for Latest Release',
		    CURLOPT_SSL_VERIFYPEER => false
		));
		//
		$error = curl_error($curl);
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		file_put_contents('app/data/latest.json', $resp);
	}

	public function get_latest_release() {
		$json = file_get_contents('app/data/latest.json',0,null,null);
		$data = json_decode($json);
		return $data;
	}
}