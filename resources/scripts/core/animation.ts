import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initAnimation() {
	gsap.registerPlugin(ScrollTrigger);

	gsap.utils.toArray<HTMLElement>('.jw-parallax').forEach((section) => {
		const container: HTMLElement | null = section.querySelector('.jw-parallax__content');
		if (!container) return;
		const strength = container.dataset.parallax;
		gsap.fromTo(
			container,
			{
				y: `-${strength}%`,
			},
			{
				y: `${strength}%`,
				ease: 'none',
				scrollTrigger: {
					trigger: section,
					start: 'top bottom',
					end: 'bottom top',
					scrub: true,
					invalidateOnRefresh: true,
				},
			},
		);
	});

	scrollBatchAnimation('.jw-logos-standard__grid .jw-logos-standard__grid-image-container', {
		autoAlpha: 0,
		y: 50,
		stagger: 0.2,
	});
	scrollBatchAnimation('.jw-wysiwyg-builder__block');
	scrollBatchAnimation('.jw-logos-standard__logo');
	scrollBatchAnimation('.jw-service-tile');
	scrollBatchAnimation('.jw-usps-vertical .jw-usp', { autoAlpha: 0, x: 50, stagger: 0.2 });
	scrollBatchAnimation('.jw-usps-horizontal .jw-usp');
	scrollBatchAnimation('.jw-page-card');
	scrollBatchAnimation('.jw-page-card-overlaid');
	scrollBatchAnimation('.jw-team-default__tile');
}

export const scrollBatchAnimation = (
	trigger: string,
	animation: GSAPTweenVars = { autoAlpha: 0, y: 50, scale: 0.95, stagger: 0.2 },
	batchMax?: number,
) => {
	ScrollTrigger.batch(trigger, {
		batchMax: batchMax,
		once: true,
		onEnter: (batch) => {
			gsap.from(batch, animation);
		},
	});
};
