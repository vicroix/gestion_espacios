module.exports = {
  content: [
    "./*.html",   // index.html
    "./js/*.js"
  ],
  theme: {
    extend: {
      fontSize: {
        'custom': '16px' //Variable para meter en fuentes dinámicas cuando compile el css
      }
    },
  },
  plugins: [],
};