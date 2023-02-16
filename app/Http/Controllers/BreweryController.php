<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Brewery;
use App\Models\Beer;
use App\Http\Requests\BreweryRequest;

use Illuminate\Support\Facades\Auth;
class BreweryController extends Controller
{


    public function index(){
        $breweries = Brewery::orderBy('name')->get();
        return view('breweries.index', compact('breweries' ));
    }

    //Esto es hacer un binding (Brewery $brewery) y asi laravel me completa la informacion que yo le pido.
    public function show (Brewery $brewery){
        // dd($brewery);
        $code = 0;
        $message = "No se ha producido ningun error";

        
        return view('breweries.show', compact('brewery', 'code', 'message'));
    }

    public function friendly ($name){
        $code = 0;
        $message = "No se ha producido ningun error";

        $breweries = Brewery::where('name', $name)->get();

        if (isset($breweries) && (count($breweries) > 0)) {

            if (count($breweries) > 1) {
                return view('breweries.index', compact('breweries'));
            }else {
                $brewery = $breweries->first();
                return view('breweries.show', compact('brewery', 'code', 'message'));
            }
        }else{
            return redirect()->route('brewery.index');
        }
    }


    public function create() {
        return view('breweries.create');
    }

    public function store(BreweryRequest $request){

        $brewery = new Brewery();
        $brewery->fill($request->validated());

        // $brewery->name = $request->name;
        // $brewery->description = $request->description;
        // $brewery->score = $request->score;

        if($request->hasFile('image')){
        $urlImg = Storage::url($request->file('image')->store('public/breweries'));
        $brewery->img = $urlImg;
        }

        $brewery->user_id = Auth::id();
        $brewery->saveOrFail();
        return redirect()->route('brewery.index');
    }

    public function edit (Brewery $brewery){

        $code = -1;
        $message = "No se ha producido ningun error";

        $beers = Beer::orderBy('name')->get();
        // $brewery = DB::table('breweries') -> find($brewery);
        return view('breweries.edit', compact('brewery', 'beers', 'code', 'message'));
    }


    public function update(BreweryRequest $request, Brewery $brewery){
        // dd($request);
        $brewery->name = $request->name;
        $brewery->description = $request->description;
        $brewery->score = $request->score;
        $urlImg = '';
        if($request->hasFile('image')){
            $urlImg = Storage::url($request->file('image')->store('public/breweries'));
            $brewery->img = $urlImg;
        }

        if ($urlImg != '') {
        
        }
        $beers = $request->beers;
        $brewery->beers()->sync($beers);
        $brewery->saveOrFail();
        return redirect()->route('brewery.index');
    }

    public function destroy(Brewery $brewery){
        $brewery->deleteOrFail();
        return redirect()->route('brewery.index');
    }

    

















// FUNCIONES CREADAS CON QUERYBUILDER ---------------------------------------------------------------------------------------------------------------------------------------------

// Este array comentado lo hemos creado para acceder a nuestros propios datos locales y hacer pruebas antes de utilizar la base de datos-------------------------------------------
    // private function getBreweries () {
    // $breweries = [
    // [1, 'Cerveceria 1', 'Descripcion de la cerveceria 1'],
    // [2, 'Cerveceria 2', 'Descripcion de la cerveceria 2'],
    // [3, 'Cerveceria 3', 'Descripcion de la cerveceria 3'],
    // [4, 'Cerveceria 4', 'Descripcion de la cerveceria 4'],
    // [5, 'Cerveceria 5', 'Descripcion de la cerveceria 5'],
    // [6, 'Cerveceria 6', 'Descripcion de la cerveceria 6'],
    // [7, 'Cerveceria 7', 'Descripcion de la cerveceria 7'],
    // [8, 'Cerveceria 8', 'Descripcion de la cerveceria 8'],
    // [9, 'Cerveceria 9', 'Descripcion de la cerveceria 9'],
    // [10, 'Cerveceria 10', 'Descripcion de la cerveceria 10'],
    // [11, 'Cerveceria 11', 'Descripcion de la cerveceria 11'],
    // [12, 'Cerveceria 12', 'Descripcion de la cerveceria 12'],
    // ];
    // return $breweries;
    // }
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// IndexQB seria la funcion para utilizar con query builder-----------------------------------------------------------------------------------------------------------------------
    public function indexQB() {
    // Aqui accedemos a los datos desde la base de datos:
    // Los dobles dos puntos nos indican que es un metodo estatico.
    $breweries = DB::table('breweries')->get();
    return view('breweries.index', compact('breweries'));

    // Aqui accedemos a los datos de nuestro array breweries:

    // $breweries = $this->getBreweries();
    // return view('breweries.list', compact('breweries'));

    // }
    }

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// showQB seria la funcion para utilizar con query builder-----------------------------------------------------------------------------------------------------------------------
    public function showQB ($id){

    $code = 0;
    $message = "No se ha producido ningun error";

    // Esto tambien se comenta porque ahora buscamos en la base de datos con find-----------------------------------------------------------------------------------------------------
    // $breweries = $this->getBreweries();
    // $brewery = null;
    // $cont = 0;

    // while ($brewery == null && $cont < sizeof($breweries)){ 
    // if ($breweries[$cont][0]==$id) { 
    //$brewery=$breweries[$cont]; 
    // } 
    // $cont ++; 
    // } 

    // Aqui utilizamos el metodo find en lugar de get porque get nos devuelve toda la tabla y find solo el campo id. 
    $brewery=DB::table('breweries') -> find($id);
    return view('breweries.show', compact('brewery', 'code', 'message'));
    }
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// storeQB seria la funcion para utilizar con querybuilder-----------------------------------------------------------------------------------------------------------------------
    public function storeQB(Request $request){

    $name = $request->name;
    $description = $request->description;
    $score = $request->score;
    $urlImg = '';
    if($request->hasFile('image')){

    $urlImg = Storage::url($request->file('image')->store('public/breweries'));
    }

    DB::table('breweries')->insert([
    'name' => $name,
    'description' => $description,
    'score' => $score,
    'img' => $urlImg
    ]);

    return redirect()->route('list');
    }

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// updateQB seria la funcion para utilizar con querybuilder-----------------------------------------------------------------------------------------------------------------------
    public function updateQB(Request $request){

    $name = $request->name;
    $description = $request->description;
    $score = $request->score;
    $urlImg = '';
    $id = $request->id;
    if($request->hasFile('image')){
    $urlImg = Storage::url($request->file('image')->store('public/breweries'));
    }

    $values = [
    'name' => $name,
    'description' => $description,
    'score' => $score,
    ];

    $where = [
    'id' => $id
    ];

    if ($urlImg != '') {
    $values['img'] = $urlImg;
    }
    // DB::table('breweries')->update($values);
    // DB::table('breweries')->where('id' , $id)->update($values);
    // DB::table('breweries')->updateOrInsert($where, $values);
    $brewery = DB::table('breweries')->updateOrInsert($where, $values);
    return redirect()->route('list');
    }
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// destroyQB seria la funcion para utilizar con querybuilder---------------------------------------------------------------------------------------------------------------------

    public function destroyQB($id){
    DB::table('breweries')->delete($id);
    return redirect()->route('brewery.index');
    }
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


}
