var gulp = require('gulp'),
	postcss = require('gulp-postcss'),
	uglify = require('gulp-uglify'),
	concat = require('gulp-concat'),
	sass = require('gulp-sass'),
	selectors = require('postcss-custom-selectors'),
	autoprefixer = require('autoprefixer'),
	spritesmith = require('gulp.spritesmith'),
	merge = require('merge-stream'),
	size = require('postcss-size'),
	plumber = require('gulp-plumber'),
	elixir = require('laravel-elixir'),
	bower = 'public/bower/'; // bower directory


// Laravel livereload
require('laravel-elixir-livereload');
elixir(function(mix) {
   mix.livereload();
});

/*------------------------------------*\
    TASKS
\*------------------------------------*/

// Sass
gulp.task('sass', function() {
	var processors = [
			size,
			autoprefixer({ browsers: ['last 20 versions'] }),
			require('postcss-font-magician')({}),
			selectors,
		];

	return gulp.src('resources/assets/sass/style.scss')
		.pipe(plumber())
		.pipe(sass({outputStyle: 'compressed'}))
		.pipe(postcss(processors))
		.pipe(gulp.dest('public/build/css/'));
});

// Sprites
gulp.task('sprite', function () {
	var spriteData = gulp.src('images/main/*.png').pipe(spritesmith({
		imgName: 'sprite.png',
		cssName: 'sprite.css',
		padding: 1,
	}));

	var imgStream = spriteData.img
		.pipe(gulp.dest('images/'));

	var cssStream = spriteData.css
		.pipe(gulp.dest('css/'));

	return merge(imgStream, cssStream);
});

// Uglify and Concatenate
gulp.task('compress', function() {
  return gulp.src(['public/js/common.js'])
    .pipe(plumber())
    .pipe(concat('global.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('public/build/js/'));
});

// Watch
gulp.task('watch', function() {
	gulp.watch('resources/assets/sass/style.scss', { interval: 500 }, ['sass']);
	gulp.watch('public/js/common.js', { interval: 500 }, ['compress']);
	// gulp.watch('images/main/*.png', { interval: 500 }, ['sprite']);
});

// Default task
gulp.task('default', ['sass', 'watch', 'compress']);




