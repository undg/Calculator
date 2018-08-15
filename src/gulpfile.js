//jshint node:true, esversion: 6, strict: false
const gulp         = require("gulp"),
  plumber        = require("gulp-plumber"),
  sass           = require("gulp-sass"),
  cleanCSS       = require("gulp-clean-css"),
  autoPrefixer   = require("gulp-autoprefixer"),
  uglify         = require("gulp-uglify"),
  concat         = require("gulp-concat"),
  sourcemaps     = require("gulp-sourcemaps"), 
  rename         = require("gulp-rename"),
  bsync          = require("browser-sync").create()

// gulp gulp-plumber gulp-sass gulp-autoprefixer gulp-uglify gulp-concat gulp-sourcemaps gulp-rename browser-sync

const source = {
  css: [
    'sass/main.sass'
  ],
  js: [
    'js/main.js',
  ]
}

const distribute = {
  fileName: {
    css: 'main.css',
    js: 'main.js'
  },
  location: {
    css: '../dist/css/',
    js: '../dist/js/',
  }
}

const watcher = {
  css: 'sass/**/*.sass',
  js: 'js/**/*.js',
  php: [
    '../**/*.php',
    '../**/*.html'
  ]
} 

const proxy = {
    proxy: "itech",
    host: "itech",
    open: false
  }
gulp.task('browserSync', ()=> bsync.init(proxy)) 


gulp.task('style', function() {
  return gulp.src(source.css)
    .pipe(plumber())
    .pipe(sourcemaps.init())
      .pipe(sass().on('error',sass.logError))
      .pipe(autoPrefixer())
      // .pipe(cleanCSS())
      .pipe(rename(distribute.fileName.css))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(distribute.location.css))
    .pipe(bsync.stream())
})


gulp.task('javascript', function() {
  return gulp.src(source.js)
    .pipe(plumber())
    .pipe(sourcemaps.init())
      .pipe(uglify())
      .pipe(concat(distribute.fileName.js))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(distribute.location.js))
})




// just compile and exit
gulp.task('default', ['style', 'javascript'])

// easy watcher | dev
gulp.task('watch', ['style', 'javascript'], function() {
  gulp.watch(watcher.css, ['style'])
  gulp.watch(watcher.js, ['javascript'])
})

// browser sync watcher | bar
gulp.task('bar', ['browserSync', 'style', 'javascript'], function() {
  gulp.watch(watcher.css, ['style'])
  gulp.watch(watcher.js, ['javascript']).on('change', bsync.reload)
  gulp.watch(watcher.php).on('change', bsync.reload)
})
