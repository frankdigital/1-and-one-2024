<?php

namespace App\View\Components;

use App\Traits\UseHelpers;
use Roots\Acorn\View\Component;

class PageCard extends Component {
    use UseHelpers;

	public $title;
	public $image;
	public $heading;
	public $description;
	public $link;
	public $cta;

	/**
	 * Create the component instance.
	 *
     * @param  int  $id
	 * @return void
	 */
	public function __construct($id = null) {
	 	$title = get_the_title($id);
		
		$this->title = $title;
        $this->heading =  $this->getAcfFieldFromID('hero_heading', $id) ?: $title;
        $this->description = $this->getAcfFieldFromID('hero_supporting_text', $id);
        $this->link = get_the_permalink($id);
		$this->cta = self::buildButtonFromLink($this->link, 'Learn More');
		$this->image = self::buildImageFromId(get_post_thumbnail_id($id));
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.page-card');
	}
}
