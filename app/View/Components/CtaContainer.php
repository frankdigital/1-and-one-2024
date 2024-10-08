<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CtaContainer extends Component {
    public ?string $class;
    public bool $fullWidth;
    public $children;

    public function __construct(?string $class = '', bool $fullWidth = false) {
        $this->class = $class;
        $this->fullWidth = $fullWidth;
    }

    public function shouldDisplayCta($child) {
        return isset($child['enable_cta']) && $child['enable_cta'];
    }

    public function render(){
    return view('components.cta-container');
    }
}