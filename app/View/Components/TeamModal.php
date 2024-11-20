<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;
use App\Traits\UseHelpers;

class TeamModal extends Component {
	use UseHelpers;

	public $content;

	public $image;
    public $name;
    public $position;
    public $phone;
    public $email;
	public $linkedin;
	public $bio;
	

	/**
	 * Create the component instance.
	 *
	 * @param  string|null  $caption
	 * @return void
	 */
	public function __construct(\WP_Post $post) {
		$phoneEnabled = $this->getAcfFieldFromID('post_type_data_contact_enable_phone', $post);
		$phone = null;

		if ($phoneEnabled) {
			$phone = $this->getAcfFieldFromID('post_type_data_contact_phone_number', $post);
		}

		$this->content = [
			'image' => $this->buildImageFromId(get_post_thumbnail_id($post)),
			'name' => $this->getAcfFieldFromID('post_type_data_name', $post) ?? get_the_title($post),
			'position' => $this->getAcfFieldFromID('post_type_data_position', $post),
			'phone' => $phone,
			'email' => $this->getAcfFieldFromID('post_type_data_contact_email', $post),
			'linkedin' => $this->getAcfFieldFromID('post_type_data_contact_linkedin', $post),
			'description' => $this->getAcfFieldFromID('post_type_data_description', $post),
		];
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.modal.team-modal');
	}
}