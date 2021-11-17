module.exports = {
    filenameHashing: false,
    chainWebpack: config => {
        config.optimization.delete('splitChunks')
    },
    configureWebpack: {
        devtool: 'source-map'
    }
}