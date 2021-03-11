"use strict"; // eslint-disable-line

const webpack = require("webpack");
const merge = require("webpack-merge");
const autoprefixer = require("autoprefixer");
const CleanPlugin = require("clean-webpack-plugin");
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const HandlebarsLoader = require("handlebars-loader");
const fs = require("fs");
const glob = require("glob");
const path = require("path");
const jquery = require("jquery");
const FriendlyErrorsWebpackPlugin = require("friendly-errors-webpack-plugin");

const CopyGlobsPlugin = require("copy-globs-webpack-plugin");
const config = require("./config");

const assetsFilenames = config.enabled.cacheBusting
	? config.cacheBusting
	: "[name]";
const sourceMapQueryStr = config.enabled.sourceMaps
	? "+sourceMap"
	: "-sourceMap";

let webpackConfig = {
	context: config.paths.assets,
	entry: config.entry,
	devtool: config.enabled.sourceMaps ? "#source-map" : undefined,
	output: {
		path: config.paths.dist,
		publicPath: config.publicPath,
		filename: `scripts/${assetsFilenames}.js`
	},
	stats: {
		hash: false,
		version: false,
		timings: false,
		children: false,
		errors: false,
		errorDetails: false,
		warnings: false,
		chunks: false,
		modules: false,
		reasons: false,
		source: false,
		publicPath: false
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				loader: "buble",
				options: { objectAssign: "Object.assign" }
			},
			{
				test: /\.css$/,
				include: config.paths.assets,
				use: ExtractTextPlugin.extract({
					fallback: "style",
					publicPath: "../",
					use: [`css?${sourceMapQueryStr}`, "postcss"]
				})
			},
			{
				test: /\.s?css$/,
				include: config.paths.assets,
				use: ExtractTextPlugin.extract({
					fallback: "style",
					publicPath: "../",
					use: [
						`css?${sourceMapQueryStr}`,
						"postcss",
						`resolve-url?${sourceMapQueryStr}`,
						`sass?${sourceMapQueryStr}`
					]
				})
			},
			{
				test: /\.(ttf|eot|png|jpe?g|gif|svg|ico|mp4|m4v|mov|webm)$/,
				include: config.paths.assets,
				loader: "file",
				options: {
					name: `[path]${assetsFilenames}.[ext]`
				}
			},
			{
				test: /\.woff2?$/,
				include: config.paths.assets,
				loader: "url",
				options: {
					limit: 10000,
					mimetype: "application/font-woff",
					name: `vendor/${assetsFilenames}.[ext]`
				}
			},
			{
				test: /\.(ttf|eot|woff2?|png|jpe?g|gif|svg|ico)$/,
				include: /node_modules/,
				loader: "file",
				options: {
					name: `vendor/${config.cacheBusting}.[ext]`
				}
			},
			{
				test: /\.hbs$/,
				loader: "handlebars"
			}
		]
	},
	resolve: {
		modules: [config.paths.assets, "node_modules"],
		enforceExtension: false
	},
	resolveLoader: {
		moduleExtensions: ["-loader"]
	},
	externals: {
		$: "jQuery"
	},
	plugins: [
		new CleanPlugin([config.paths.dist], {
			root: config.paths.root,
			verbose: false
		}),
		/**
		 * It would be nice to switch to copy-webpack-plugin, but
		 * unfortunately it doesn't provide a reliable way of
		 * tracking the before/after file names
		 */
		new CopyGlobsPlugin({
			pattern: config.copy,
			output: `[path]${assetsFilenames}.[ext]`,
			manifest: config.manifest
		}),
		new CopyGlobsPlugin({
			pattern: "fonts/**/*",
			output: `[path]${assetsFilenames}.[ext]`,
			manifest: config.manifest
		}),
		new CopyGlobsPlugin({
			pattern: "media/**/*",
			output: `[path]${assetsFilenames}.[ext]`,
			manifest: config.manifest
		}),
		new ExtractTextPlugin({
			filename: `styles/${assetsFilenames}.css`,
			allChunks: true
		}),
		new webpack.ProvidePlugin({
			$: "jquery",
			jquery: "jquery",
			"window.jQuery": "jquery",
			Tether: "tether",
			"window.Tether": "tether"
		}),
		new webpack.LoaderOptionsPlugin({
			minimize: config.enabled.optimize,
			debug: config.enabled.watcher,
			stats: { colors: true }
		}),
		new webpack.LoaderOptionsPlugin({
			test: /\.s?css$/,
			options: {
				output: { path: config.paths.dist },
				context: config.paths.assets,
				postcss: [autoprefixer()]
			}
		}),
		new FriendlyErrorsWebpackPlugin()
	]
}; /** Let's only load dependencies as needed */

/* eslint-disable global-require */ var templates = fs.readdirSync(
	config.paths.views
);

templates.forEach(function(file, index) {
	var base = file.replace(/\.hbs$/, "");
	webpackConfig.plugins.splice(
		webpackConfig.plugins.length - 2,
		0,
		new HtmlWebpackPlugin({
			filename: config.paths.dist + "/" + file.replace(/\.hbs$/, ".html"),
			template: config.paths.assets + "/views/templates/" + file,
			chunksSortMode: function(a, b) {
				//alphabetical order
				return 1;
			},
			pagename: base === "index" ? "home" : base
		})
	);
});

if (config.enabled.optimize) {
	webpackConfig = merge(webpackConfig, require("./webpack.config.optimize"));
}

if (config.env.production) {
	webpackConfig.plugins.push(new webpack.NoEmitOnErrorsPlugin());
}

if (config.enabled.cacheBusting) {
	const WebpackAssetsManifest = require("webpack-assets-manifest");

	webpackConfig.plugins.push(
		new WebpackAssetsManifest({
			output: "assets.json",
			space: 2,
			writeToDisk: false,
			assets: config.manifest,
			replacer: require("./util/assetManifestsFormatter")
		})
	);
}

if (config.enabled.watcher) {
	webpackConfig.entry = require("./util/addHotMiddleware")(
		webpackConfig.entry
	);
	webpackConfig = merge(webpackConfig, require("./webpack.config.watch"));
}

module.exports = webpackConfig;
