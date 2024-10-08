export const compileStyles = (styles: any) => {
	return Object.keys(styles).map((key) => {
		const { className, css } = styles[key];

		if (className || css) {
			return {
				[key]: {
					...(className ? { [`@apply ${className}`]: {} } : {}),
					...css,
				},
			};
		}

		return { [key]: styles[key] };
	});
};
