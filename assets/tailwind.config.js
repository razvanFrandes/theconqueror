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
