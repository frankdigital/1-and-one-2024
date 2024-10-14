<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Container extends Component {
	/**
	 * The container type.
	 *
	 * @var string
	 */
	public $width;
	public $class;
	public $scrollId;

	/**
	 * The available width types.
	 *
	 * @var array
	 */
	public $widths = [
		'default' => 'jw-container',
		'small' => 'jw-container jw-container--small',
		'large' => 'jw-container jw-container--large',
		'header' => 'jw-container jw-container--header',
	];

	/**
	 * Create the component instance.
	 *
	 * @param  string|null  $width
	 * @param  string|null  $class
	 * @return void
	 */
	public function __construct($width = 'default', $scrollId = null, $class = null) {
		$this->width = $this->widths[$width] ?? $this->widths['default'];
		$this->class = $class;

		if ($scrollId) {
			$this->scrollId = $scrollId;
		}
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.container');
	}
}