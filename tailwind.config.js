/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        neutral: {
          750: "#333333",
        },
        primary: {
          500: "#fe9900",
          600: "#d68800",
        },
        dark:{
          100: "#7B7B7B",
          200: "#363636",
          300: "#393939",
          400: "#232323",
          500: "#1E1E1E",
          600: "#777777",
          700: "#010101",
        },
        light:{
          300:"#E4E4E4",
          400: "#F8F8F8",
          500:"#F6F6F6",
          600:"#EFEFEF",
          700:"#DBDBDB",
          800:"#C7C7C7",
        }
      },
      fontFamily: {
        changa: ["Changa", "sans-serif"],
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
