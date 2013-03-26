<?php

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	public function __construct()
	{
		Asset::add('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"');
		Asset::add('hammer', 'js/hammer.js');
		Asset::add('global', 'js/global.js');
	}

}