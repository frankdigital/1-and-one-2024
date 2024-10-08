<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Caption extends Component {
	
	public $caption;

	/**
	 * Create the component instance.
	 *
	 * @param  string|null  $caption
	 * @return void
	 */
	public function __construct($caption = '') {
		$this->caption = $caption;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.caption');
	}
}