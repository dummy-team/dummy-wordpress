const gulp = require('gulp')
const plumber = require('gulp-plumber')
const notify = require('gulp-notify')
const source = require('vinyl-source-stream')
const buffer = require('vinyl-buffer')
const sass = require('gulp-sass')
const postcss = require('gulp-postcss')
const autoprefixer = require('autoprefixer')
const minifyCSS = require('gulp-csso')
const sourcemaps = require('gulp-sourcemaps')
const browserify = require('browserify')
const babelify = require('babelify')
const browserSync = require('browser-sync').create()
const uglify = require('gulp-uglify')

gulp.task('sass', function(){
  return gulp.src('./assets/css/src/**/*.sass')
    .pipe(plumber({errorHandler: notify.onError({
        message: "<%= error.message %>",
        title: "CSS preprocessing"
      })}))
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(postcss([autoprefixer({browsers: ['last 3 version']})]))
    .pipe(minifyCSS())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/css'))
    .pipe(browserSync.stream({match: '**/*.css'}))
})

gulp.task('js', () => {
  return browserify('./assets/js/src/main.js',  {debug: true})
  .transform(babelify.configure({ presets: ["@babel/preset-env"], sourceMaps: true }))
  .on('error', notify.onError({
      message: "<%= error.message %>",
      title: "Babelify JS"
    }))
  .bundle()
  .on('error', notify.onError({
      message: "<%= error.message %>",
      title: "JS compilation"
    }))
  .pipe(source('main.js'))
  .pipe(buffer())
  // .pipe(sourcemaps.init({loadMaps: true}))
  // .pipe(uglify())
  // .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/js'))
    .pipe(browserSync.stream())
})

gulp.task('serve', function() {

    browserSync.init({
        server: false,
        proxy: "localhost:8080",
        open: false,
    })

    gulp.watch('assets/css/src/**/*.s?ss').on('all', gulp.parallel('sass'))
    gulp.watch('assets/js/src/**/*.js').on('all', gulp.parallel('js'))
    gulp.watch([
      'assets/img/**/*',
      './**/*.twig',
      './**/*.php'
    ]).on('all', browserSync.reload)
})

gulp.task('build', gulp.parallel('sass', 'js'))
gulp.task('default', gulp.parallel('build', 'serve'))
