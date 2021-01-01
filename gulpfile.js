const gulp    = require('gulp');
const notify  = require("gulp-notify");
const plumber = require("gulp-plumber");
const sass    = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const uglify  = require('gulp-uglify');
const sassGlob = require("gulp-sass-glob");

//setting : paths
const paths = {
  'root'    : './dist/',
  'cssSrc'  : './src/scss/**/*.scss',
  'cssDist'   : './dist/css/',
  'jsSrc' : './src/js/**/*.js',
  'jsDist': './dist/js/'
}

//gulpコマンドの省略
const { watch, series, task, src, dest, parallel } = gulp;

//Sass
task('sass', function () {
  return (
    src(paths.cssSrc)
      .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
      .pipe(sassGlob())
      .pipe(sass({
        outputStyle: 'expanded'// Minifyするなら'compressed'
      }))
      .pipe(autoprefixer({
        cascade: false,
        grid: true
        }))
      .pipe(dest(paths.cssDist))
  );
});


//JS Compress
task('js', function () {
  return (
    src(paths.jsSrc)
      .pipe(plumber())
      .pipe(uglify())
      .pipe(dest(paths.jsDist))
  );
});

//watch
task('watch', (done) => {
  watch([paths.cssSrc], series('sass'));
  watch([paths.jsSrc], series('js'));
  done();
});
task('default', parallel('watch'));
