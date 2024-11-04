<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Traits\UseHelpers;

class Cta extends Component {
    use UseHelpers;

    public $type;
    public $cta;
    public $enableCta;
    public $priority;
    public $class;
    public $size;
    public $icon;
    public $url = '';
    public $target = '_self';
    public $label = '';
    public $attributeData = [];
    public $isTextLink;

    public $modalType;
    public $modalId;
    public $modalData;

    public function __construct(
        array $cta,
        string $priority = 'primary',
        string $class = '',
        string $size = 'default',
        ?string $icon = 'ArrowRight'
    ) {
        $this->cta = $cta['cta'] ?? [];
        $this->priority = $priority;
        $this->class = $class;
        $this->size = $size;
        
        $this->enableCta = !empty($cta['enable_cta']);
        $this->isTextLink = ($priority === 'text-link');
        $this->type = $this->determineType();
        $this->setLabelAndAttributes();   
        $this->icon = $this->setIcon();
    }

    private function determineType(): string {
        return ($this->cta['type'] ?? '') === 'button' ? 'button' : 'link';
    }

    private function setLabelAndAttributes(): void {
        if ($this->type === 'button') {
            $this->label = $this->cta['label'] ?? '';
            $this->attributeData = $this->generateAttributes();
        } else {
            $target = $this->pathOr('_self', ['url', 'target'], $this->cta);

            $this->url = $this->cta['url']['url'] ?? '#';
            $this->target = $target === '' ? '_self' : $target;
            $this->label = $this->cta['url']['title'] ?? '';
        }
    }

    private function generateAttributes(): array {
        $buttonType = $this->cta['button_type'] ?? null;

        if (!$buttonType) {
            return [];
        }

        $this->modalType = $buttonType;

        if ($buttonType === 'video') {
            return $this->generateVideoAttributes();
        }

        if ($buttonType === 'team') {
            return $this->generateTeamAttributes();
        }

        return [];
    }

    private function generateVideoAttributes(): array {
        $videoModal = $this->cta['video_modal'] ?? [];
        $type = $videoModal['video_type'] ?? '';

        switch ($type) {
            case 'embed':
                return [
                    'data-modal-trigger' => 'modal-embed-video',
                    'data-modal-trigger-data' => md5(json_encode($videoModal['embed'] ?? '')),
                ];
            case 'upload':
                return [
                    'data-modal-trigger' => 'modal-upload-video',
                    'data-modal-trigger-data' => md5(json_encode($videoModal['video'] ?? '')),
                ];
            default:
                return [];
        }
    }

    private function generateTeamAttributes(): array {
        $this->modalData = $this->pathOr([], ['team_modal', 'team'], $this->cta);
        $this->modalId = 'team-modal-' . $this->modalData->ID;

        if (empty($this->modalData)) {
            return [];
        }

        return [
            'data-modal-trigger' => $this->modalId,
        ];
    }

    protected function setIcon(): string {
        $icon = 'ArrowRight';
        $url = $this->url;
        
        if (strpos($url, '#') === 0) {
            $icon = 'ArrowDown';
        }
        
        return $icon;
    }

    public function shouldDisplay(): bool {
        return $this->enableCta && isset($this->cta['type']);
    }

    public function linkClasses(): string {
        return trim('jw-cta jw-cta__' .  $this->priority  . ' ' . $this->class);
    }

    public function render() {
        return $this->view('components.cta');
    }
}