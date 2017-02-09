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
}