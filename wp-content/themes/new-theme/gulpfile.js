const project = 'woodfall';

const {src, dest, watch, series, parallel} = require('gulp');
const browserSync = require('browser-sync').create();
const rename = require('gulp-rename');

const babel = require('gulp-babel');
const uglify = require('gulp-uglify');

const concat = require('gulp-concat');
const gsass = require('gulp-dart-sass');

const sourcemaps = require('gulp-sourcemaps');
const prefix = require('gulp-autoprefixer');
const clean = require('gulp-clean-css');

function watcher(cb) {
    browserSync.init({
        proxy: {
            target: 'http://localhost:8888/' + project + '/'
        }
    });

    watch(
        'dev/js/**/*.js',
        series(scripts, browserReload)
    );

    watch(
        'dev/sass/**/*.scss',
        series(styles)
    );

    watch('./**/*.php', series(browserReload));
}

function browserReload(cb) {
    browserSync.reload();
    cb();
}

function scripts(cb) {
    return src([
        'dev/js/app.js'
    ])
    .pipe(concat('app.min.js'))
    .pipe(uglify())
    .pipe(dest('./scripts/'))
}

function styles() {
    return src('dev/sass/style.scss')
    .pipe(sourcemaps.init())
    .pipe(gsass({
        outputStyle: 'compressed',
        quietDeps: true,
    }).on('error', gsass.logError))
    // .pipe(prefix('last 2 versions'))
    .pipe(clean({debug:true}))
    .pipe(sourcemaps.write())
    .pipe(dest('.'))
    .pipe(browserSync.stream())
}

exports.scripts = scripts;
exports.styles = styles;

exports.default = series(watcher);