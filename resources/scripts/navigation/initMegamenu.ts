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

function toggleClass($element: JQuery, condition: boolean) {
	$element.toggleClass(activeClass, condition);
}

function toggleMegaMenu(index: number | null) {
	if (index !== null) {
		const $targetMegamenuCallout = $(`[data-callout-index="${index}"]`, $megamenu);
		$targetMegamenu.removeClass(activeClass);
		$targetMegamenuCallout.addClass(activeClass);

		const calloutMenuElement = $targetMegamenuCallout.get(0);
		if (calloutMenuElement) {
			const listElements = calloutMenuElement.querySelectorAll('.jw-menu-expanded-link-list');
			listElements.forEach((el, index) => {
				gsap.from(el.querySelectorAll('li'), {
					y: -20,
					opacity: 0,
					stagger: 0.1,
					delay: index * 0.15,
				});
			});
		}
	} else {
		$overlay.removeClass(activeClass);

		//Commneted out the setTimeout function due to the flickering issue with Animateheight
		//setTimeout(() => {
		$targetMegamenu.removeClass(activeClass);
		//}, 300);
	}

	$('body').toggleClass('no-scroll', isMenuOpen);
	toggleClass($overlay, isMenuOpen);
	toggleClass($megamenu, isMenuOpen);
}

function updateMenuIcon() {
	if (isMenuOpen) {
		$mobileMenuTrigger.addClass('is-open').removeClass('is-closed');
	} else {
		$mobileMenuTrigger.addClass('is-closed').removeClass('is-open');
	}
}

function toggleMobileMenu() {
	toggleClass($mobileMenu, isMenuOpen);
	toggleClass($overlay, isMenuOpen);
	$header.toggleClass(activeClass, isMenuOpen);
	$('body').toggleClass('no-scroll', isMenuOpen);
	updateMenuIcon();
}

function closeMenu() {
	isMenuOpen = false;
	activeMegamenuIndex = null;
	toggleMegaMenu(null);
	$triggers.removeClass(activeClass);
	updateMenuIcon();
}

// Event handlers
$mobileMenuTrigger.on('click', function () {
	isMenuOpen = !isMenuOpen;
	const headerHeight = $header.outerHeight();
	$mobileMenu.css('maxHeight', `calc(var(--app-height) - ${headerHeight}px)`);
	toggleMobileMenu();
});

$triggers.on('click', function () {
	const $this = $(this);
	const index = $triggers.index($this);

	if (!$this.is('button')) {
		return;
	}

	$triggers.not($this).removeClass(activeClass);

	if (activeMegamenuIndex === index && isMenuOpen) {
		closeMenu();
	} else {
		isMenuOpen = true;
		activeMegamenuIndex = index;
		$this.addClass(activeClass);
		toggleMegaMenu(index);
	}

	updateMenuIcon();
});

$mobileMenuLevelTrigger.on('click', function () {
	const $this = $(this);
	const index = $mobileMenuLevelTrigger.index($this);
	const $target = $mobileMenuLevelTarget.eq(index);
	$target.toggleClass(activeClass);
});

$mobileMenuBack.on('click', function () {
	$mobileMenuLevelTarget.removeClass(activeClass);
});

$overlay.on('click', closeMenu);

// Add ESCAPE key listener
$(document).on('keydown', function (e) {
	if (e.key === 'Escape' && isMenuOpen) {
		closeMenu();
	}
});

// Debounced window resize handling
const windowSizeHandler = $.fn.useWindowSize();
$(window).on('windowSizeChange', (e: JQuery.Event, windowSize: WindowSize) => {
	const isLg = windowSizeHandler.isAtLeast('lg');

	if (!isLg && isMenuOpen) {
		closeMenu();
	} else if (isLg && isMenuOpen) {
		isMenuOpen = false;
		toggleMobileMenu();
		updateMenuIcon();
	}
});

(function () {
	// Initialize the megamenu
	$menuOpenIcon.addClass(activeClass);
})();
