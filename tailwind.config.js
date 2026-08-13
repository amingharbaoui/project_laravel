import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['"Space Grotesk"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                base: 'var(--color-base)',
                surface: 'var(--color-surface)',
                field: 'var(--color-field)',
                ink: 'var(--color-ink)',
                muted: 'var(--color-muted)',
                subtle: 'var(--color-subtle)',
                olive: '#A8B23F',
                violet: '#9B8FE0',
                terracotta: '#E8703C',
            },
            borderColor: {
                subtle: 'var(--color-subtle)',
            },
            borderRadius: {
                '2xl': '1.25rem',
                '3xl': '1.75rem',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
