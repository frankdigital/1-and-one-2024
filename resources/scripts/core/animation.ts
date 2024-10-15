import { gsap } from 'gsap';
import { CustomEase } from 'gsap/CustomEase';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initAnimation() {
	gsap.registerPlugin(ScrollTrigger);
	gsap.registerPlugin(CustomEase);

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

	splitHeroAnimation('.jw-primary-hero-split');
	standardHeroAnimation('.jw-primary-hero-standard');
	standardHeroAnimation('.jw-primary-hero-left');
	stackedHeroAnimation('.jw-primary-hero-stacked');

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
	scrollBatchAnimation('.jw-usps-cards .jw-usp-card');
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

const splitHeroAnimation = (selector: string) => {
	if (!document.querySelector(selector)) return;
	const tl = gsap.timeline();
	tl.fromTo(
		`${selector}__image-container`,
		{
			clipPath: 'inset(0% 50% 0% 0%)',
		},
		{
			clipPath: 'inset(0% 0% 0% 0%)',
			duration: 1,
			ease: CustomEase.create('custom', 'M0,0 C0,0 0.86,-0.2 1,1 '),
		},
	);
	const targets: Element[] = gsap.utils.toArray(`${selector}__content > *, ${selector}__cta-container`);
	targets.forEach((target, index) => {
		tl.from(target, { opacity: 0, y: (index + 1) * 20, duration: 1 }, 0.5);
	});
};

const standardHeroAnimation = (selector: string) => {
	if (!document.querySelector(selector)) return;
	const tl = gsap.timeline();
	tl.from(`${selector}__image`, {
		scale: 1.2,
		duration: 2.5,
		ease: 'power1.inOut',
	});
	const targets: Element[] = gsap.utils.toArray(`${selector}__content > *, ${selector}__cta-container`);
	targets.forEach((target, index) => {
		tl.from(target, { opacity: 0, y: (index + 1) * 20, duration: 1 }, 1);
	});
};

const stackedHeroAnimation = (selector: string) => {
	if (!document.querySelector(selector)) return;
	const imageSelector = `${selector}__image-container`;
	gsap.set(imageSelector, { clipPath: 'inset(0% 0% 100% 0%)' });
	const tl = gsap.timeline();
	const targets: Element[] = gsap.utils.toArray(`${selector}__content > *, ${selector}__cta-container`);
	targets.forEach((target, index) => {
		tl.from(target, { opacity: 0, y: (index + 1) * 20, duration: 1 }, 0.5);
	});
	setTimeout(() => {
		ScrollTrigger.create({
			trigger: imageSelector,
			onEnter: () => {
				gsap.to(imageSelector, {
					clipPath: 'inset(0% 0% 0% 0%)',
					duration: 0.75,
					ease: 'power1.inOut',
				});
			},
		});
	}, 1000);
};
