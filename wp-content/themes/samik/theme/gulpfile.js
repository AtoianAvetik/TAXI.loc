var gulp = require('gulp'),
    watch = require('gulp-watch'),
    sass = require('gulp-sass'),
    importCss = require('gulp-cssimport'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify'),
    util = require('gulp-util'),
    imageMin = require('gulp-imagemin'),
    pngQuant = require('imagemin-pngquant'),
    fileInclude = require('gulp-file-include'),
    flatten = require('gulp-flatten'),
    rimraf = require('rimraf'),
    pug = require('gulp-pug'),
    browserSync = require("browser-sync"),
    reload = browserSync.reload,
    file = require('gulp-file'),
    insert = require('gulp-insert'),
    isProduction = !!util.env.production;

var path = {
    build: {
        html: 'build/',
        pug: 'build/',
        js: 'build/js/',
        css: 'build/css/',
        img: 'build/img/',
        fonts: 'build/fonts/'
    },
    entries: {
        style: 'dev/styles/styles.scss',
        js: 'dev/js/scripts.js',
        pug: 'dev/templates/modules.pug'
    },
    dev: {
        html: 'dev/*.html',
        pug: ['dev/*.pug', 'dev/pages/*.pug'],
        pages: 'build/pages/*.pug',
        js: require('./dev/js/scripts.js'),
        style: 'dev/styles/*.scss',
        img: {
            root: 'dev/img/**/*.*',
            modules: 'dev/modules/**/img/**/*.*'
        },
        fonts: 'dev/fonts/**/*.*',
        modules: 'dev/modules/'
    },
    watch: {
        html: 'dev/**/*.html',
        pug: 'dev/**/*.pug',
        js: 'dev/**/*.js',
        style: ['dev/styles/**/*.*', 'dev/modules/**/*.scss'],
        img: 'dev/**/img/**/*.*',
        fonts: 'dev/fonts/**/*.*'
    },
    clean: './build'
};

var config = {
    server: {
        baseDir: "./build"
    },
    tunnel: false,
    host: 'localhost',
    port: 9000,
    logPrefix: "ds",
    notify: false,
    logSnippet: false,
    logConnections: false
};

gulp.task('html:build', function() {
    gulp.src(path.dev.html)
        .pipe(fileInclude({
            prefix: '@@'
        }))
        .pipe(gulp.dest(path.build.html))
        .pipe(reload({stream: true}));
});

gulp.task('pug:build', function() {
    gulp.src(path.dev.pug)
        .pipe(pug({
            pretty: "\t"
        }).on("error", util.log))
        .pipe(gulp.dest(path.build.pug))
        .pipe(reload({stream: true}));
});

gulp.task('js:build', function() {

    gulp.src(path.dev.js.main)
        .pipe(isProduction ? util.noop() : sourcemaps.init())
        .pipe(concat('main.js'))
        .pipe(isProduction ? uglify().on('error', util.log) : util.noop())
        .pipe(isProduction ? util.noop() : sourcemaps.write())
        .pipe(gulp.dest(path.build.js))
        .pipe(reload({stream: true}));

    gulp.src(path.dev.js.libs)
        .pipe(concat('libs.js'))
        .pipe(isProduction ? uglify().on('error', util.log) : util.noop())
        .pipe(gulp.dest(path.build.js))
        .pipe(reload({stream: true}));
});

gulp.task('style:build', function() {
    gulp.src(path.dev.style)
        .pipe(importCss({
            extensions: ["css"]
        }))
        .pipe(isProduction ? util.noop() : sourcemaps.init())
        .pipe(sass({
            sourcemap: !isProduction,
            outputStyle: isProduction ? 'compressed' : 'nested'
        })).on('error', function(err) {
            browserSync.notify(err.message, 10000);
            this.emit('end');
        })
        .pipe(isProduction ? util.noop() : sourcemaps.write())
        .pipe(gulp.dest(path.build.css))
        .pipe(reload({stream: true}));
});

gulp.task('image:build', function() {
    gulp.src(path.dev.img.root)
        .pipe(imageMin({
            progressive: true,
            use: [pngQuant()],
            interlaced: true
        }))
        .pipe(gulp.dest(path.build.img));

    gulp.src(path.dev.img.modules)
        .pipe(imageMin({
            progressive: true,
            use: [pngQuant()],
            interlaced: true
        }))
        .pipe(flatten({subPath: [2]}))
        .pipe(gulp.dest(path.build.img))
});

gulp.task('fonts:build', function() {
    gulp.src(path.dev.fonts)
        .pipe(gulp.dest(path.build.fonts))
});

gulp.task('build', [
    'html:build',
    'pug:build',
    'js:build',
    'style:build',
    'fonts:build',
    'image:build'
]);

gulp.task('serve', function() {
    browserSync(config);
});

gulp.task('clean', function(cb) {
    rimraf(path.clean, cb);
});

gulp.task('prod', function() {
    rimraf(path.clean, function() {
        isProduction = true;
        gulp.start('build')
    });
});

gulp.task('watch', function() {
    watch([path.watch.html], function() {
        gulp.start('html:build');
    });
    watch([path.watch.pug], function() {
        gulp.start('pug:build');
    });
    watch(path.watch.style, function() {
        gulp.start('style:build');
    });
    watch(path.watch.js, function() {
        delete require.cache[require.resolve('./dev/js/scripts.js')];
        path.dev.js = require('./dev/js/scripts.js');
        gulp.start('js:build');
    });
    watch([path.watch.img], function() {
        gulp.start('image:build');
    });
    watch([path.watch.fonts], function() {
        gulp.start('fonts:build');
    });
});

gulp.task('g', function() {
    var moduleName = util.env.module;

    gulp.src(path.entries.style)
        .pipe(insert.append('\n@import "../modules/' + moduleName + '/' + moduleName + '";'))
        .pipe(gulp.dest('dev/styles/'));

    gulp.src(path.entries.js)
        .pipe(insert.transform(function(content) {
            var id = content.lastIndexOf('"') + 1;
            return content.slice(0, id) + ',\n\t\t"dev/modules/' + moduleName + '/' + moduleName + '.js"' + content.slice(id);
        }))
        .pipe(gulp.dest('dev/js/'));

    gulp.src(path.entries.pug)
        .pipe(insert.append('\ninclude ../modules/' + moduleName + '/' + moduleName))
        .pipe(gulp.dest('dev/templates/'));

    gulp.src('src/**')
        .pipe(file(moduleName + '.pug', ''))
        .pipe(insert.append('mixin ' + moduleName + '()\n'))
        .pipe(insert.append('\tp ' + moduleName))
        .pipe(file(moduleName + '.scss', ''))
        .pipe(file(moduleName + '.js', ''))
        .pipe(gulp.dest(path.dev.modules + moduleName));
});

gulp.task('default', ['build', 'serve', 'watch']);
