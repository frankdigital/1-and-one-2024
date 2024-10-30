<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DefaultLink extends Component {
    public bool $shouldObfuscate = false;
    public $obfuscateType = null;

    public string $title;
    public string $url;
    public string $target;
    public string $size;

    public function __construct($title = '', $url, $target = '_self', $size = 'default'){
        $this->title = $title;
        $this->url = $url;
        $this->target = $target;
        $this->size = $size;

        $this->shouldObfuscate = $this->shouldObfuscateUrl($url);

        if ($this->shouldObfuscate && $this->url) {
            $this->obfuscateType = $this->getObfuscateType($this->url);
            $this->url = $this->obfuscateUrl($this->url);
        } else {
            $this->url = $url;  
        }
    }

    public function shouldObfuscateUrl($url) {
        return strpos($url, 'mailto:') === 0 || strpos($url, 'tel:') === 0;
    }

    public function getObfuscateType($url) {
        return strpos($url, 'mailto:') === 0 ? 'email' : 'tel';
    }

    public function obfuscateUrl($url) {
        if (strpos($url, 'mailto:') === 0) {
            return 'mailto:' . strrev(substr($url, 7));
        } elseif (strpos($url, 'tel:') === 0) {
            return 'tel:' . strrev(substr($url, 4));
        }
        return strrev($url);
    }

    public function getCtaStyles() {
        return implode(' ', [
            'jw-default-link',
            "jw-default-link--{$this->size}",
        ]);
    }

    public function render(){
        return view('components.default-link');
    }
}