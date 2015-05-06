<?php

namespace Adm\View\Cell;

use Cake\View\Cell;

class HeaderCell extends Cell
{

	public function display()
	{
		$options = [
			'appName' => 'Interagir',
			'logoLink' => []
		];
		$this->set(compact('options'));
	}

}