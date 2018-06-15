var gulp = require('gulp'),
  autoprefixer = require('gulp-autoprefixer'),
  concat = require('gulp-concat'),
  sourcemaps = require('gulp-sourcemaps'),
  sass = require('gulp-sass'),
  cleanCSS = require('gulp-clean-css'),
  uglify = require('gulp-uglify'),
  pump = require('pump'),
  order = require('gulp-order'),
  livereload = require('gulp-livereload');

gulp.task('watch', function () {
  livereload.listen();
  gulp.watch('frontend/sass/*.sass', gulp.series('sass'));
  gulp.watch('public/wp-content/themes/fishplanet/**/*.php').on('change', livereload.changed);
  gulp.watch('public/wp-content/themes/fishplanet/css/*.css').on('change', livereload.changed);
  gulp.watch('public/wp-content/themes/fishplanet/js/*.js').on('change', livereload.changed);
});

gulp.task('sass', function () {
  return gulp.src('frontend/sass/concat.sass')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('public/wp-content/themes/fishplanet/css/'));
});

gulp.task('production', function () {
  return gulp.src('frontend/sass/concat.sass')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS({ keepBreaks: true, compatibility: 'ie8' }))
    .pipe(gulp.dest('public/wp-content/themes/fishplanet/css/'));
});

gulp.task('bootstrap',function () {
   return gulp.src( '../node_modules/bootstrap/scss/bootstrap-fishplanet.scss' )
     .pipe(sass().on('error', sass.logError))
     .pipe(cleanCSS({ compatibility: 'ie8'}))
     .pipe(gulp.dest('public/wp-content/themes/fishplanet/css/'))
});

gulp.task(
  'default',
  gulp.series(
    'watch'
  )
);