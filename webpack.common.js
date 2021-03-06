const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const WriteFilePlugin = require('write-file-webpack-plugin');
const autoprefixer = require('autoprefixer');
const path = require('path');

module.exports = {
  entry: {
    app: './src/index.js',
    404: './src/404.js'
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'dist')
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader'
        }
      },
      {
        test: /\.html$/,
        use: [
          {
            loader: 'html-loader',
            options: { minimize: true }
          }
        ]
      },
      {
        test: /\.(scss|css)$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader'
          },
          {
            loader: 'postcss-loader',
            options: {
              autoprefixer: {
                browsers: ['last 2 versions']
              },
              plugins: () => [autoprefixer]
            }
          },
          {
            loader: 'sass-loader'
          }
        ]
      }
    ]
  },
  plugins: [new MiniCssExtractPlugin(), new WriteFilePlugin()]
};
