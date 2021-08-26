module.exports = {
  chainWebpack: config => {
    config.module
      .rule("svg-sprite")
      .use("svgo-loader")
      .loader("svgo-loader");
  },
  pluginOptions: {
    svgSprite: {
      dir: "src/assets/sprites",
      test: /\.svg$/,
      pluginOptions: {
        plainSprite: true
      }
    }
  },
  devServer: {
    disableHostCheck: true
  }
};
