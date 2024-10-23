interface TailwindBreakpoints {
	sm: number;
	md: number;
	lg: number;
	xl: number;
	'2xl': number;
	'3xl': number;
	'4xl': number;
}

interface WindowSize {
	width: number;
	height: number;
	screen: string;
}

interface UseWindowSizeHandler {
	getWindowSize: () => WindowSize;
	isAtLeast: (breakpoint: keyof TailwindBreakpoints) => boolean;
	isAtMost: (breakpoint: keyof TailwindBreakpoints) => boolean;
	destroy: () => void;
}

interface JQuery {
	useWindowSize: () => UseWindowSizeHandler;
}

(function ($: JQueryStatic) {
	const tailwindBreakpoints: TailwindBreakpoints = {
		sm: 640,
		md: 640,
		lg: 1024,
		xl: 1280,
		'2xl': 1536,
		'3xl': 1920,
		'4xl': 2560,
	};

	function getTailwindScreen(width: number): string {
		if (width >= tailwindBreakpoints['2xl']) return '2xl';
		if (width >= tailwindBreakpoints.xl) return 'xl';
		if (width >= tailwindBreakpoints.lg) return 'lg';
		if (width >= tailwindBreakpoints.md) return 'md';
		if (width >= tailwindBreakpoints.sm) return 'sm';
		return 'xs'; // Anything below 640px
	}

	$.fn.useWindowSize = function (): UseWindowSizeHandler {
		let timeoutId: ReturnType<typeof setTimeout>;

		const $window = $(window);
		const windowSize: WindowSize = {
			width: $window.width() || 0, // Added default value for TypeScript
			height: $window.height() || 0, // Added default value for TypeScript
			screen: getTailwindScreen($window.width() || 0),
		};

		const handleResize = () => {
			clearTimeout(timeoutId);
			timeoutId = setTimeout(() => {
				const width = $window.width() || 0; // Added default value for TypeScript
				windowSize.width = width;
				windowSize.height = $window.height() || 0; // Added default value for TypeScript
				windowSize.screen = getTailwindScreen(width);
				$(window).trigger('windowSizeChange', windowSize);
			}, 150); // Debounce delay
		};

		$window.on('resize', handleResize);

		// Initial set
		handleResize();

		return {
			getWindowSize: (): WindowSize => {
				return windowSize;
			},
			isAtLeast: (breakpoint: keyof TailwindBreakpoints): boolean => {
				return windowSize.width >= tailwindBreakpoints[breakpoint];
			},
			isAtMost: (breakpoint: keyof TailwindBreakpoints): boolean => {
				return windowSize.width <= tailwindBreakpoints[breakpoint];
			},
			destroy: (): void => {
				$window.off('resize', handleResize);
				clearTimeout(timeoutId);
			},
		};
	};
})(jQuery);
