import Lenis from 'lenis';

export class SmoothScroller {
	private lenis: Lenis;
	private isRunning: boolean;
	private wrapper: HTMLElement;

	constructor(wrapper: HTMLElement = window.document.documentElement) {
		this.wrapper = wrapper;

		// Initialize the Lenis instance
		this.lenis = new Lenis({
			lerp: 0.1, // Customize the options here
			smoothWheel: true,
			wrapper: this.wrapper,
			prevent: (node) => node.classList.contains('jw-base-modal'),
		});

		this.isRunning = false;
	}

	// Method to initialize and start Lenis scrolling
	public start(): void {
		if (!this.isRunning) {
			this.isRunning = true;
			this.animate(); // Start animation loop
		}
	}

	// Method to pause Lenis scrolling
	public pause(): void {
		if (this.isRunning) {
			this.isRunning = false;
		}
	}

	// Method to resume Lenis scrolling
	public resume(): void {
		if (!this.isRunning) {
			this.isRunning = true;
			this.animate(); // Resume animation loop
		}
	}

	// Internal method to handle animation loop
	private animate = (time: number = 0): void => {
		if (this.isRunning) {
			this.lenis.raf(time); // Update Lenis on each animation frame
			requestAnimationFrame(this.animate); // Continue the animation loop
		}
	};
}

// Example usage
// const scroller = new SmoothScroller();
// scroller.start(); // Start smooth scrolling

// To pause or resume later:
// scroller.pause();
// scroller.resume();
