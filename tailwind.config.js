import { colors } from './tailwind/colors/colors';
import { fontSize } from './tailwind/typography/fontSize';
import { borderRadius } from './tailwind/layout/radius';
import typographyPlugin, { fontFamily } from './tailwind/typography/typography';
import { borderRadiusPlugin, paddingPlugin, spacingPlugin } from './tailwind/layout/layout';
import { space } from './tailwind/layout/spacing';
import { pxToRem } from './tailwind/utilities/pxToRem';
import { padding } from './tailwind/layout/padding';

const debugScreens = require('tailwindcss-debug-screens');

/** @type {import('tailwindcss').Config} config */
const config = {
	content: ['./app/**/*.php', './resources/**/*.{php,vue,js}', 'resources/views/*.php', 'resources/views/**/*.php'],
	darkMode: 'class',
	theme: {
		colors,
		fontSize,
		fontFamily,
		extend: {
			screens: {
				sm: '640px',
				md: '640px',
				lg: '1024px',
				xl: '1280px',
				'2xl': '1536px',
				'3xl': '1920px',
				'4xl': '2560px',
			},
			borderRadius,
			space,
			spacing: space,
			padding,
			margin: padding,
			letterSpacing: {
				eyebrow: pxToRem(2),
			},
			width: {
				37.5: pxToRem(150),
				39: pxToRem(156),
				45: pxToRem(180),
				50: pxToRem(200),
				80: pxToRem(320),
				85: pxToRem(340),
				95: pxToRem(380),
				105: pxToRem(420),
			},
			maxWidth: {
				35: pxToRem(140),
				95: pxToRem(380),
				105: pxToRem(420),
				120: pxToRem(480),
				134: pxToRem(536),
				150: pxToRem(600),
				180: pxToRem(720),
				205: pxToRem(820),
				209: pxToRem(836),
				294: pxToRem(1176),
				300: pxToRem(1200),
				312: pxToRem(1248),
				315: pxToRem(1260),
				327: pxToRem(1308),
				328: pxToRem(1312),
				360: pxToRem(1440),
				450: pxToRem(1800),
				'1/2': '50%',
			},
			height: {
				0.25: pxToRem(1),
				16: pxToRem(64),
				35: pxToRem(140),
				60: pxToRem(240),
				70: pxToRem(280),
				71: pxToRem(284),
				80: pxToRem(320),
				90: pxToRem(360),
				95: pxToRem(380),
				100: pxToRem(400),
				101: pxToRem(404),
				105: pxToRem(420),
				110: pxToRem(440),
				115: pxToRem(460),
				120: pxToRem(480),
				130: pxToRem(520),
				135: pxToRem(540),
				145: pxToRem(580),
				160: pxToRem(640),
				170: pxToRem(680),
				'9/10': '90%',
			},
			minHeight: {
				35: pxToRem(140),
				110: pxToRem(440),
				input: 'calc(var(--spacing-200) * 2 + var(--spacing-400))',
			},
			maxHeight: { 180: pxToRem(720) },
			flexBasis: {
				'1/2-gap-3': 'calc(50% - (1/2 * 1rem))',
			},
			flexGrow: {
				2: '2',
			},
			zIndex: {
				1: 1,
				2: 2,
				3: 3,
				4: 4,
				5: 5,
				6: 6,
				7: 7,
				8: 8,
				9: 9,
				10: 10,
				60: 60,
				70: 70,
			},
			keyframes: {
				accordionSlideDown: {
					from: { height: '0px' },
					to: { height: 'var(--radix-accordion-content-height)' },
				},
				accordionSlideUp: {
					from: { height: 'var(--radix-accordion-content-height)' },
					to: { height: '0px' },
				},
			},
			animation: {
				accordionSlideDown: 'accordionSlideDown 400ms cubic-bezier(0.16, 1, 0.3, 1)',
				accordionSlideUp: 'accordionSlideUp 400ms cubic-bezier(0.16, 1, 0.3, 1)',
			},
		},
	},
	plugins: [
		require('@tailwindcss/typography'),
		typographyPlugin,
		borderRadiusPlugin,
		spacingPlugin,
		paddingPlugin,
		debugScreens,
	],
};

export default config;
