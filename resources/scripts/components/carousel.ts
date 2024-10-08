import EmblaCarousel, { EmblaOptionsType, EmblaCarouselType, EmblaPluginType } from 'embla-carousel';
import { CAROUSEL_PROGRESS, CAROUSEL_NEXT, CAROUSEL_PREV } from '../selectors';
import { initCarouselProgress } from './embla/progressBar';
import { initCarouselArrows } from './embla/arrows';

type HTMLElementOrNull = HTMLElement | null;

export const initSlider = (
    node: HTMLElement,
    options: EmblaOptionsType = {},
    plugins: EmblaPluginType[] = [],
): void => {
    const emblaApi: EmblaCarouselType = EmblaCarousel(node, options, plugins);

    const progressNode: HTMLElementOrNull = node.querySelector(CAROUSEL_PROGRESS);
    if (progressNode) {
        const { applyProgress, removeProgress } = initCarouselProgress(emblaApi, progressNode);
        emblaApi
            .on('init', applyProgress)
            .on('reInit', applyProgress)
            .on('scroll', applyProgress)
            .on('slideFocus', applyProgress)
            .on('destroy', removeProgress);
    }

    const prevBtn: HTMLElementOrNull = node.querySelector(CAROUSEL_PREV);
    const nextBtn: HTMLElementOrNull = node.querySelector(CAROUSEL_NEXT);
    if (prevBtn && nextBtn) {
        const removePrevNextBtnsClickHandlers = initCarouselArrows(
            emblaApi,
            prevBtn as HTMLButtonElement,
            nextBtn as HTMLButtonElement,
        );
        emblaApi.on('destroy', removePrevNextBtnsClickHandlers);
    }
};
