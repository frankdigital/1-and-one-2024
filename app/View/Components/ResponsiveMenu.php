<?php

namespace App\View\Components;

use App\Traits\UseHelpers;
use Roots\Acorn\View\Component;

class ResponsiveMenu extends Component {
    use UseHelpers;

    public $menu;

	/**
	 * Create the component instance.
	 *
     * @param  int  $id
	 * @return void
	 */
	public function __construct($menu) {
        $this->menu = $menu;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.responsive-menu');
	}
}