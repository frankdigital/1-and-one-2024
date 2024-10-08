<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Traits\UseHelpers;

class LocationTab extends Component {
    use UseHelpers;

    public $label;
    public $target;

    public function __construct($label, $target) {
        $this->label = $label;
        $this->target = $target;
    }


    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render() {
        return $this->view('components.tabs.tab');
    }
}