<?php

use Analytics\App\Controllers\Controller;
use Analytics\App\Models\Count;

Flight::route('GET /analytics', function() {

	// Analytics
	$count = new Count('analytics', 'all');
		$count->count();

	$controller = new Controller();
		$controller->main();
});

Flight::route('POST /analytics', function() {

	// Analytics
	$count = new Count('analytics', 'all');
		$count->count();

	$period = Flight::request()->data->period;
		$project = Flight::request()->data->project;

	$controller = new Controller();

		if(isset($period)) {
			$controller->getAnalytics($project, $period);
		}
});

Flight::route('GET /analytics/migration', function() {

	$controller = new Controller();	
		$controller->migration();
});
