import { EmblaCarouselType } from 'embla-carousel';

type ProgressNode = HTMLElement;

export const initCarouselProgress = (
    emblaApi: EmblaCarouselType,
    progressNode: ProgressNode,
): { applyProgress: () => void; removeProgress: () => void } => {
    const applyProgress = () => {
        const progress = Math.max(0, Math.min(1, emblaApi.scrollProgress()));
        progressNode.ariaValueNow = progress.toString();
        progressNode.style.transform = `scaleX(${progress * 0.9 + 0.1})`;
    };

    const removeProgress = () => {
        progressNode.ariaValueNow = '0';
        progressNode.removeAttribute('style');
    };

    return {
        applyProgress,
        removeProgress,
    };
};
