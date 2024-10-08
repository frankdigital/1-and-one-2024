import { gsap } from 'gsap';

export const initTabs = (tabsContainer: HTMLElement): void => {
	const tabWrap = tabsContainer.querySelector('.jw-tabs-list') as HTMLElement;
	const tabList = tabsContainer.querySelector('[role=tablist]') as HTMLElement;
	const tabButtons = tabsContainer.querySelectorAll('[role=tab]') as NodeListOf<HTMLElement>;
	const tabPanels = tabsContainer.querySelectorAll('[role=tabpanel]') as NodeListOf<HTMLElement>;

	const setOverlay = () => {
		if (!tabList) return;
		if (tabList.scrollLeft === 0) {
			tabWrap.classList.add('jw-tabs-list--start');
		} else {
			tabWrap.classList.remove('jw-tabs-list--start');
		}
		if (tabList.scrollLeft + tabList.offsetWidth >= tabList.scrollWidth) {
			tabWrap.classList.add('jw-tabs-list--end');
		} else {
			tabWrap.classList.remove('jw-tabs-list--end');
		}
	};

	tabList.addEventListener('scroll', () => setOverlay());
	setOverlay();

	tabsContainer.addEventListener('click', (e) => {
		if (e.target instanceof HTMLElement) {
			const clickedTab = e.target.closest('[role=tab]') as HTMLElement;
			const currentTab = tabsContainer.querySelector('[aria-selected="true"]');
			if (!clickedTab || clickedTab === currentTab) return;
			switchTab(clickedTab);
		}
	});

	window.addEventListener('resize', () => {
		const currentTab = tabsContainer.querySelector('[aria-selected="true"]') as HTMLElement;
		moveIndicator(currentTab);
	});

	tabsContainer.addEventListener('keydown', (e) => {
		switch (e.key) {
			case 'ArrowLeft':
				moveFocusLeft();
				break;
			case 'ArrowRight':
				moveFocusRight();
				break;
			case 'Home':
				e.preventDefault();
				switchTab(tabButtons[0]);
				break;
			case 'End':
				e.preventDefault();
				switchTab(tabButtons[tabButtons.length - 1]);
				break;
		}
	});

	const switchTab = (newTab: HTMLElement) => {
		newTab.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
		const activePanelId = newTab.getAttribute('aria-controls');
		const activePanel = tabsContainer.querySelector('#' + activePanelId) as HTMLElement;
		const tl = gsap.timeline();
		tabButtons.forEach((button) => {
			button.setAttribute('aria-selected', 'false');
			button.setAttribute('tabindex', '-1');
		});

		tabPanels.forEach((panel) => {
			tl.to(panel, { opacity: '0', duration: 0.2 }, 0).set(panel, { display: 'none' });
		});
		tl.set(activePanel, { display: '' }).to(activePanel, { opacity: '1', duration: 0.2 }, '>');

		newTab.setAttribute('aria-selected', 'true');
		newTab.setAttribute('tabindex', '0');
		newTab.focus();
		moveIndicator(newTab);
	};

	const moveIndicator = (newTab: HTMLElement) => {
		const newTabWidth = newTab.offsetWidth / tabsContainer.offsetWidth;
		tabsContainer.style.setProperty('--_left', newTab.offsetLeft + 'px');
		tabsContainer.style.setProperty('--_width', newTabWidth.toString());
	};

	const moveFocusLeft = () => {
		const currentTab = document.activeElement as HTMLElement;
		const prevSibling = currentTab.previousElementSibling as HTMLElement;
		if (!prevSibling) {
			tabButtons.item(tabButtons.length - 1).focus();
		} else {
			prevSibling.focus();
		}
	};

	const moveFocusRight = () => {
		const currentTab = document.activeElement as HTMLElement;
		const nextSibling = currentTab.nextElementSibling as HTMLElement;
		if (!nextSibling) {
			tabButtons.item(0).focus();
		} else {
			nextSibling.focus();
		}
	};

	switchTab(tabButtons[0]);
};
