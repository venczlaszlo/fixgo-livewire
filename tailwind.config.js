/** @type {import('tailwindcss').Config} */
export default {
  content: [],
  theme: {
    extend: {},
  },
  plugins: [
    module.exports = {
      content: [
        "./resources/**/*.{html,js,php}", 
      ],
      theme: {
        extend: {},
      },
      plugins: [
        require('daisyui'), // DaisyUI plugin hozzáadása
      ],
    }
    
  ],
}

