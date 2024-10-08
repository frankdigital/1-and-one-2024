<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DefaultLink extends Component {
    public string $title;
    public string $url;
    public string $target;
    public string $size;

    public function __construct($title = '', $url, $target = '_self', $size = 'default'){
        $this->title = $title;
        $this->url = $url;
        $this->target = $target;
        $this->size = $size;
    }

    public function render(){
        return view('components.default-link');
    }

    public function getCtaStyles()
    {
        return implode(' ', [
            'jw-default-link',
            "jw-default-link--{$this->size}",
        ]);
    }
}