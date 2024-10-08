<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;
use App\Traits\UseHelpers;

class TeamTile extends Component {
    use UseHelpers;

	public $post;

	public $image;
    public $name;
    public $position;
    public $url;
    public $type;
	

	public $modalId;

	/**
	 * Create the component instance.
	 *
	 * @param  string|null  $caption
	 * @return void
	 */
	public function __construct(\WP_Post $post, $type = 'modal') {
		$this->post = $post;
        $this->image = $this->buildImageFromId(get_post_thumbnail_id($post));
        $this->name = $this->getAcfFieldFromID('post_type_data_name', $post) ?? get_the_title($post);
        $this->position = $this->getAcfFieldFromID('post_type_data_position', $post);
        $this->type = $type;
        $this->url = get_the_permalink($post);

		$this->modalId = 'team-modal-' . $post->ID;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.team-tile');
	}
}