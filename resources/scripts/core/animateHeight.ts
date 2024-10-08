import { gsap } from 'gsap';
export function initAnimateHeight(element: HTMLElement) {
	const resizeObserver = new ResizeObserver((entries) => {
		// We only have one entry, so we can use entries[0].
		const observedHeight = entries[0]?.contentRect.height ?? 'auto';
		gsap.to(element, { height: observedHeight / 16 + 'rem', duration: 0.2 });
	});
	resizeObserver.observe(element.children[0] as HTMLElement);
}
