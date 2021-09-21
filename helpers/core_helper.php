<?php

/*Core Helpers*/

function get_base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){

     if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;

}


/*Your database connection here*/
function get_database_config(){

	return [
			'db_user'=>'root',
			'db_password'=>'',
			'db_name'=>'artist',
			'db_host'=>'localhost'
		];

}

/*Connect your database here*/
function db(){

    $db_config =  get_database_config();

    $pdo = new PDO('mysql:host='.$db_config['db_host'].';dbname='.$db_config['db_name'],$db_config['db_user'], $db_config['db_password']);

    return new \Envms\FluentPDO\Query($pdo);
}