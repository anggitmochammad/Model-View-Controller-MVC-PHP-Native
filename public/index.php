<?php  
if (!session_id()) {
	session_start();
}
require_once '../app/init.php';

//membuat object class App
$app = new App;