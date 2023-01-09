const autoprefixer = require( 'autoprefixer' );
const babel = require( 'gulp-babel' );
const bourbon = require( 'bourbon' ).includePaths;
const browserSync = require( 'browser-sync' );
const cheerio = require( 'gulp-cheerio' );
const concat = require( 'gulp-concat' );
const cssnano = require( 'gulp-cssnano' );
const del = require( 'del' );
const gulp = require( 'gulp' );
const gutil = require( 'gulp-util' );
const imagemin = require( 'gulp-imagemin' );
const mqpacker = require( 'css-mqpacker' );
const neat = require( 'bourbon-neat' ).includePaths;
const notify = require( 'gulp-notify' );
const plumber = require( 'gulp-plumber' );
const postcss = require( 'gulp-postcss' );
const reload = browserSync.reload;
const rename = require( 'gulp-rename' );
const sass = require( 'gulp-sass' );
const sort = require( 'gulp-sort' );
const sourcemaps = require( 'gulp-sourcemaps' );
const spritesmith = require( 'gulp.spritesmith' );
const svgmin = require( 'gulp-svgmin' );
const svgstore = require( 'gulp-svgstore' );
const uglify = require( 'gulp-uglify' );
const wpPot = require( 'gulp-wp-pot' );
const svgSprite = require("gulp-svg-sprite");
const svg2png = require('gulp-svg2png');
const path = require('path');
const inject = require('gulp-inject');


// Set assets paths.
const paths = {
    'css': [ './*.css', '!*.min.css' ],
    'images': 'img/raw/*.{png,jpg,gif,jpeg}',
    'php': [ './*.php', './**/*.php', '/components/*.php' ],
    'sass': 'scss/*/*.*',
    'concat_scripts': 'js/concat/*.js',
    'scripts': 'js/main.js',
    'sprites': 'img/sprites/*.png',
    'icons': 'img/svg/raw/*.svg',
};

/**
 * Handle errors and alert the user.
 */
function handleErrors () {
    const args = Array.prototype.slice.call( arguments );

    notify.onError( {
        'title': 'Task Failed [<%= error.message %>',
        'message': 'See console.',
        'sound': 'Sosumi' // See: https://github.com/mikaelbr/node-notifier#all-notification-options-with-their-defaults
    } ).apply( this, args );

    gutil.beep(); // Beep 'sosumi' again.

    // Prevent the 'watch' task from stopping.
    this.emit( 'end' );
}

gulp.task( 'svg', [ 'clean:icons' ], () =>
    gulp.src( paths.icons )

        // Deal with errors.
        .pipe( plumber( {'errorHandler': handleErrors} ) )

        // Minify SVGs.
        .pipe( svgmin() )

        // Combine all SVGs into a single <symbol>
        .pipe( svgstore( {'inlineSvg': true} ) )

        // Clean up the <symbol> by removing the following cruft...
        .pipe( cheerio( {
            'run': function ( $, file ) {
                $( 'svg' ).attr( 'style', 'display:none' );
            },
            'parserOptions': {'xmlMode': false}
        } ) )

        // Save svg-icons.svg.
        .pipe( gulp.dest( 'img/svg/compressed/' ) )
        .pipe( browserSync.stream() )
);

/**
 * Delete the svg-icons.svg before we minify, concat.
 */
gulp.task( 'clean:icons', () =>
    del( [ 'assets/images/svg-icons.svg' ] )
);

/**
 * Delete style.css and style.min.css before we minify and optimize
 */
gulp.task( 'clean:styles', () =>
    del( [ 'style.css', 'style.min.css' ] )
);

/**
 * Compile Sass and run stylesheet through PostCSS.
 *
 * https://www.npmjs.com/package/gulp-sass
 * https://www.npmjs.com/package/gulp-postcss
 * https://www.npmjs.com/package/gulp-autoprefixer
 * https://www.npmjs.com/package/css-mqpacker
 */
gulp.task( 'postcss', [ 'clean:styles' ], () =>
    gulp.src( 'scss/style.scss', paths.css )

        // Deal with errors.
        .pipe( plumber( {'errorHandler': handleErrors} ) )

        // Wrap tasks in a sourcemap.
        .pipe( sourcemaps.init() )

            // Compile Sass using LibSass.
            .pipe( sass( {
                'includePaths': [].concat( bourbon, neat ),
                'errLogToConsole': true,
                'outputStyle': 'expanded' // Options: nested, expanded, compact, compressed
            } ) )

            // Parse with PostCSS plugins.
            .pipe( postcss( [
                autoprefixer( {
                    'browsers': [ 'last 2 version' ],
                    'grid': true,
                } ),
                // mqpacker( {
                //     'sort': false
                // } )
            ] ) )

        // Create sourcemap.
        .pipe( sourcemaps.write() )

        // Create style.css.
        .pipe( gulp.dest( './' ) )
        .pipe( browserSync.stream() )
);

