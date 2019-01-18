// Gulp.js configuration
'use strict';

var config = require('./config.js');
const
  // source and build folders
  dir = {
    src         : 'src/',
    build       : config.wp_theme_folder
  },

  // Gulp and plugins
  gulp          = require('gulp'),
  gutil         = require('gulp-util'),
  newer         = require('gulp-newer'),
  imagemin      = require('gulp-imagemin'),
  sass          = require('gulp-sass'),
  postcss       = require('gulp-postcss'),
  deporder      = require('gulp-deporder'),
  concat        = require('gulp-concat'),
  stripdebug    = require('gulp-strip-debug'),
  uglify        = require('gulp-uglify')
;

// Browser-sync
var browsersync = false;


// PHP settings
const php = {
  src           : dir.src + '**/*.php',
  build         : dir.build,
  img           : dir.src + '*.png',
};

// copy PHP files
gulp.task('php', () => {
    return gulp.src(php.src)
        .pipe(newer(php.build))
        .pipe(gulp.dest(php.build)),
        gulp.src(php.img)
        .pipe(newer(php.build))
        .pipe(imagemin())
        .pipe(gulp.dest(php.build));
});

// image settings
const images = {
    src         : dir.src + 'assets/images/**/*',
    build       : dir.build + 'assets/images/'
  };
  
// image processing
gulp.task('images', () => {
    return gulp.src(images.src)
        .pipe(newer(images.build))
        .pipe(imagemin())
        .pipe(gulp.dest(images.build));
});

// CSS settings
var css = {
    srcStyle    : dir.src + 'style.css',
    buildStyle  : dir.build,
    src         : dir.src + 'assets/scss/itaipu.scss',
    watch       : dir.src + 'assets/scss/**/*',
    build       : dir.build + 'assets/css/',
    filename    : 'itaipu.min.css',
    sassOpts: {
      outputStyle     : 'nested',
      imagePath       : images.build,
      precision       : 3,
      errLogToConsole : true
    },
    processors: [
      require('postcss-assets')({
        loadPaths: ['images/'],
        basePath: dir.build,
        baseUrl: '/wp/wp-content/themes/tainacan-itaipu/'
      }),
      require('autoprefixer')({
        browsers: ['last 2 versions', '> 2%']
      }),
      require('css-mqpacker'),
      require('cssnano')
    ]
};

// CSS processing
gulp.task('css', ['images'], () => {
    var gulps = [
        gulp.src(css.src)
            .pipe(sass(css.sassOpts))
            .pipe(postcss(css.processors))
            .pipe(concat(css.filename))
            .pipe(gulp.dest(css.build))
            .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop()),
        gulp.src(css.srcStyle)
            .pipe(newer(php.build))
            .pipe(gulp.dest(css.buildStyle))
    ]
    return gulps;
});

// JavaScript settings
const js = {
    src         : dir.src + 'assets/js/**/*',
    build       : dir.build + 'assets/js/',
    filename    : 'itaipu.min.js'
};
  
// JavaScript processing
gulp.task('js', () => {

    return gulp.src([
            js.src
        ])
        .pipe(deporder())
        .pipe(concat(js.filename))
        .pipe(stripdebug())
        .pipe(uglify())
        .pipe(gulp.dest(js.build))
        .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());

});

// watch for file changes
gulp.task('watch', () => {

    // page changes
    gulp.watch(php.src, ['php']);
  
    // image changes
    gulp.watch(images.src, ['images']);
  
      // CSS changes
    gulp.watch(css.watch, ['css']);
  
    // JavaScript main changes
    gulp.watch(js.src, ['js']);
  
});

// run all tasks
gulp.task('build', ['php', 'css', 'js']);

// default task
gulp.task('default', ['build', 'watch']);