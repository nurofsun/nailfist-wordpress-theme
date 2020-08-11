const { src, dest, series, parallel, watch } = require('gulp'),
	babel = require('gulp-babel'),
	postcss = require('gulp-postcss'),
	sass = require('gulp-sass');
const files = {
	styles: {
		source: ['./resources/styles/style.scss'],
		destination: './assets/css'
	},
	scripts: {
		source: ['./resources/scripts/app.js'],
		destination: './assets/js'
	}
}

const compile = {
	styles(cb) {
		return src(files.styles.source, { sourcemaps: true })
			.pipe(sass())
			.pipe(dest(files.styles.destination, { sourcemaps: true }))
			cb();
	},
	scripts(cb) {
		return src(files.scripts.source, { sourcempas: true })
			.pipe(babel())
			.pipe(dest(files.scripts.destination, { sourcemaps: true }))
			cb();
	}
}
const build = {
	styles(cb) {
		return src(files.styles.source, { sourcemaps: true })
			.pipe(sass())
			.pipe(postcss(
				[
					require('autoprefixer'),
					require('cssnano')
				]
			))
			.pipe(dest(files.styles.destination, { sourcemaps: '.' }))
			cb();
	},
	scripts(cb) {
		return src(files.scripts.source, { sourcemaps: true })
			.pipe(babel())
			.pipe(dest(files.scripts.destination, { sourcemaps: '.' }))
			cb();
	}
}

exports.default = function() {
	let watchEntry = {
		styles: ['./resources/styles/**/*.scss', './resources/styles/**/*.sass'],
		scripts: ['./resources/scripts/**/*.js']
	}
	watch(watchEntry.styles, compile.styles)
	watch(watchEntry.scripts, compile.scripts)
}

exports.build = series(build.styles,build.scripts);
