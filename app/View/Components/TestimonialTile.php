<?php

namespace App\View\Components;

use App\Traits\UseHelpers;
use Roots\Acorn\View\Component;

class TestimonialTile extends Component {
    use UseHelpers;

	public $logo;
	public $heading;
	public $description;
	public $author;

	/**
	 * Create the component instance.
	 *
     * @param  int  $id
	 * @return void
	 */
	public function __construct($data) {
        $this->logo =  $this->pathOr([], ['logo'], $data);
		$this->heading =  $this->pathOr('', ['heading'], $data);
        $this->description = $this->pathOr('', ['description'], $data);
		$this->author = $this->getAuthorData($data['author']->ID);
	}

	protected function getAuthorData($postID) {
		return [
			'image' => $this->buildImageFromId(get_post_thumbnail_id($postID)) ?? '',
			'name' =>  $this->getAcfFieldFromID('post_type_data_name', $postID) ?? get_the_title($postID),
			'position' => $this->getAcfFieldFromID('post_type_data_position', $postID) ?? '',
		];
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.testimonial-tile');
	}
}
