<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IconHandler extends Component {
    public ?string $icon;
    public string $type;
    public string $class;

    public function __construct(?string $icon = null, $type = 'common', $class ='') {
        $this->icon = $icon;
        $this->type = $type;
        $this->class = $class;
    }

    public function render(){
        return view('components.icon-handler');
    }
}