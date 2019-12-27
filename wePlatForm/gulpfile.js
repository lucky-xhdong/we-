var gulp = require('gulp'),
    spritesmith = require('gulp.spritesmith');
gulp.task('sprite-icons',function(){
    gulp.src('sprite-icons/*.png')
        .pipe(spritesmith({
            imgName:'sprite-icons.png',
            cssName:'sprite-css/sprite-icons.css',
            padding:1,
            algorithm:'binary-tree'
        }))
        .pipe(gulp.dest('sprite-images/')) //输出目录
});
gulp.task('default',['sprite-icons']);
