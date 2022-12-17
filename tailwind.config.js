/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['*.php', 'templates/*.php', 'templates/*.html'],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      }
    },
  },
  plugins: [],
}
