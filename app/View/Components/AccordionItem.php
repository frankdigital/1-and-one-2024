<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class AccordionItem extends Component {
	public $label;
	public $content;
	public $blockId;
	public $baseClass;
	public $key;

	public function __construct($label, $content, $key, $baseClass) {
		$this->label = $label;
		$this->content = $content;
		$this->blockId = md5(rand() . $key);
		$this->baseClass = $baseClass;
		$this->key = $key;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.accordion-item');
	}
}
