/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.html",   // index.html
    "./js/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          red: "#990000"
        },
      },
      fontSize:{
        'custom': '16px'
      }
    }
  },
  plugins: [],
};