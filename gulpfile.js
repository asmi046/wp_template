var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');
var themePath = './_theme/';

// gulp.task('sass', function(done) {
//     gulp.src("app/css/sass/*.sass") // путь к sass файлам
//         .pipe(sass())
//         .pipe(gulp.dest("app/css/")) //папка для выгрузки css файлов
//         .pipe(browserSync.stream());


//     done();
// });

gulp.task('serve', function(done) {

   browserSync.init({
        proxy: "localhost:8081",
        
        files: [
            `${themePath}/**/*.php`,
            `${themePath}/**/*.js`,
            `${themePath}/**/*.css`,
        ]
    });

    // gulp.watch("app/css/*.sass", gulp.series('sass'));
    // gulp.watch("app/*.html").on('change', () => {
    //   browserSync.reload();
    //   done();
    // });
  

    done();
});

// gulp.task('default', gulp.series('sass', 'serve'));
gulp.task('default', gulp.series('serve'));