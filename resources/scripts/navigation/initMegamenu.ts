import { SmoothScroller } from './../core/SmoothScroller';
import { gsap } from 'gsap';

import {
	HEADER,
	HEADER_MEGAMENU,
	HEADER_MEGAMENU_TARGET,
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

const $triggers = $(MENU_TRIGGER, $header);

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

	updateMenuIcon();
};

const closeMenu = () => {
	const $activeMegamenu = $(`${HEADER_MEGAMENU}.${activeClass}`);

	if ($activeMegamenu) {
		const parent = $activeMegamenu.prev(MENU_TRIGGER);

		gsap.to($activeMegamenu[0], { height: '0px', duration: 0.2 });

		setTimeout(() => {
			$header.addClass('dark');
			$overlay.removeClass(activeClass);
		}, 120);

		if (parent) {
			parent.focus();

			$(HEADER_MEGAMENU).each((i, el) => {
				$(el).find(HEADER_MEGAMENU_TARGET).removeClass(activeClass);
				$(el).removeClass(activeClass);
				$(el).find('a, button').attr('tabindex', '-1');
			});
		}

		$activeMegamenu.removeClass(activeClass);
	}

	activeMegamenuIndex = null;
	isMenuOpen = false;
};

export function initMegamenu(smoothScroller: SmoothScroller) {
	const $focusableElements = $(
		`${HEADER_MEGAMENU_TARGET} a, ${HEADER_MEGAMENU_TARGET} button, ${HEADER_MEGAMENU_TARGET} input, ${HEADER_MEGAMENU_TARGET} select, ${HEADER_MEGAMENU_TARGET} textarea, ${HEADER_MEGAMENU_TARGET} [tabindex]`,
	);
	$focusableElements.attr('tabindex', '-1');

	$triggers.on('click', function () {
		const $this = $(this);
		const $megamenuParent = $this.siblings(HEADER_MEGAMENU);
		const $megamentTarget = $megamenuParent.find(HEADER_MEGAMENU_TARGET);
		const index = $triggers.index($this);
		const outerHeight = $megamentTarget.outerHeight();

		// If you click the menu item again, close the menu
		if (index === activeMegamenuIndex) {
			closeMenu();
			return;
		}

		// Open the menu via animation
		if (!isMenuOpen && index !== activeMegamenuIndex && outerHeight) {
			gsap.to($megamenuParent[0], { height: outerHeight / 16 + 'rem', duration: 0.2 });
			$megamentTarget.addClass(activeClass);
			$megamenuParent.addClass(activeClass);
		} else {
			// Close the previous menu
			$(HEADER_MEGAMENU).each((i, el) => {
				$(el).css('height', '');
				$(el).find(HEADER_MEGAMENU_TARGET).removeClass(activeClass);
				$(el).removeClass(activeClass);
			});

			// Find new target to open without the animation
			if (outerHeight) {
				$megamenuParent.css('height', outerHeight / 16 + 'rem');
			}
			$megamentTarget.addClass(activeClass);
		}

		// Remove focus but not if has active class
		$(HEADER_MEGAMENU_TARGET).each((i, el) => {
			const $element = $(el);

			console.log('hasClass', $element.hasClass(activeClass));

			if (!$element.hasClass(activeClass)) {
				$element.find('a, button').attr('tabindex', '-1');
			} else {
				$element.find('a, button').removeAttr('tabindex');
			}
		});

		// Remove header dark class
		$header.removeClass('dark');
		$megamenuParent.addClass(activeClass);
		$overlay.addClass(activeClass);

		// Set menu variables
		activeMegamenuIndex = index;
		isMenuOpen = true;
	});

	$mobileMenuLevelTrigger.on('click', function () {
		const $this = $(this);
		const index = $mobileMenuLevelTrigger.index($this);
		$mobileMenuLevelTarget.eq(index).toggleClass(activeClass);
	});

	$mobileMenuBack.on('click', () => $mobileMenuLevelTarget.removeClass(activeClass));
	$overlay.on('click', () => closeMenu());

	$mobileMenuTrigger.on('click', () => {
		isMenuOpen = !isMenuOpen;
		$mobileMenu.css('maxHeight', `calc(var(--app-height) - ${$header.outerHeight()}px)`);
		toggleMobileMenu(smoothScroller);
	});

	$(document).on('keydown', (e: JQuery.KeyDownEvent) => {
		if (e.key === 'Escape' && isMenuOpen) closeMenu();
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
			closeMenu();
		}
	});

	$menuOpenIcon.addClass(activeClass);
}
