import Lenis from 'lenis';
import { MODAL_TRIGGER } from '../selectors';

export function initLenis() {
	const lenis = new Lenis({
		prevent: (node) => {
			const value = node.classList.contains('modal');

			return value;
		},
	});

	function raf(time: number) {
		lenis.raf(time);
		requestAnimationFrame(raf);
	}

	requestAnimationFrame(raf);
}
