<?php

namespace AdmPlugin\Controller;

use AdmPlugin\Controller\AppController;

class ErrorsController extends AppController
{


	public function notAuthorized()
	{
		$this->layout = 'ajax';
	}

}