var gulp        = require('gulp'),
    sass        = require('gulp-sass'),    
    concat      = require('gulp-concat'),
    uglify      = require('gulp-uglify'),
    newer       = require('gulp-newer'),
    imagemin    = require('gulp-imagemin'),
    notify      = require('gulp-notify'),
    browserSync = require('browser-sync').create();

/*===================================
=            STYLES TASK            =
===================================*/
gulp.task('styles', function() {
    return gulp.src('./sass/**/*.scss')
        .pipe(sass({
            'outputStyle' : 'compressed'
        }))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream())
        .pipe(notify({ // Add gulpif here
           title: 'Gulp',
           subtitle: 'Success!',
           message: 'Successfully compiled styles',
           sound: 'Beep'
       }));
});

/*====================================
=            SCRIPTS TASK            =
====================================*/
gulp.task('scripts', function() {
    return gulp.src('./lib/**/*.js')
        .pipe(concat('script.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./js'))
        .pipe(browserSync.stream())
        .pipe(notify({ 
           title: 'Gulp',
           subtitle: 'Success!',
           message: 'Successfully minified scripts',
           sound: 'Beep'
       }));
});

/*==============================================
=            IMAGE COMPRESSION TASK            =
==============================================*/
gulp.task('images', function() {
    var imgSrc = 'img/source/*';
    var imgDest = 'img';

    return gulp.src(imgSrc)
        .pipe(newer(imgDest))
        .pipe(imagemin({
            progressive: true,
            optimizationLevel: 7
        }))
        .pipe(gulp.dest(imgDest))
        .pipe(notify({ 
           title: 'Gulp',
           subtitle: 'Success!',
           message: 'Successfully compressed images',
           sound: 'Beep'
       }));
});

/*==================================
=            SERVE TASK            =
==================================*/
gulp.task('serve', ['styles', 'scripts', 'images'], function(){
    browserSync.init({
        proxy   : "http://localhost/pixie/" // change this by your enviroment
    });
    
    gulp.watch('./lib/**/*.js', ['scripts']); // watching on scripts changes
    gulp.watch('./sass/**/*.scss', ['styles']); // watching on styles changes
    gulp.watch('./**/*.php').on('change', browserSync.reload);
});

gulp.task('default', ['serve']);
