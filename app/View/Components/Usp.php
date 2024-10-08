<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Usp extends Component {

	public $icon;
	public $heading;
	public $description;
	public $cta;
	public $class;

	/**
	 * Create the component instance.
	 *
	 * @param  string  $type
	 * @return void
	 */
	public function __construct($usp, $class = '') {
		

        $this->icon = $usp['icon'] ?? 'Placeholder';
        $this->heading = $usp['heading'];
        $this->description = $usp['description'];
        $this->cta = $usp['text_link_cta'] ?? null;
		$this->class = $class;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.usp');
	}
}