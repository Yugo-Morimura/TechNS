var gulp = require('gulp');

var gutil = require('gulp-util');
var ftp = require('vinyl-ftp');

var plumber = require('gulp-plumber');
var less = require('gulp-less');
var concat = require('gulp-concat');
/* pleeeseの導入を検討する */
var autoprefixer = require('gulp-autoprefixer');
var minifyCss = require('gulp-minify-css');
var uglify = require('gulp-uglify');

var conn_config = {
	host: 't12.firebird.jp',
	user: 'leve@test.hits.jp',
	password: 'leverages',
	parallel: 5,
	log: gutil.log
}
var remoteDest = '/app';
var globs = [
	'app/**',
	'!app/tmp',
	'!app/tmp/**'
];

gulp.task('deploy', function(){
	var conn = ftp.create(conn_config);
	gulp.src(globs, {base: './app', buffer: false, dot: true})
		.pipe(conn.newerOrDifferentSize(remoteDest))
		.pipe(conn.dest(remoteDest));
});

gulp.task('less', function(){
	gulp.src(['app/webroot/.less/reset.less','app/webroot/.less/main.less'])
		.pipe(plumber())
		.pipe(less())
		.pipe(autoprefixer())
		.pipe(concat('main.css'))
		.pipe(minifyCss())
		.pipe(gulp.dest('./app/webroot/css'));
});
gulp.task('js-uglify', function(){
	gulp.src('app/webroot/.js-org/**')
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest('./app/webroot/js'));
});
gulp.task('watch', function(){
	gulp.watch('app/webroot/.less/**', ['less']);
	gulp.watch('app/webroot/.js-org/**', ['js-uglify']);
});
