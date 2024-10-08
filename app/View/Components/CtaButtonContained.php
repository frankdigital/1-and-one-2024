<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CtaButtonContained extends Component {
    public $priority;
    public $size;
    public $label;
    public $icon;
 
    public function __construct($priority = 'primary', $size = 'default', $label = null, $icon = null) {
        $this->priority = $priority;
        $this->size = $size;
        $this->label = $label;
        $this->icon = $icon;
    }

    public function getCtaStyles() {
        return implode(' ', [
            'cta-contained',
            "cta-contained--{$this->priority}",
            "cta-contained--{$this->size}",
        ]);
    }

    public function getIconStyles() {
        return implode(' ', [
            'cta-contained__icon',
            "cta-contained__icon--{$this->priority}",
            "cta-contained__icon--{$this->size}",
        ]);
    }

    public function getLabelStyles() {
        return implode(' ', [
            'cta-contained__label',
            "cta-contained__label--{$this->priority}",
            "cta-contained__label--{$this->size}",
        ]);
    }

    public function render() {
        return $this->view('components.cta-contained');
    }
}