module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
      'md': '640px',
      'lg': '769px',
      'xl': '1024px'
    },
    extend: {
      boxShadow: {
        light: '0 0 15px 0 rgba(225,225,225, .1)'
      }
    },
  },
  plugins: [],
}