/**
 * Minify and optimize style.css.
 *
 * https://www.npmjs.com/package/gulp-cssnano
 */
gulp.task( 'cssnano', [ 'postcss' ], () =>
    gulp.src( 'style.css' )
        .pipe( plumber( {'errorHandler': handleErrors} ) )
        .pipe( cssnano( {
            'safe': true // Use safe optimizations.
        } ) )
        .pipe( rename( 'style.min.css' ) )
        .pipe( gulp.dest( './' ) )
        .pipe( browserSync.stream() )
);


/**
 * Optimize images.
 *
 * https://www.npmjs.com/package/gulp-imagemin
 */
gulp.task( 'imagemin', () =>
    gulp.src( paths.images )
        .pipe( plumber( {'errorHandler': handleErrors} ) )
        .pipe( imagemin( {
            'optimizationLevel': 5,
            'progressive': true,
            'interlaced': true
        } ) )
        .pipe( gulp.dest( 'img/raster/compressed' ) )
);

/**
 * Concatenate and transform JavaScript.
 *
 * https://www.npmjs.com/package/gulp-concat
 * https://github.com/babel/gulp-babel
 * https://www.npmjs.com/package/gulp-sourcemaps
 */
gulp.task( 'concat', () =>
    gulp.src( paths.scripts )

        // Deal with errors.
        .pipe( plumber(
            {'errorHandler': handleErrors}
        ) )

        // Start a sourcemap.
        .pipe( sourcemaps.init() )

        // Convert ES6+ to ES2015.
        .pipe( babel( {
            presets: [ 'es2015' ]
        } ) )

        // Concatenate partials into a single script.
        .pipe( concat( 'project.js' ) )

        // Append the sourcemap to project.js.
        .pipe( sourcemaps.write() )

        // Save project.js
        .pipe( gulp.dest( 'js/compiled/' ) )
        .pipe( browserSync.stream() )
);

/**
  * Minify compiled JavaScript.
  *
  * https://www.npmjs.com/package/gulp-uglify
  */
gulp.task( 'uglify', [ 'concat' ], () =>
    gulp.src( paths.scripts )
        .pipe( rename( {'suffix': '.min'} ) )
        .pipe( uglify( {
            'mangle': false
        } ) )
        .pipe( gulp.dest( 'js/' ) )
);


gulp.task('svgstore', function () {
    var svgs = gulp
        .src('img/svg/raw/*.svg')
        .pipe(svgstore({ inlineSvg: true }));

    function fileContents (filePath, file) {
        return file.contents.toString();
    }

    return gulp
        .src('/*.php')
        .pipe(inject(svgs, { transform: fileContents }))
        .pipe(gulp.dest('/'));
});

gulp.task('svg2png', function () {
    return gulp.src('./img/svg/raw/*.svg')
            .pipe(svg2png())
            .pipe(gulp.dest('img/pngs/'));
});

/**
 * Process tasks and reload browsers on file changes.
 *
 * https://www.npmjs.com/package/browser-sync
 */

gulp.task( 'watch', function () {

    // Run tasks when files change.
    gulp.watch( paths.icons, [ 'svg' ] ).on('change', browserSync.stream);
    gulp.watch( paths.sass, [ 'styles' ] ).on('change', browserSync.stream);
    gulp.watch( paths.scripts, [ 'scripts' ] ).on('change', browserSync.stream);
    gulp.watch( paths.concat_scripts, [ 'scripts' ] ).on('change', browserSync.stream);
    gulp.watch( paths.php, [ 'markup' ] ).on('change', browserSync.stream);

    // Kick off BrowserSync.
    browserSync( {
        'open': true,             // Open project in a new tab?
        'injectChanges': true,     // Auto inject changes instead of full reload.
        port: 8181,
        'host': 'http://localhost:8888/smart-flyer',
        'proxy': 'http://localhost:8888/smart-flyer',    // Use http://_s.com:3000 to use BrowserSync.

    } );


} );

/**
 * Create individual tasks.
 */
gulp.task( 'markup', browserSync.reload );
// gulp.task( 'sprites', [ 'spritesmith' ] );
// gulp.task( 'scripts', [ 'uglify' ] );
gulp.task( 'scripts', [ 'concat' ] );
gulp.task( 'styles', [ 'cssnano' ] );
gulp.task( 'default', [ 'clean:icons', 'styles', 'scripts', 'imagemin', 'watch'] );
