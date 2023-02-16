<?php
// Los nombres de las rutas empiezan siempre con mayuscula aunque no lo esten en su nombre original.
use App\Http\Controllers\BeerController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\AssignOp\Concat;
use App\Http\Controllers\BreweryController;
use App\Http\Controllers\ContactController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('main'));
    // return view('welcome');
})->name('main');


Route::get('/main', function () {
    return view('main');
})->name('main');


Route::get('/about', function () {
    $nombre = 'Marco';
    $apellido = 'Galian';

    // hay dos opciones para retornar las variables, esta de arriba es mas nueva y se compacta porque nuestras variables se llaman igual que lo que esta entre parentesis, sino no fuesen igual habria que hacer como se muestra abajo.
    return view('hola', compact('nombre', 'apellido'));
    // return view ('hola', ['nombre' => 'Marco', 'apellido' => 'Galian']);
})->name('about');

Route::get('/contact', function () {
    return view ('contact');
})->name('contact');


Route::post('/contact', [ContactController::class, 'store'])->name('store');


Route::get('/brewery', [BreweryController::class, 'index'])->name('brewery.index');


Route::get('/brewery/{brewery}', [BreweryController::class, 'show'])->name('brewery.show');

// Aqui creamos un middleware.
Route::group(['Middleware' => 'auth'], function () {
    
    Route::get('/breweries/create', [BreweryController::class, 'create'])->name('brewery.create');
    Route::post('/brewery', [BreweryController::class, 'store'])->name('brewery.store');

    Route::get('/brewery/{brewery}/edit', [BreweryController::class, 'edit'])->name('brewery.edit');
    Route::put('/brewery/{brewery}', [BreweryController::class, 'update'])->name('brewery.update');

    Route::delete('/brewery/{brewery}', [BreweryController::class, 'destroy'])->name('brewery.destroy');
});

Route::get('/cerveceria/{name}', [BreweryController::class, 'friendly'])->name('brewery.friendly');

// Esta linea de rutas es la misma que todas las de arriba, hace lo mismo, lo unico que si queremos que unas tenga seguridad y otras no, hay que hacerlas como arriba, por separado.
Route::resource('/beers', BeerController::class)->parameters(['beer']);


// Sin esto no nos aparece el texto para entrar en usuario y contraseña.
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
