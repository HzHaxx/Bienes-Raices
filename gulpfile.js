// * import... from... significa que estamos importando una función o un objeto de un módulo que esta en node_modules
import path from 'path' // path es un módulo de node que nos permite trabajar con rutas de archivos
import fs from 'fs' // fs sirve para trabajar con el sistema de archivos del sistema operativo
import { glob } from 'glob' // glob es un módulo de node que nos permite buscar archivos en el sistema de archivos
import { src, dest, watch, series } from 'gulp' // gulp es un módulo de node que nos permite automatizar tareas { src, dest, watch, series } son funciones de gulp
// que sirven para leer archivos, escribir archivos, observar cambios en archivos y ejecutar tareas en serie respectivamente
import * as dartSass from 'sass' // dartSass es un módulo de node que nos permite compilar archivos scss a css
import gulpSass from 'gulp-sass' // gulpSass es un módulo de node que nos permite compilar archivos scss a css la diferencia con dartSass es que gulpSass es un wrapper de dartSass
// lo que significa que gulpSass es una interfaz de dartSass
import concat from 'gulp-concat' // concat es un módulo de node que nos permite concatenar archivos
import terser from 'gulp-terser' // terser es un módulo de node que nos permite minificar archivos js
import sharp from 'sharp' // sharp es un módulo de node que nos permite procesar imágenes
import plumber from 'gulp-plumber' // plumber es un módulo de node que nos permite manejar errores en las tareas de gulp
import rename from 'gulp-rename' // rename es un módulo de node que nos permite renombrar archivos

const sass = gulpSass(dartSass) // inicializamos gulpSass con dartSass para poder compilar archivos scss a css

const paths = { // paths es un objeto que contiene las rutas de los archivos que vamos a leer y escribir
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js'
}

// esta función nos permite compilar archivos scss a css
// * pipe es un método de gulp que nos permite concatenar funciones de gulp
// * sourcemaps significan mapas de origen y son archivos que nos permiten mapear el código minificado con el código original
export function css( done ) { // done es una función que nos permite indicarle a gulp que la tarea ha terminado
    src(paths.scss, {sourcemaps: true}) // src es una función de gulp que nos permite leer archivos {sourcemaps: true} es una opción que nos permite generar sourcemaps
        .pipe( plumber() ) // plumber es una función de gulp que nos permite manejar errores en las tareas de gulp
        .pipe( sass({ 
            outputStyle: 'compressed' // outputStyle es una opción de sass que nos permite comprimir el css
        }).on('error', sass.logError) ) // .on es un método de gulp que nos permite ejecutar una función cuando ocurre un error y sass.logError es una función de sass que nos permite mostrar el error en consola
        .pipe( dest('./public/build/css', {sourcemaps: '.'}) ); // dest es una función de gulp que nos permite escribir archivos {sourcemaps: '.'} es una opción que nos permite guardar los sourcemaps en la misma carpeta que el archivo css
    done()
}

// * esta función nos permite concatenar y minificar archivos js
export function js( done ) {
    src(paths.js)
      .pipe(concat('bundle.js')) // aqui concatenamos los archivos js en un solo archivo llamado bundle.js
      .pipe(terser())         // aqui minificamos el archivo js
      .pipe(rename({ suffix: '.min' })) // aqui renombramos el archivo js a bundle.min.js
      .pipe(dest('./public/build/js')) // aqui escribimos el archivo js en la carpeta build/js
    done()
}

// * esta función nos permite procesar imágenes lo que significa que las imágenes se comprimen y se convierten a formatos webp y avif
export async function imagenes(done) { // async permite definir una función asincrona que significa que la función puede esperar a que se resuelva una promesa
    const srcDir = './src/img';
    const buildDir = './public/build/img';
    const images =  await glob('./src/img/**/*') // aqui buscamos todas las imágenes en la carpeta src/img y sus subcarpetas

    images.forEach(file => {
        const relativePath = path.relative(srcDir, path.dirname(file));
        const outputSubDir = path.join(buildDir, relativePath);
        procesarImagenes(file, outputSubDir);
    });
    done();
}


// * la diferencia entre esta función y la anterior es que esta función no es asincrona para poder usarla en la tarea de gulp
function procesarImagenes(file, outputSubDir) {
    if (!fs.existsSync(outputSubDir)) {
        fs.mkdirSync(outputSubDir, { recursive: true })
    }
    const baseName = path.basename(file, path.extname(file))
    const extName = path.extname(file)

    if (extName.toLowerCase() === '.svg') {
        const outputFile = path.join(outputSubDir, `${baseName}${extName}`);
        fs.copyFileSync(file, outputFile);
    } else {
        const outputFile = path.join(outputSubDir, `${baseName}${extName}`);
        const outputFileWebp = path.join(outputSubDir, `${baseName}.webp`);
        const outputFileAvif = path.join(outputSubDir, `${baseName}.avif`);
        const options = { quality: 80 };

        sharp(file).jpeg(options).toFile(outputFile);
        sharp(file).webp(options).toFile(outputFileWebp);
        sharp(file).avif().toFile(outputFileAvif);
    }
}

// * esta función nos permite observar cambios en los archivos scss y js
export function dev() {
    watch( paths.scss, css );
    watch( paths.js, js );
    watch('src/img/**/*.{png,jpg}', imagenes) // aqui observamos cambios en las imágenes
}
    
export default series( js, css, imagenes, dev ) 
