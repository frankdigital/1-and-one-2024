export const baseColors = {
	orange: {
		50: '#fbf7f4',
		100: '#f8eee8',
		200: '#f8eee8',
		300: '#dbac8e',
		400: '#cd8b61',
		500: '#bf6b34',
		600: '#a6511a',
		700: '#813f14',
		800: '#5c2d0f',
		900: '#371b09',
		950: '#251206',
	},
	shell: {
		50: '#fffefd',
		100: '#fefdf9',
		200: '#fdfaf3',
		300: '#f5f2e9',
		400: '#e4e0d8',
		500: '#cac7c0',
		600: '#b1aea8',
		700: '#989590',
		800: '#989590',
		900: '#656460',
		950: '#4c4b48',
	},
	black: {
		DEFAULT: '#000000',
		50: '#f2f2f2',
		100: '#e5e5e5',
		200: '#cccccc',
		300: '#b9b9b9',
		400: '#999999',
		500: '#737373',
		600: '#5c5c5c',
		700: '#454545',
		800: '#2e2e2e',
		900: '#171717',
	},
	feedback: {
		error: '#ad0f0f',
		success: '#008816',
	},
	'theme-surface': {
		primary: 'var(--surface-primary)',
		secondary: 'var(--surface-secondary)',
		tertiary: 'var(--surface-tertiary)',
		invert: 'var(--surface-invert)',
		accent: 'var(--surface-accent)',
		'accent-secondary': 'var(--surface-accent-secondary)',
		error: 'var(--surface-error)',
		success: 'var(--surface-success)',
		disabled: 'var(--surface-disabled)',
	},
	'theme-border': {
		primary: 'var(--border-primary)',
		secondary: 'var(--border-secondary)',
		tertiary: 'var(--border-tertiary)',
		invert: 'var(--border-invert)',
		'invert-secondary': 'var(--border-invert-secondary)',
		accent: 'var(--border-accent)',
		'accent-secondary': 'var(--border-accent-secondary)',
		error: 'var(--border-error)',
		success: 'var(--border-success)',
		disabled: 'var(--border-disabled)',
	},
	'theme-text': {
		primary: 'var(--text-primary)',
		secondary: 'var(--text-secondary)',
		'primary-invert': 'var(--text-primary-invert)',
		'secondary-invert': 'var(--text-secondary-invert)',
		accent: 'var(--text-accent)',
		'accent-secondary': 'var(--text-accent-secondary)',
		'text-link': 'var(--text-link)',
		'text-link-invert': 'var(--text-link-invert)',
		error: 'var(--text-error)',
		success: 'var(--text-success)',
		disabled: 'var(--text-disabled)',
	},
	'theme-cta-primary': {
		surface: 'var(--cta-primary-surface)',
		'surface-hover': 'var(--cta-primary-surface-hover)',
		'surface-disabled': 'var(--cta-primary-surface-disabled)',
		text: 'var(--cta-primary-text)',
		'text-disabled': 'var(--cta-primary-text-disabled)',
	},
	'theme-cta-primary-invert': {
		surface: 'var(--cta-primary-invert-surface)',
		'surface-hover': 'var(--cta-primary-invert-surface-hover)',
		'surface-disabled': 'var(--cta-primary-invert-surface-disabled)',
		text: 'var(--cta-primary-invert-text)',
		'text-disabled': 'var(--cta-primary-invert-text-disabled)',
	},
	'theme-cta-secondary': {
		surface: 'var(--cta-secondary-surface)',
		'surface-hover': 'var(--cta-secondary-surface-hover)',
		'surface-disabled': 'var(--cta-secondary-surface-disabled)',
		border: 'var(--cta-secondary-border)',
		'border-hover': 'var(--cta-secondary-border-hover)',
		'border-disabled': 'var(--cta-secondary-border-disabled)',
		text: 'var(--cta-secondary-text)',
		'text-hover': 'var(--text-primary-invert)',
		'text-disabled': 'var(--cta-secondary-text-disabled)',
	},
	'theme-cta-secondary-invert': {
		surface: 'var(--cta-secondary-invert-surface)',
		'surface-hover': 'var(--cta-secondary-invert-surface-hover)',
		'surface-disabled': 'var(--cta-secondary-invert-surface-disabled)',
		border: 'var(--cta-secondary-invert-border)',
		'border-hover': 'var(--cta-secondary-invert-border-hover)',
		'border-disabled': 'var(--cta-secondary-invert-border-disabled)',
		text: 'var(--cta-secondary-invert-text)',
		'text-hover': 'var(--text-primary)',
		'text-disabled': 'var(--cta-secondary-invert-text-disabled)',
	},
};

export const colors = {
	current: 'currentColor',
	transparent: 'transparent',
	white: '#ffffff',
	...baseColors,
};

// 'colour-purple-900': #350078;
// 'colour-brand-purple': 'var(--colour-purple-800-brand)';
// 'colour-brand-blue': #5c9ead;
// 'colour-purple-800-brand': #6500ca;
// 'colour-purple-700': #8001ff;
// 'colour-purple-600': #8c12ff;
// 'colour-purple-500': #943aff;
// 'colour-purple-400': #ab72ff;
// 'colour-purple-300': #c5a5ff;
// 'colour-purple-200': #ddcdff;
// 'colour-purple-100': #ede4ff;
// 'colour-purple-50': #f5f0ff;
// 'colour-brand-black': #111111;
// 'colour-brand-white': #ffffff;

// 'colour-grey-900': #171717;
// 'colour-grey-800': #2e2e2e;
// 'colour-grey-700': #454545;
// 'colour-grey-600': #5c5c5c;
// 'colour-grey-500': #737373;
// 'colour-grey-400': #999999;
// 'colour-grey-300': #b9b9b9;
// 'colour-grey-200': #cccccc;
// 'colour-grey-100': #e5e5e5;
// 'colour-grey-50': #f2f2f2;
// 'colour-wireframe-primary': #66707f;
// 'colour-wireframe-500': #8c939e;
// 'colour-wireframe-300': #d1d4d9;
// 'colour-wireframe-100': #eff0f2;
// 'colour-wireframe-white': #ffffff;
// 'colour-feedback-error': #ad0f0f;
// 'colour-feedback-success': #008816;
// 'colour-brand-charcoal': #455560;
// 'colour-wireframe-50': #f6f7fa;
// 'colour-purple-950': #1e003c;
