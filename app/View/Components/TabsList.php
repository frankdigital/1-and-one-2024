<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Traits\UseHelpers;

class TabsList extends Component {
    use UseHelpers;

    public $label;
    public $tabs;

    public function __construct($tabs = [], $label = '' ) {
        $this->label = $label;
        $this->tabs =  $tabs;
    }


    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render() {
        return $this->view('components.tabs.tabs-list');
    }
}