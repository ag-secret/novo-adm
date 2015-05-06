<?php

namespace MyAdm\Controller;

use MyAdm\Controller\AppController;

class ErrorsController extends AppController
{


	public function notAuthorized()
	{
		$this->layout = 'ajax';
	}

}