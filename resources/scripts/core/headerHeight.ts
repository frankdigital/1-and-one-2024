/* 
	Used to fix the issue on safari, where the expanded menu bar 
	on initial load does not have the correct height

	Reference: https://dev.to/maciejtrzcinski/100vh-problem-with-ios-safari-3ge9
*/

import { HEADER } from '../selectors';

export function registerHeaderHeight() {
	let timeout: any = false;
	window.addEventListener('resize', () => {
		// clear the timeout
		clearTimeout(timeout);
		// start timing for event "completion"
		timeout = setTimeout(headerHeight, 100);
	});
	headerHeight();
}

function headerHeight() {
	const header = $(HEADER);
	const doc = document.body;
	doc.style.setProperty('--header-height', `${header.outerHeight()}px`);

	console.log('header height');
}
