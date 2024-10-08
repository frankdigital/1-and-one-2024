<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Parallax extends Component {

	public $strength;

	/**
	 * Create the component instance.
	 * 
	 * @param int $strength Number value representing percentage parallax content will move.
	 * @return void
	 */
	public function __construct($strength = 10) {
		$this->strength = $strength;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.parallax');
	}
}