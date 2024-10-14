<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Section extends Component {
	public $paddingClass;
    public $class;
	public $dark;
	public $darkerBg;
	public $contain;
	public $attributes;
	public $scrollId;


	/**
	 * Create the component instance.
	 *
	 * @param  string  $type
	 * @return void
	 */
	public function __construct($class = '', $padding = 'default', $dark = false, $darkerBg = false, $contain = true, $attributes = [], $scrollId = null) {
		$PADDING_TOP_CLASS = [
			'default' => 'jw-section__padding-top',
			'none' => ''
		];
	
		$PADDING_BOTTOM_CLASS = [
			'default' => 'jw-section__padding-bottom',
			'none' => ''
		];
		
		if (is_string($padding)) {
			$paddingTopClass = isset($PADDING_TOP_CLASS[$padding]) ? $PADDING_TOP_CLASS[$padding] : $PADDING_TOP_CLASS['default'];
			$paddingBottomClass = isset($PADDING_BOTTOM_CLASS[$padding]) ? $PADDING_BOTTOM_CLASS[$padding] : $PADDING_BOTTOM_CLASS['default'];
		} else {
			$paddingTopClass = isset($PADDING_TOP_CLASS[$padding['top'] ?? 'default']) ? $PADDING_TOP_CLASS[$padding['top'] ?? 'default'] : $PADDING_TOP_CLASS['default'];
			$paddingBottomClass = isset($PADDING_BOTTOM_CLASS[$padding['bottom'] ?? 'default']) ? $PADDING_BOTTOM_CLASS[$padding['bottom'] ?? 'default'] : $PADDING_BOTTOM_CLASS['default'];
		}

		$this->paddingClass = trim("$paddingTopClass $paddingBottomClass");
		$this->dark = $dark;
		$this->darkerBg = $darkerBg;
        $this->class = $class;
		$this->contain = $contain;
		$this->attributes = $attributes;
		$this->scrollId = $scrollId;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.section');
	}
}