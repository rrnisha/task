<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['protocol'] = 'sendmail';
$config['mailpath'] = 'C:\xampp\sendmail\sendmail.exe -t';
$config['mailtype'] = 'html';
	
$config['charset'] = 'utf8';
$config['crlf'] = '\r\n';
$config['newline'] = '\r\n';
$config['wordwrap'] = FALSE;

$config["multipart"]="related";
