<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function Encode($str){
	return base64_encode(strrev($str));
}
function Decode($str){
	return strrev(base64_decode($str));
}
?>