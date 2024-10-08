/* 
	Used to fix the issue on safari, where the expanded menu bar 
	on initial load does not have the correct height

	Reference: https://dev.to/maciejtrzcinski/100vh-problem-with-ios-safari-3ge9
*/

export function registerAppHeight() {
    let timeout: any = false;
    window.addEventListener('resize', () => {
        // clear the timeout
        clearTimeout(timeout);
        // start timing for event "completion"
        timeout = setTimeout(appHeight, 100);
    });
    appHeight();
}

function appHeight() {
    const doc = document.body;
    doc.style.setProperty('--app-height', `${window.innerHeight}px`);
}
