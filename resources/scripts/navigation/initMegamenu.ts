import { SmoothScroller } from './../core/SmoothScroller';
import { gsap } from 'gsap';

import {
	HEADER,
	HEADER_MEGAMENU,
	HEADER_MOBILEMENU,
	HEADER_MOBILEMENU_TRIGGER,
	HEADER_OVERLAY,
	MENU_TRIGGER,
	MOBILE_MENU_BACK,
	MOBILE_MENU_TARGET,
	MOBILE_MENU_TRIGGER,
} from '../selectors';
import '../helpers/useWindowSize';

const $header = $(HEADER);
const $overlay = $(HEADER_OVERLAY);
const $megamenu = $(HEADER_MEGAMENU, $header);
const $triggers = $(MENU_TRIGGER, $header);

const $targetMegamenu = $(`[data-callout-index]`, $megamenu);
const $mobileMenuTrigger = $(HEADER_MOBILEMENU_TRIGGER, $header);
const $mobileMenu = $(HEADER_MOBILEMENU, $header);
const $mobileMenuBack = $(MOBILE_MENU_BACK, $header);
const $mobileMenuLevelTrigger = $(MOBILE_MENU_TRIGGER, $header);
const $mobileMenuLevelTarget = $(MOBILE_MENU_TARGET, $header);
const $menuOpenIcon = $('[class$="__menu-open"]');
const $menuCloseIcon = $('[class$="__menu-close"]');

const activeClass = 'is-active';
let isMenuOpen = false;
let activeMegamenuIndex: number | null = null;

const toggleClass = ($element: JQuery<HTMLElement>, condition: boolean) => {
	$element.toggleClass(activeClass, condition);
};

const updateMenuIcon = () => {
	$mobileMenuTrigger.toggleClass('is-open', isMenuOpen).toggleClass('is-closed', !isMenuOpen);
};

const toggleMobileMenu = (smoothScroller: SmoothScroller) => {
	toggleClass($mobileMenu, isMenuOpen);
	toggleClass($overlay, isMenuOpen);
	$header.toggleClass(activeClass, isMenuOpen).toggleClass('dark', !isMenuOpen);
	$('body').toggleClass('no-scroll', isMenuOpen);

	if (isMenuOpen) smoothScroller.pause();
	else smoothScroller.resume();

	updateMenuIcon();
};

const toggleMegaMenu = (index: number | null) => {
	if (index !== null) {
		const $targetMegamenuCallout = $(`[data-callout-index="${index}"]`, $megamenu);
		$targetMegamenu.removeClass(activeClass);
		$targetMegamenuCallout.addClass(activeClass);

		const calloutMenuElement = $targetMegamenuCallout.get(0);
		if (calloutMenuElement) {
			const listElements = calloutMenuElement.querySelectorAll<HTMLUListElement>('.jw-megamenu-callout__menu li');
			listElements.forEach((el, i) => {
				gsap.from(el, { y: -20, opacity: 0, stagger: 0.1, delay: i * 0.15 });
			});
		}
	} else {
		$targetMegamenu.removeClass(activeClass);
		toggleClass($overlay, false);
	}

	$header.toggleClass('dark', !isMenuOpen);
	toggleClass($overlay, isMenuOpen);
	toggleClass($megamenu, isMenuOpen);
	toggleClass($header, isMenuOpen);
	$('body').toggleClass('no-scroll', isMenuOpen);
};

const closeMenu = (smoothScroller: SmoothScroller) => {
	isMenuOpen = false;
	activeMegamenuIndex = null;
	toggleMegaMenu(null);
	$triggers.removeClass(activeClass);
	smoothScroller.resume();
	updateMenuIcon();
};

export function initMegamenu(smoothScroller: SmoothScroller) {
	$mobileMenuTrigger.on('click', () => {
		isMenuOpen = !isMenuOpen;
		$mobileMenu.css('maxHeight', `calc(var(--app-height) - ${$header.outerHeight()}px)`);
		toggleMobileMenu(smoothScroller);
	});

	$triggers.on('click', function () {
		const $this = $(this);
		const index = $triggers.index($this);

		if ($this.is('button')) {
			$triggers.not($this).removeClass(activeClass);

			if (activeMegamenuIndex === index && isMenuOpen) {
				closeMenu(smoothScroller);
			} else {
				isMenuOpen = true;
				activeMegamenuIndex = index;
				$this.addClass(activeClass);
				toggleMegaMenu(index);
				smoothScroller.pause();
			}

			updateMenuIcon();
		}
	});

	$mobileMenuLevelTrigger.on('click', function () {
		const $this = $(this);
		const index = $mobileMenuLevelTrigger.index($this);
		$mobileMenuLevelTarget.eq(index).toggleClass(activeClass);
	});

	$mobileMenuBack.on('click', () => $mobileMenuLevelTarget.removeClass(activeClass));
	$overlay.on('click', () => closeMenu(smoothScroller));

	$(document).on('keydown', (e: JQuery.KeyDownEvent) => {
		if (e.key === 'Escape' && isMenuOpen) closeMenu(smoothScroller);
	});

	// Handle window size changes
	const windowSizeHandler = $.fn.useWindowSize();
	$(window).on('windowSizeChange', () => {
		const isLg = windowSizeHandler.isAtLeast('lg');
		if (isLg && isMenuOpen) {
			isMenuOpen = false;
			toggleMobileMenu(smoothScroller);
			updateMenuIcon();
		} else if (!isLg && isMenuOpen) {
			closeMenu(smoothScroller);
		}
	});

	$menuOpenIcon.addClass(activeClass);
}
