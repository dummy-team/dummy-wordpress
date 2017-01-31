const gulp = require('gulp')
const batch = require('gulp-batch')
const watch = require('gulp-watch')
const plumber = require('gulp-plumber')
const notify = require('gulp-notify')
const gutil = require('gulp-util')
const source = require('vinyl-source-stream')
const buffer = require('vinyl-buffer')
const pug = require('gulp-pug')
const sass = require('gulp-sass')
const minifyCSS = require('gulp-csso')
const sourcemaps = require('gulp-sourcemaps')
const babel = require('gulp-babel')
const browserify = require('browserify')
const babelify = require('babelify')
const es2015 = require('babel-preset-es2015')
const uglify = require('gulp-uglify')
const browserSync = require('browser-sync').create()


gulp.task('scss', function(){
  return gulp.src('./assets/css/src/**/*.scss')
    .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(minifyCSS())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/css'))
    .pipe(browserSync.stream())
})

gulp.task('js', () => {
  browserify('./assets/js/src/main.js')
    .transform(babelify.configure({ presets: [es2015] }))
    .bundle()
    .on('error', gutil.log)
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/js'))
    .pipe(browserSync.stream())
})

gulp.task('serve', function() {

    browserSync.init({
        server: false,
        proxy: "localhost:8000",
        open: false,
    })

    gulp.watch("assets/css/src/**/*.scss", ['scss'])
    gulp.watch("assets/js/src/**/*.js", ['js'])
    gulp.watch('assets/img/**/*').on('change', browserSync.reload)
    gulp.watch('views/**/*.twig').on('change', browserSync.reload)
    gulp.watch('*.php').on('change', browserSync.reload)
    gulp.watch('./lib/**/*.php').on('change', browserSync.reload)
})

gulp.task('default', [ 'build', 'serve' ])
gulp.task('build', [ 'scss', 'js' ])
