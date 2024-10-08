import plugin from 'tailwindcss/plugin';
import { compileStyles } from '../utilities/compileStyles';

export const borderRadiusPlugin = plugin(({ addComponents, theme }) => {
    const radiusStyles = {
        '.rounded-button': {
            className: 'rounded-buttonMobile md:rounded-buttonTablet lg:rounded-buttonDesktop',
        },
        '.rounded-form-input': {
            className: 'rounded-formInputMobile md:rounded-formInputTablet lg:rounded-formInputDesktop',
        },
        '.rounded-image': {
            className: 'rounded-imageMobile md:rounded-imageTablet lg:rounded-imageDesktop',
        },
        '.rounded-card': {
            className: 'rounded-cardMobile md:rounded-cardTablet lg:rounded-cardDesktop',
        },
        '.rounded-usp-icon': {
            className: 'rounded-uspIconMobile md:rounded-uspIconTablet lg:rounded-uspIconDesktop',
        },
    };

    addComponents(compileStyles(radiusStyles));
});

export const spacingPlugin = plugin(({ addComponents }) => {
    const horizontalSpacingStyles = {
        '.gap-x-25': {
            className: 'gap-x-spacing-25',
        },
        '.gap-x-50': {
            className: 'gap-x-spacing-50',
        },
        '.gap-x-100': {
            className: 'gap-x-spacing-100',
        },
        '.gap-x-150': {
            className: 'gap-x-spacing-150',
        },
        '.gap-x-200': {
            className: 'gap-x-spacing-200',
        },
        '.gap-x-250': {
            className: 'gap-x-spacing-250',
        },
        '.gap-x-300': {
            className: 'gap-x-spacing-300',
        },
        '.gap-x-400': {
            className: 'gap-x-spacing-400',
        },
        '.gap-x-500': {
            className: 'gap-x-spacing-500',
        },
        '.gap-x-600': {
            className: 'gap-x-spacing-600',
        },
        '.gap-x-700': {
            className: 'gap-x-spacing-700',
        },
        '.gap-x-800': {
            className: 'gap-x-spacing-800',
        },
        '.gap-x-900': {
            className: 'gap-x-spacing-900',
        },
        '.gap-x-950': {
            className: 'gap-x-spacing-950',
        },
    };

    const verticalSpacingStyles = {
        '.gap-y-25': {
            className: 'gap-y-spacing-25',
        },
        '.gap-y-50': {
            className: 'gap-y-spacing-50',
        },
        '.gap-y-100': {
            className: 'gap-y-spacing-100',
        },
        '.gap-y-150': {
            className: 'gap-y-spacing-150',
        },
        '.gap-y-200': {
            className: 'gap-y-spacing-200',
        },
        '.gap-y-250': {
            className: 'gap-y-spacing-250',
        },
        '.gap-y-300': {
            className: 'gap-y-spacing-300',
        },
        '.gap-y-400': {
            className: 'gap-y-spacing-400',
        },
        '.gap-y-500': {
            className: 'gap-y-spacing-500',
        },
        '.gap-y-600': {
            className: 'gap-y-spacing-600',
        },
        '.gap-y-700': {
            className: 'gap-y-spacing-700',
        },
        '.gap-y-800': {
            className: 'gap-y-spacing-800',
        },
        '.gap-y-900': {
            className: 'gap-y-spacing-900',
        },
        '.gap-y-950': {
            className: 'gap-y-spacing-950',
        },
    };

    addComponents(compileStyles({ ...horizontalSpacingStyles, ...verticalSpacingStyles }));
});

export const paddingPlugin = plugin(({ addComponents }) => {
    const horizontalPaddingStyles = {
        '.horizontal-sm': {
            className: 'px-smDesktop md:px-smTablet lg:px-smDesktop',
        },
        '.horizontal-md': {
            className: 'px-mdMobile md:px-mdTablet lg:px-mdDesktop',
        },
        '.horizontal-lg': {
            className: 'px-lgMobile md:px-lgTablet lg:px-lgDesktop',
        },
        '.horizontal-xl': {
            className: 'px-xlMobile md:px-xlTablet lg:px-xlDesktop',
        },
    };

    const verticalPaddingStyles = {
        '.vertical-sm': {
            className: 'py-smDesktop md:py-smTablet lg:py-smDesktop',
        },
        '.vertical-md': {
            className: 'py-mdMobile md:py-mdTablet lg:py-mdDesktop',
        },
        '.vertical-lg': {
            className: 'py-lgMobile md:py-lgTablet lg:py-lgDesktop',
        },
        '.vertical-xl': {
            className: 'py-xlMobile md:py-xlTablet lg:py-xlDesktop',
        },
    };

    const spacingPaddingStyles = {};

    addComponents(
        compileStyles({
            ...verticalPaddingStyles,
            ...horizontalPaddingStyles,
            ...spacingPaddingStyles,
        }),
    );
});
