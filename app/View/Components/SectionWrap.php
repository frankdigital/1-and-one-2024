<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class SectionWrap extends Component {

	public $content;
	public $wrapCtaOnMobile = true;
	public $priority;

	public function __construct($content = null, $wrapCtaOnMobile = true, $priority = 'primary') {
        $this->content = $content;
		$this->wrapCtaOnMobile = $wrapCtaOnMobile;
		$this->priority = $priority;
    }
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.section-wrap');
	}
}