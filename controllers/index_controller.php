<?php

class Index_Controller extends Controller {

    public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$header = new View();
		$header->Assign('username', 'xavism');
		$this->Assign('header', $header->Render('header', false));

		$menu = new View();
		$menu->Assign('username', 'Xavi');
		$this->Assign('menu', $menu->Render('menu', false));

		$content = new View();
        $registres = new Registres_Model();
        $content->Assign('registres',$registres->getRegistreById(1));
		$content->Assign('content-title', 'Bienvenido!');
		$this->Assign('content', $content->Render('content', false));

		$footer = new View();
		$this->Assign('footer', $footer->Render('footer', false));

		$this->Load_View('index');
		$this->view->Set_Site_Title('FinApps');
		
	}

}