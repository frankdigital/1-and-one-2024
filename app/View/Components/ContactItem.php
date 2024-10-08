<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContactItem extends Component {
    public string $icon;

    public function __construct($icon = 'Placeholder') {
        $this->icon = $icon;
    }

    public function render(){
        return view('components.contact-item');
    }
}