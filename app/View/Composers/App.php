<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Traits\UseHelpers;

class App extends Composer {
    use UseHelpers;
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'header' => $this->header(),
            'siteName' => $this->siteName(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    public function header() {
		$optionsHeader = $this->getAcfFieldFromOptions('options_header');

		return $optionsHeader;
	}

}