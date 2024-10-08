<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Image extends Component {

	public $bisImage;
	public $image;
    public $class;
    public $alt;
    public $priority;
	public $rounded;
	public $fill;

	/**
	 * Create the component instance.
	 *
	 * @param  string  $type
	 * @return void
	 */
	public function __construct($image, $size, $crop = false, $priority = 'lazy', $rounded = false, $fill = false, $class = '',) {
        if (isset($image) && isset($size) && function_exists('bis_get_attachment_image_src')) {
            $id = $image['ID'];
            $this->bisImage = bis_get_attachment_image_src($id, $size, $crop, ['class' => $class]);

            $this->class = $class;
            $this->alt = !empty($image['alt']) ? $image['alt'] : 'Jaywing Alt';
            $this->priority = $priority;
			$this->rounded = $rounded;
			$this->fill = $fill;
        }
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.image');
	}
}