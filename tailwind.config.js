
module.exports = {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    theme: {
      extend: {
        screens:{
            '3xl': '1800px',
            '4xl': '1920px'
        },
        boxShadow:{
            'around': '0 0 4px 1px'
        },
      },
    },
    plugins: [],
  }
