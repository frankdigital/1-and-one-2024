<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContainedIcon extends Component {
    public ?string $icon;
    public string $type;
    public string $size;
    public string $class;

    protected $baseClass = 'contained-icon';

    public function __construct(?string $icon = '', $size = 'default', $type = 'common', $class = '') {
        $this->icon = $icon;
        $this->type = $type;
        $this->size = $size;
        $this->class = $this->buildClass($class);        
    }

    protected function buildClass(string $class): string {
        $classes = [$class, ccn($this->baseClass), ccn($this->baseClass . '--' . $this->size)];

        // Filter out empty strings and return the class list as a string
        return implode(' ', array_filter($classes));
    }

    public function render(){
        return view('ui.contained-icon');
    }
}