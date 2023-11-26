module.exports = {
  plugins: [
    require('postcss-font-magician')({
      variants: {
        'DM Sans': {
          'regular': ['woff, woff2'],
          '500': ['woff2, woff'],
          '700': ['woff2, woff']
        }
      }
    }),
    require('postcss-remove-font-face-format'),
    require('postcss-nested-ancestors'),
    require('postcss-import'),
    require('tailwindcss/nesting'),
    require('tailwindcss'),
    require('postcss-for'),
    require('postcss-simple-vars')
  ]
}
