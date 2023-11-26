/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./../*.php",
    "./**/*.php",
    "./../**/*.php",
    "./src/css/*/**.css",
    "./src/js/*/**.js",
    "./src/js/*/**/*.js",
    "./safelist.txt",
  ],
  theme: {
    extend: {
      container: {
        center: true,
        padding: "16px",
        screens: {
          sm: "100%",
          md: "100%",
          lg: "880px",
          xl: "1100px",
        },
      },
      colors: {
        gold: {
          50: "#f1ca65",
          100: "#f5edd0",
          200: "#ead99d",
          300: "#e0c26b",
          400: "#d8ad47",
          500: "#cf9131",
          600: "#b77228",
          700: "#985425",
          800: "#7d4323",
          900: "#673820",
          950: "#3a1c0e",
        },
      },
    },

    fontFamily: { sans: ["Inter"] },
  },
  plugins: [
    require("@tailwindcss/forms")({
      strategy: "base",
    }),
    require("@tailwindcss/typography"),
    require("@tailwindcss/aspect-ratio"),
  ],
};
