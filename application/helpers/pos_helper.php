<?php
if ( ! function_exists('codeProduk')){
    function codeProduk(){
        $ci =& get_instance();
        $ci->load->database();
        $ci->db->select_max('kode_barang','maxCode');
		$result = $ci->db->get('tb_barang')->row();


		$code = $ci->db->get_where('tb_costum_code',['id' => 1])->row(); //BRG
		$countCode = strlen($code->produk_code);
		$noUrut = (int) substr($result->maxCode, $countCode);
		$noUrut++;
		return $code->produk_code . sprintf("%05s", $noUrut);
    }
}
if ( ! function_exists('time_elapsed_string')){
    function time_elapsed_string($datetime, $full = false) {
    	date_default_timezone_set('Asia/Jakarta');
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
}
