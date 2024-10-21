import domReady from '@roots/sage/client/dom-ready';
import Choices from 'choices.js';

import { SmoothScroller } from './core/SmoothScroller';
import { initAnimation } from './core/animation';

import { initSlider } from './components/carousel';
import {
	ACCORDION_CONTAINER,
	ANIMATE_HEIGHT,
	BLOG_LISTING,
	INHERIT_COLOR_SELECTOR,
	LOGOS_CAROUSEL,
	SERVICE_TILES,
	TABS_LIST,
	TESTIMONIALS_DUAL,
	TESTIMONIALS_SINGLE,
} from './selectors';
import { initModal } from './ui/base-modal';
import { registerAppHeight } from './core/appHeight';
import AutoScroll from 'embla-carousel-auto-scroll';
import { registerHeaderHeight } from './core/headerHeight';
import { initBlogListing } from './components/blogListing';
import { initTabs } from './components/tabs';
import { initAccordions } from './components/accordion';
import { initAnimateHeight } from './core/animateHeight';
import { initCtaBlockContained } from './components/ctaBlock/initCtaBlockContained';
import { initMegamenu } from './navigation/initMegamenu';

/**
 * Application entrypoint
 */
domReady(async () => {
	const scroller = new SmoothScroller();
	scroller.start();

	registerAppHeight();
	registerHeaderHeight();

	initAnimation();
	initModal(scroller);
	initMegamenu(scroller);

	const animateHeight = document.querySelectorAll(ANIMATE_HEIGHT);
	if (animateHeight) {
		animateHeight.forEach((element) => {
			initAnimateHeight(element as HTMLElement);
		});
	}

	const selectElements = document.querySelectorAll('.gfield_select');
	if (selectElements) {
		selectElements.forEach((element) => {
			new Choices(element, {
				itemSelectText: '',
				searchEnabled: false,
			});
		});
	}

	const serviceTiles = document.querySelectorAll(SERVICE_TILES);
	if (serviceTiles) {
		serviceTiles.forEach((element) => {
			initSlider(element as HTMLElement, { align: 'start' });
		});
	}

	const logosCarousel = document.querySelectorAll(LOGOS_CAROUSEL);
	if (logosCarousel) {
		logosCarousel.forEach((element) => {
			initSlider(element as HTMLElement, { loop: true }, [AutoScroll({ stopOnInteraction: false })]);
		});
	}

	const testimonialsSingle = document.querySelectorAll(TESTIMONIALS_SINGLE);
	if (testimonialsSingle) {
		testimonialsSingle.forEach((element) => {
			initSlider(element as HTMLElement, { align: 'start' });
		});
	}

	const testimonialsDual = document.querySelectorAll(TESTIMONIALS_DUAL);
	if (testimonialsDual) {
		testimonialsDual.forEach((element) => {
			initSlider(element as HTMLElement, { align: 'start' });
		});
	}

	const blogListing = document.querySelectorAll(BLOG_LISTING);
	if (blogListing) {
		blogListing.forEach((blogListing) => {
			initBlogListing(blogListing as HTMLElement);
		});
	}

	const tabsList = document.querySelectorAll(TABS_LIST);
	if (tabsList) {
		tabsList.forEach((element) => {
			initTabs(element as HTMLElement);
		});
	}

	const accordion = document.querySelectorAll(ACCORDION_CONTAINER);
	if (accordion) {
		accordion.forEach((element) => {
			initAccordions(element as HTMLElement);
		});
	}

	const ctaBlockConbtained = document.querySelectorAll(INHERIT_COLOR_SELECTOR);
	if (ctaBlockConbtained) {
		ctaBlockConbtained.forEach((element) => {
			initCtaBlockContained(element as HTMLElement);
		});
	}
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
// @ts-ignore
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
