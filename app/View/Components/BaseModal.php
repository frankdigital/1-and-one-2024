<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class BaseModal extends Component {
    public $id;
    public $type;

	/**
	 * Create the component instance.
	 *
	 * @param  string|null  $caption
	 * @return void
	 */
	public function __construct($id = '', $type) {
        $this->id = $id;
        $this->type = $type;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.modal.base-modal');
	}
}