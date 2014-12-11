<?php
class Route
{
	public $root = array("home","index");
	public $bind = array(
		"home"=> array(
			'controller' => 'home',
			'default' => 'index',
			'custom' => false
		)
	);
	public $redirect = array(
		array("about","http://bluejacket.io/")
	);
}
?>
