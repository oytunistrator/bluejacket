<?php
class Home extends Controller
{
	function index(){
		$this->html = new HTML();
		$this->view->set("title",$this->html->title(APPNAME));
		$this->view->set("pageTitle",APPNAME);
		$this->view->set("welcomeMessage","Welcome to ".APPNAME."!");
		$this->view->partial("header","Application/template/default/header.html");
		$this->view->partial("footer","Application/template/default/footer.html");
		$this->view->set("temp_dir","Application/template/default");

		$this->view->load("temp");
	}
}
?>
