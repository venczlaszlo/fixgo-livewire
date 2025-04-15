/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.{html,js,php,vue,blade.php}",
  ],
  darkMode: 'class', // 🌙 FONTOS: csak akkor legyen dark mód, ha a html tag-en ott a `dark` osztály
  theme: {
    extend: {
      colors: {
        base: {
          light: '#000000',
          dark: '#ffffff',
        },
        bgmain: {
          light: '#f3f4f6',
          dark: '#0f172a',
        }
      },
    },
  },
  plugins: [
    require("daisyui"),
  ],
  daisyui: {
    themes: ["light", "dark"],
    darkTheme: "dark",
    base: true,
  },
}
