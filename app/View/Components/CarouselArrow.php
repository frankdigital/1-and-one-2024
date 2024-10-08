<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;


class CarouselArrow extends Component {
	
	public $direction = Direction::class;

	/**
	 * Create the component instance.
	 *
	 * @return void
	 */
	public function __construct($direction = 'next') {
		$this->direction = $direction;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.carousel.arrow');
	}
}