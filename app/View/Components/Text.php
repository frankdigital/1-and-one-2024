<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Text extends Component {
    public string $tag;
    public string $sizeClass;
    public bool $isHTML;
    public string $class;

    protected const STYLE_TO_MARKUP_MAP = [
        'eyebrow' => 'span',
        'body' => 'p',
        'bodyLarge' => 'p',
        'bodySmall' => 'p',
        'caption' => 'span',
        'link' => 'a',
        'span' => 'span',
    ];

    protected const SIZE_CLASSES = [
        'display' => 'typography-display',
        'h1' => 'typography-h1',
        'h2' => 'typography-h2',
        'h3' => 'typography-h3',
        'h4' => 'typography-h4',
        'h5' => 'typography-h5',
        'h6' => 'typography-h6',
        'body' => 'typography-body',
        'bodyLarge' => 'typography-large-body',
        'bodySmall' => 'typography-small-body',
        'bodyIntro' => 'typography-intro',
        'caption' => 'typography-caption',
        'eyebrow' => 'typography-eyebrow',
    ];

    public function __construct(
        string $as = 'body',
        ?string $textStyle = null,
        bool $isHTML = false,
        string $class = '',
        bool $strong = false
    ) {
        $this->tag = self::STYLE_TO_MARKUP_MAP[$as] ?? $as;
        $this->sizeClass = self::SIZE_CLASSES[$textStyle ?? $as] ?? '';
        $this->isHTML = $isHTML;
        $this->class = $this->buildClass($class, $strong);
    }

    protected function buildClass(string $class, bool $strong): string {
        $classes = [$class, $this->sizeClass];

        if ($strong) {
            $classes[] = 'font-medium';
        }

        // Filter out empty strings and return the class list as a string
        return implode(' ', array_filter($classes));
    }

    public function render() {
        return $this->view('components.text');
    }
}