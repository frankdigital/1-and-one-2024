<?php

namespace App\View\Components;

use App\Traits\UseHelpers;
use Roots\Acorn\View\Component;

class CardBlog extends Component {
    use UseHelpers;

    public $categories = [];
	public $image;
    public $date = null;
    public $readTime = null;
	public $heading;
	public $description;
	public $link;
	public $cta;

	public $variant = 'default';
	public $hideDate = false;

	/**
	 * Create the component instance.
	 *
     * @param  int  $id
	 * @return void
	 */
	public function __construct($id = null, $variant = 'default', $hideDate = false) {
		$categories = get_the_category($id);

		if (!empty($categories)) {
			$filtered_categories = array_filter($categories, function($category) {
				return $category->name !== 'Uncategorized';
			});
		
			$this->categories = $filtered_categories;
		}
		
        $this->date = get_the_date('j F Y', $id);
        $this->readTime = get_field('post_type_data_read_time', $id);

        $this->image = $this->buildImageFromId(get_post_thumbnail_id($id));
        $this->heading =  $this->getAcfFieldFromID('hero_heading', $id) ?: get_the_title($id);
        $this->description = $this->getAcfFieldFromID('post_type_data_excerpt', $id);
        
        $this->link = get_the_permalink($id);
        $this->cta = self::buildButtonFromLink($this->link, 'Read More');
		
		$this->variant = $variant;
		$this->hideDate = $hideDate;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\View\View|string
	 */
	public function render() {
		return $this->view('components.card-blog');
	}
}