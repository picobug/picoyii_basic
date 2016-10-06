var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    gif = require('gulp-if'),
    browserSync = require('browser-sync'),
    yargs = require('yargs'),
    webpack = require('webpack'),
    stream = require('webpack-stream');

const PRODUCTION = !!(yargs.argv.production);

gulp.task('sass', function() {
    return gulp.src('./assets/src/sass/all.scss')
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(autoprefixer())
        .pipe(gif(PRODUCTION, rename({ suffix: '.min' })))
        .pipe(gulp.dest('./assets/dist/css'))
});

gulp.task('scripts', function() {
    return gulp.src('./assets/src/js/**/*.js')
        .pipe(stream({
            output: {
                path: __dirname + '/assets/dist/js/',
                filename: 'all.js'
            },
            module: {
                loaders: [{
                    test: /\.js$/,
                    exclude: /node_modules/,
                    loader: ['babel-loader'],
                    query: {
                        presets: ['es2015']
                    }
                }]
            },
            plugins: [
                new webpack.optimize.UglifyJsPlugin({minimize: true})
            ]
        }))
        .pipe(gif(PRODUCTION, rename({ suffix: '.min' })))
        .pipe(gulp.dest('./assets/dist/js'))
});

gulp.task('serve', function() {
    browserSync.init({
        proxy: 'http://localhost/picoyii_basic/web'
    });

    gulp.watch('./assets/src/sass/**/*.scss',['sass']);
    gulp.watch('./assets/src/js/**/*.js',['scripts']);
    gulp.watch('./assets/dist/css/**/*.css').on('change', browserSync.reload);
    gulp.watch('./assets/dist/js/**/*.js').on('change', browserSync.reload);
    gulp.watch('./views/**/*.php').on('change', browserSync.reload);
    gulp.watch('./modules/themes/gentelella/**/*.php').on('change', browserSync.reload);
})

gulp.task('default', ['sass', 'scripts', 'serve']);
