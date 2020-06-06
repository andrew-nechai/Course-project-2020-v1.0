var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefix = require('gulp-autoprefixer'),
    concat = require("gulp-concat"),
    cssmin = require('gulp-minify-css'), //сжатие кода css
    cleanCSS = require('gulp-clean-css'),
    imagemin = require('gulp-imagemin'),
    del = require('del'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync').create();

var css_files = [
    './src/css/reset/normalize.css',
    './src/css/fonts/fonts.css',
    './src/scss/style.scss',
    './src/css/media/media.scss'
]

var js_files = [
    './src/js/main.js'
]

var html_files = [
    './'
]

//сборка картинок
function imagess() {
    return gulp.src('./src/img/**/*.*')
        .pipe(gulp.dest('./dist/img'))
        //автоперезагрузка страницы
        .pipe(browserSync.stream());
};



//сборка css
function styless(){
    return gulp.src(css_files)
    .pipe(sass()) // используем gulp-sass
    .pipe(concat('style.css'))
    .pipe(autoprefix())
    // .pipe(cssmin())
    // .pipe(cleanCSS({level: 1}))
    .pipe(gulp.dest('./dist'))
    .pipe(browserSync.stream());
};

//сборка js
function scripts() {
    return gulp.src(js_files)
    .pipe(concat('main.js'))
    .pipe(gulp.dest('./dist/js'))
    .pipe(browserSync.stream());
}


//чистка каталока
function dell(){
    return del(['dist/*']);
};

//watch
function watchh(){
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
    gulp.watch('./src/css/**/*.css', styless)
    gulp.watch('./src/css/**/*.scss', styless)
    gulp.watch('./src/scss/**/*.scss', styless)
    gulp.watch('./src/img/**/*.*', imagess)  
    gulp.watch('./src/js/**/*.js', scripts)
    gulp.watch("./*.php").on('change', browserSync.reload);
}

gulp.task('images', imagess);
gulp.task('styles', styless);
gulp.task('watch', watchh);
gulp.task('del', dell);
gulp.task('scripts', scripts);

gulp.task('build', gulp.series(dell, scripts, imagess, styless, watchh));