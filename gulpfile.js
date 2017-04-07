var gulp = require( 'gulp' ),
  plumber = require( 'gulp-plumber' ),
  watch = require( 'gulp-watch' ),
  livereload = require( 'gulp-livereload' ),
  minifycss = require( 'gulp-minify-css' ),
  jshint = require( 'gulp-jshint' ),
  stylish = require( 'jshint-stylish' ),
  uglify = require( 'gulp-uglify' ),
  rename = require( 'gulp-rename' ),
  notify = require( 'gulp-notify' ),
  include = require( 'gulp-include' ),
  sass = require( 'gulp-sass' );


// Default error handler
var onError = function( err ) {
  console.log( 'An error occured:', err.message );
  this.emit('end');
}


// Jshint outputs any kind of javascript problems you might have
// Only checks javascript files inside /src directory
gulp.task( 'jshint', function() {
  return gulp.src( './js/src/*.js' )
    .pipe( jshint( '.jshintrc' ) )
    .pipe( jshint.reporter( stylish ) )
    .pipe( jshint.reporter( 'fail' ) );
})


// Concatenates all files that it finds in the manifest
// and creates two versions: normal and minified.
// It's dependent on the jshint task to succeed.
gulp.task( 'scripts', ['jshint'], function() {
  return gulp.src( './js/manifest.js' )
    .pipe( include() )
    .pipe( rename( { basename: 'scripts' } ) )
    .pipe( gulp.dest( './js/dist' ) )
    // Normal done, time to create the minified javascript (scripts.min.js)
    // remove the following 3 lines if you don't want it
    .pipe( uglify() )
    .pipe( rename( { suffix: '.min' } ) )
    .pipe( gulp.dest( './js/dist' ) )
    .pipe( livereload() );
} );

// As with javascripts this task creates two files, the regular and
// the minified one. It automatically reloads browser as well.
gulp.task('sass', function() {
  return gulp.src('sass/style.scss')
    .pipe( plumber( { errorHandler: onError } ) )
    .pipe( sass() )
    .pipe( gulp.dest( '.' ) )
    // Normal done, time to do minified (style.min.css)
    // remove the following 3 lines if you don't want it
    .pipe( minifycss() )
    .pipe( rename( { suffix: '.min' } ) )
    .pipe( gulp.dest( '.' ) )
    .pipe( livereload() );
});


// Start the livereload server and watch files for change
gulp.task('watch', function () {
    livereload.listen();

    // don't listen to whole js folder, it'll create an infinite loop
    gulp.watch(['./js/*/.js', '!./js/dist/.js'], ['scripts']);

    gulp.watch('./sass/*/.scss', ['sass']);

    gulp.watch('./*/.php').on('change', function (file) {
        // reload browser whenever any PHP file changes
        livereload.changed(file);
    });
});


gulp.task('default', ['watch'], function () {
    // Does nothing in this task, just triggers the dependent 'watch'
});

////var gulp = require('gulp');
//var uglify = require('gulp-uglify');
//var autoprefixer = require('gulp-autoprefixer');
//var sourcemaps = require('gulp-sourcemaps');
//var sass = require('gulp-sass');
//
//gulp.task('hello', function () {
//    console.log('Hello, World!');
//});
//
//gulp.task('uglify', function () {
//    gulp.src('js/**/*.js')
//            .pipe(uglify())
//            .pipe(gulp.dest('build'));
//});
//
//gulp.task('processCSS', function () {
//    gulp.src('style.css')
//            .pipe(sourcemaps.init())
//            .pipe(autoprefixer())
//            .pipe(sourcemaps.write())
//            .pipe(gulp.dest('build'));
//});
//
//gulp.task('watch', function () {
//    gulp.watch('style.css', ['processCSS']);
//});
//
//gulp.task('sass', function () {
// return gulp.src('sass/style.scss')
//  .pipe(sourcemaps.init())
//  .pipe(sass().on('error', sass.logError))
//  .pipe(sourcemaps.write())
//  .pipe(gulp.dest(''));
//});
//
//gulp.task('sass:watch', function () {
//    gulp.watch('./sass/**/*.scss', ['sass']);
//});