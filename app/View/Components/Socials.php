<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Socials extends Component {
	
	public $socials;

	public function __construct($socials) {
		$this->socials = $socials;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.socials');
	}
}