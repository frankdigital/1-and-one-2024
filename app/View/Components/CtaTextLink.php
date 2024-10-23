<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CtaTextLink extends Component {
    public $size;
    public $label;
    public $icon;
    public $class;

    public function __construct($size = 'default', $label = null, $icon = 'ChevronRight', $class = '') {
        $this->size = $size;
        $this->label = $label;
        $this->icon = $icon ?: 'ChevronRight';
        $this->class = $class;
    }

    public function render() {
        return view('components.cta-text-link');
    }

    public function getCtaStyles() {
        return implode(' ', [
            'cta-text-link',
            "cta-text-link--{$this->size}",
            $this->class,
        ]);
    }

    public function getIconStyles() {
        return implode(' ', [
            'cta-text-link__icon',
            "cta-text-link__icon--{$this->size}",
        ]);
    }

    public function getLabelStyles() {
        return implode(' ', [
            'cta-text-link__label',
            "cta-text-link__label--{$this->size}",
        ]);
    }
}