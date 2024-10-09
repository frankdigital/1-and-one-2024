import { compileStyles } from './../utilities/compileStyles';
import plugin from 'tailwindcss/plugin';

export const fontFamily = {
	heading: ['proxima-nova', 'Arial', 'sans-serif'],
	body: ['proxima-nova', 'Arial', 'sans-serif'],
};

export default plugin(({ addComponents }) => {
	const typographyStyles = {
		'.typography-display': {
			className: 'text-displayMobile md:text-displayTablet lg:text-displayDesktop text-theme-text-primary',
		},
		'.typography-h1': {
			className: 'text-h1Mobile md:text-h1Tablet lg:text-h1Desktop text-theme-text-primary',
		},
		'.typography-h2': {
			className: 'text-h2Mobile md:text-h2Tablet lg:text-h2Desktop text-theme-text-primary',
		},
		'.typography-h3': {
			className: 'text-h3Mobile md:text-h3Tablet lg:text-h3Desktop text-theme-text-primary',
		},
		'.typography-h4': {
			className: 'text-h4Mobile md:text-h4Tablet lg:text-h4Desktop text-theme-text-primary',
		},
		'.typography-h5': {
			className: 'text-h5Mobile md:text-h5Tablet lg:text-h5Desktop text-theme-text-primary',
		},
		'.typography-h6': {
			className: 'text-h6Mobile md:text-h6Tablet lg:text-h6Desktop text-theme-text-primary',
		},
		'.typography-eyebrow': {
			className:
				'text-eyebrowMobile md:text-eyebrowTablet lg:text-eyebrowDesktop text-theme-text-accent uppercase tracking-eyebrow',
		},
		'.typography-intro': {
			className: 'text-introMobile md:text-introTablet lg:text-introDesktop text-theme-text-secondary',
		},
		'.typography-large-body': {
			className: 'text-largeBodyMobile md:text-largeBodyTablet lg:text-largeBodyDesktop',
		},
		'.typography-body': {
			className: 'text-bodyMobile md:text-bodyTablet lg:text-bodyDesktop font-normal',
		},
		'.typography-small-body': {
			className: 'text-smallBodyMobile md:text-smallBodyTablet lg:text-smallBodyDesktop',
		},
		'.typography-caption': {
			className: 'text-captionMobile md:text-captionTablet lg:text-captionDesktop',
		},
		'.typography-display, .typography-h1, .typography-h2, .typography-h3, .typography-h4, .typography-h5, .typography-h6, .typography-eyebrow, .typography-eyebrow':
			{
				className: 'dark:text-white',
			},
		'.typography-large-body, .typography-body, .typography-small-body, .typography-intro, .typography-caption, .typography-eyebrow':
			{
				className: 'dark:text-theme-text-secondary-invert',
			},
	};

	addComponents(compileStyles(typographyStyles));
});
