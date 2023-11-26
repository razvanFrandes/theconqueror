const path = require("path");
const webpack = require("webpack");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const TerserJSPlugin = require("terser-webpack-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const { PurgeCSSPlugin } = require("purgecss-webpack-plugin");
const WebpackWatchPlugin = require("webpack-watch-files-plugin").default;
const glob = require("glob-all");

module.exports = {
  mode: process.env.NODE_ENV === "production" ? "production" : "development",
  entry: {
    mainjs: path.resolve(__dirname, "./src/js/index.js"),
    main: "./src/css/index.css",
  },
  output: {
    path: path.resolve(__dirname, "dist/js"),
    filename: "[name].js",
  },
  optimization: {
    minimizer: [new TerserJSPlugin({}), new OptimizeCSSAssetsPlugin({})],
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: [
              ["@babel/preset-env", { modules: false }],
              ["@babel/preset-react"],
            ],
          },
        },
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: {
              importLoaders: 1,
              url: false,
            },
          },
          {
            loader: "postcss-loader",
            options: {
              postcssOptions: {
                plugins: [
                  [
                    "postcss-preset-env",
                    {
                      stage: 0,
                    },
                  ],
                ],
              },
            },
          },
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "./../css/[name].css",
    }),

    process.env.NODE_ENV === "production"
      ? new PurgeCSSPlugin({
          paths: glob.sync([
            path.join(__dirname, "./../**/*.php"),
            path.join(__dirname, "./src/js/**/*.js"),
            path.join(__dirname, "./src/css/**/*.scss"),
          ]),
        })
      : () => {},
    new WebpackWatchPlugin({
      files: ["./src/js/**/*.js", "./src/css/**/*.css"],
    }),
    new webpack.ProvidePlugin({
      React: "preact/compat",
      ReactDOM: "preact/compat",
    }),
  ],
  resolve: {
    alias: {
      react: "preact/compat",
      "react-dom": "preact/compat",
    },
  },
};
