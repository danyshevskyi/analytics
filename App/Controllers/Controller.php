<?php

namespace Analytics\App\Controllers;

use Auth\App\Models\Auth;
use Analytics\App\Models\View;
use Analytics\App\Models\Migration;

class Controller {

public function main() {
		
	$auth = new Auth();
		$view = new View();
	
		if($auth->check())
		{
			$data = $view->viewMain();
				$this->view('content_auth.php', ['projectsList' => $data]);
		} 
		else
		{
			$data = $view->viewMain();
				$this->view('content_notauth.php', ['projectsList' => $data]);
		}
}

public function getAnalytics($project, $period) {

	$view = new View();
		$view->getAnalytics($project, $period);
}

public function migration() {
	$migration = new Migration();
		$migration->migration();
}

public function view($file, array $data) {	
	$loader = new \Twig\Loader\FilesystemLoader('../App/Views');	
		$twig = new \Twig\Environment($loader);
			echo $twig->render($file, $data);
}

}
