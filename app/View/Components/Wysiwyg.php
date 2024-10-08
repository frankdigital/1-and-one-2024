<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Wysiwyg extends Component {

	public $wysiwyg;
	public $class;
	
	public function __construct($wysiwyg) {
        $this->wysiwyg = $wysiwyg;
		
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.wysiwyg');
	}
}
