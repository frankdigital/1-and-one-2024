export function pxToRem(pixels: number, fontSize = 16) {
	return `${pixels / fontSize}rem`;
}
