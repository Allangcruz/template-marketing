var gulp      = require('gulp'),
    prefix    = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    refresh   = require('gulp-livereload'),
    server    = require('tiny-lr')();

var src = "assets/**/*";

gulp.task('watch', function() {
    server.listen(3000, function( err ) {
        if (err) { return console.log( err ); }
 
        gulp.watch(src, [
            'compileStyles'
        ]);
    });
});



gulp.task('default', function() {
    // Tarefas
});