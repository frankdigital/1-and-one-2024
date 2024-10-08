<?php

namespace App\View\Components;

use App\Traits\UseHelpers;
use Roots\Acorn\View\Component;

class SmallIconLink extends Component {
	use UseHelpers;

	public $url;
	public $icon;
	public $title;
	public $target = '_self';
	public $class;

	/**
	 * Create the component instance.
	 *
	 * @param  array  $cta
	 * @param  string|null  $class
	 * @return void
	 */
public function __construct($cta, $class = null) {
		$this->url = $cta['url'];
		$this->icon = 'Placeholder';
		$this->title = $cta['title'];
		$this->target = $cta['target'] ?? '_self';
		$this->class = $class;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.small-icon-link');
	}
}