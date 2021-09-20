<?php

use Illuminate\Support\Facades\Route;

/* Tipos de peticiones "rutas" :
    Route::get()
    Route::post()
    --------------
    Route::put()
    Route::patch()
    Route::delete()
*/

// Ejemplo1 : pasando parámetros por url
Route::get('saludo/{nombre}', function($nombre) {
    return "Te saludamos $nombre";
});

// Ejemplo2 : pasando parámetros 'nombre' pero que no sea obligatorio
Route::get('segundosaludo/{nombre?}', function($nombre = "Por Defecto") {
    return "Parametro no obligatorio $nombre";
});


/* RUTAS CON NOMBRES */
// Ejemplo1 : 

/* P1: 
    haciendo referencia por metodo de enlace.
    PSDT: no es la mejor forma pero para el ejemplo está bien.

    Route::get('/', function() {
        echo "<a href='contactos'>Contacto 1</a><br>";
        echo "<a href='contactos'>Contacto 2</a><br>";
        echo "<a href='contactos'>Contacto 3</a><br>";
    }
*/
    
/* P2: 
    supongamos que nos manda a cambiar la dirección 'contactos' por 'contactanos'.
    Todos los enlaces que tenían referencia a la antigua ruta se tendría que modificar.
    Si fueran 20, 50 ó 100 enlaces tendríamos que cambiar todas ellas manualmente.
    Para evitar ese tiempo, se aplica en poner rutas a los enlaces.
*/

/* P3
    Poniendo nombre a la ruta, para que en vez de cambiar toda las rutas, solo seria
    cuestion de modificar solo el nombre que se le ha aplicado a la ruta.
    Esta es una buena practica a seguir.
*/
/*Route::get('contacto', function() {
    return 'Estas en la ruta de contactanos';
}) -> name('contactanos');

Route::get('/', function() {
    echo "<a href='" . route('contactanos'). "'>Contacto 1</a><br>";
    echo "<a href='" . route('contactanos'). "'>Contacto 2</a><br>";
    echo "<a href='" . route('contactanos'). "'>Contacto 3</a><br>";
});*/


/* MOSTRAR HTML CON LAS VISTAS */
// Route::get('/', function() {
//     return view('home');
// }) -> name('home');


/* PASANDO DATOS A LAS VISTAS */
// ejemplo 2

// forma 1
// method => with(string <variable-name>, varible <the-value>)
/*Route::get( '/', function() {
    // pasando los datos
    $nombre = "Guissela";

    return view('home') -> with('nombre', $nombre);
}) -> name('home');*/


// forma 2 - forma array()
/*Route::get('/', function() {

    $yourName = 'Josselyn';

    // T1 : pasando valor de la variable con el método with()
    //return view('home') -> with(['nombre' => $yourName]);

    // T2 : pasando como parametro dentro de la funcion view();
    return view('home', ['nombre' => $yourName]);

}) -> name('home');*/


// forma 3 -> haciendo lo mismo pero con "menos lineas"
//              utilizando el methodo view directamente.

// method : view(string <rute>, string <name-view>)
// Route::view('/', 'home') -> name('home');

// Pasandole información 
//$yourName = "Ohana";
//Route::view('/', 'home', ['nombre' => $yourName]) -> name('home');

/*
    Utilizando el methos view (Route::view());
    - Si solo vamos a retornar una vista por poco o ninguna información, está
      opción es la más adecuada.
    - Se puede usar por ejemplo: una vista/pagina de 'politicas de privacidad',
      'terminos y condiciones', etc. Paginas que no requieren mucha lógica.
    - Este clousure "Route::view()" es mejor que el "Route::get()" solo en terminos
      de rendimientos.
*/

/* SUPONIENDO QUE VAMOS A MOSTRAR 4 VISTAS EN NUESTRA PÁGINA WEB */
// Esta es la forma correcta de hacer las vistas, creo.

Route::view('/', 'home') -> name('home');
Route::view('/about', 'about') -> name('about');
Route::view('/contact', 'contact') -> name('contact');
Route::view('/portfolio', 'portfolio') -> name('portfolio');
