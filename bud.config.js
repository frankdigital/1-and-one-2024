/**
 * Compiler configuration
 *
 * @see {@link https://roots.io/sage/docs sage documentation}
 * @see {@link https://bud.js.org/learn/config bud.js configuration guide}
 *
 * @type {import('@roots/bud').Config}
 */
export default async (app) => {
	/**
	 * Application assets & entrypoints
	 *
	 * @see {@link https://bud.js.org/reference/bud.entry}
	 * @see {@link https://bud.js.org/reference/bud.assets}
	 */
	app.entry('app', ['@scripts/app', '@styles/app'])
		.entry('editor', ['@scripts/editor', '@styles/editor'])
		.assets(['images', 'fonts', 'icons']);

	/**
	 * Copy CSS file to the output directory without cachebusting
	 *
	 * Replace `path/to/your-file.css` with the actual path of the CSS file you want to copy
	 */
	app.copy({
		from: './styles/theme.css',
		to: './css/theme.css',
	});

	app.postcss
		.set('postcss-is-pseudo-class', {
			preserve: true,
		})
		.enable();

	app.provide({
		jquery: ['$'],
	});

	/**
	 * Set public path
	 *
	 * @see {@link https://bud.js.org/reference/bud.setPublicPath}
	 */
	app.setPublicPath('../');

	/**
	 * Development server settings
	 *
	 * @see {@link https://bud.js.org/reference/bud.setUrl}
	 * @see {@link https://bud.js.org/reference/bud.setProxyUrl}
	 * @see {@link https://bud.js.org/reference/bud.watch}
	 */
	app.setUrl('http://localhost:3000')
		.setProxyUrl('http://1andone.local/')
		.watch(['resources/views/**/*', 'app/**/*', 'resources/styles/**/*']);
};
