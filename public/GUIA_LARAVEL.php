<?php GUIA DE LARAVEL


1) Instalación 
GET COMPOSER
https://getcomposer.org/

Indicar en la instalacion del composer la ruta de nuestro php
C:\xampp\php\php.exe

Windows + r -> cmd


2) Configuracion

$ cd nombreRepositorio   "C:\xampp\htdocs"

Para crear un Nuevo Proyecto "Cinema" - Instalacion Via Composer Create-Project
$ composer create-project --prefer-dist laravel/laravel Cinema


Para ayudas con Artisan (Artisan es la interfaz de comandos de Laravel)
 $ php artisan -h
 https://laravel.com/docs/5.2/artisan


Modificamos el nombre del archivo .env.example. por .env y agregamos nuestras credenciales.

Por ultimo solo debemos generar una key para nuestra app. (no necesariamente)
 $ php artisan key:generate

Listo ya podemos ejecutar el proyecto Cinema.
$ php artisan serve
http://127.0.0.1/Cinema/public

Para modificar el namespace en todo el proyecto "App" por "Cinema";
 $ php artisan app:name Cinema



Modificar el archivo de Configuracion  
config/app.php
'debug' => env('APP_DEBUG', false),
'timezone' => 'America/New_York',
'locale' => 'en', to 'es'
		resources/lang/es
		google laravel 5 lang -> github
		https://github.com/caouecs/Laravel-lang

config/database.php	
    'default' => env('DB_CONNECTION', 'mysql'),

.env
APP_DEBUG=true para que nos muestre los errores false en produccion
DB_DATABASE=cinema  configurar datos de base de datos



3) Declarando una misma ruta de css y js para todos los views 
your_project/composer.json 


https://laravelcollective.com/docs/5.2/html#installation

a)  agregar varios "laravelcollective/html": "5.2.*" en el Archivo :  laravel/composer.json 

example:

    "require": {
        "php": ">=5.5.9",       
        "laravel/framework": "5.2.*",
        "laravelcollective/html": "5.2.*"
    },



Next, update Composer from the Terminal:


 $ composer update

Next, add your new provider to the providers array of config/app.php:

  'providers' => [
    // ...
    Collective\Html\HtmlServiceProvider::class,
    // ...
  ],
Finally, add two class aliases to the aliases array of config/app.php:

  'aliases' => [
    // ...
      'Form' => Collective\Html\FormFacade::class,
      'Html' => Collective\Html\HtmlFacade::class,
    // ...
  ],


4) PARA CUANDO LE DA LA PICADA DE CULO

php artisan route:clear
php artisan cache:clear
composer update

5) Declarando Rutas 
Http/routes.php

	Route::get('/', function () {
	    return view('welcome');
	});
	Route::get('prueba', function(){
		return "Hola desde routes.php";
	});
	Route::get('nombre/{nombre}/apellido/{apellido}', function($nombre, $apellido){
		return 'nombre: '.$nombre;
	});


	Route::get('disco/{disco?}', function( $disco = 'WD'){
		return 'Nombre disco: '.$disco;
	});

	Route::get('controlador','PruebaController@index');

	Route::get('nick/{nick}','PruebaController@nick');

	Route::resource('photo', 'PhotoController');

	Route::resource('movie', 'MovieController');


4) Declarando Controladores
app/Http/Controllers/ 

class NameController extends Controller{

          Route::get('user/{id}', 'Controlador@MetodoControlador');
example:  Route::get('user/{id}', 'UserController@showProfile');

# RESTful Resource Controllers

 $ php artisan make:controller PhotoController --resource

 //Next, you may register a resourceful route to the controller:
	Route::resource('photo', 'PhotoController');

Actions Handled By Resource Controller

Verb	Path			Action	Route Name
GET		/photo			index	photo.index
GET		/photo/create	create	photo.create
POST	/photo			store	photo.store
GET		/photo/{photo}	show	photo.show
GET		/photo/{photo}/edit	edit	photo.edit
PUT/PATCH	/photo/{photo}	update	photo.update
DELETE	/photo/{photo}	destroy	photo.destroy	


5) Declarando Modelos / Eloquent ORM

*** Recuerda generar los modelos segun su dependencias en la base de datos
si la tabla "A" tiene un foreignkeys con la tabla "B" genera primero el modelo B y luego tabla A.

app/nameModels.php

# para crear automaticamente 

 $ php artisan make:model nameModels -m
 example:  $ php artisan make:model Movie -m

php artisan make:model Articles -m

va a crear 2 archivos el modelo y el archivo migrate (para crear la tabla)

si solo quieres crear la tabla por tu cuenta ver 6) Declarando Migraciones 

ahora nos vamos al archivo migrate 
database/migrations/create_articles_table.php

            $table->increments('id');
            $table->string('body');
            $table->text('id');
            $table->timestamps();
            $table->timestamps('published_at');


para poder hacer rollback con comando migrate
composer require doctrine/dbal             

a)utiliza esto para llenar la tabla via comando
php artisan tinker 

b) o si quieres pueder rellenar la tabla desde un controlador haciando instancia al modelo

To create a new record in the database, simply create a new model instance, set attributes on the model, then call the save method:

i) Creando el controller

$ php artisan make:controller Articles --resource

ii) Asignando Valores a los campos de la base de datos
<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articles; //Importante Agregar 

or 

namespace Cinema\Http\Controllers;
use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Articles;

class ArticlesController extends Controller
{
    /**
     * Create a new Articles instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request...

    	//nameTables = new nameModel
        $Articles = new Articles;

        $Articles->name = $request->name;
        $Articles->name = 'New Flight Name';

        $Articles->save();
    }
}

iii) Retrieving Data like Json

	// funtion del controlador
    public function index()
    {
        //
        $articles = Articles::all();    

        return $articles;
    }

// retorno de data como Json
[
	{"id":1,"title":"Firts Articles","body":"Lorep Septum New Flight Name","created_at":"2016-03-21 06:41:14","updated_at":"2016-03-21 06:41:14","published_at":"0000-00-00 00:00:00"},
	{"id":2,"title":"Second Articles","body":"Lorep Septum New Flight Name","created_at":"2016-03-21 06:55:49","updated_at":"2016-03-21 06:55:49","published_at":"0000-00-00 00:00:00"}
]

iv) Retrieving Data with view

	// funtion del controlador
    public function index()
    {
        //
        $articles = Articles::all();    

        return view('articles.index', compact('articles'));
    }

    // desde el view

    @extends('layouts.app')
	@section('content')
		<h1>Articles: </h1>
		<p>
			@foreach ($articles as $article)
				<article>
					<h2>{{ $article->title }}</h2>
					<div class="body">{{ $article->body }}</div>
					or
					<a href="{{ action('ArticlesController@show', [$article->id]) }}"><h2>{{ $article->title }}</h2></a>
				</article>				
			@endforeach		
		</p>
	@endsection	




6) Declarando Migraciones 

https://laravel.com/docs/5.2/migrations#introduction
Crear Manualmente la Base de Datos para luego hacer la Migracion
CREATE database cinema; unicode latin_unicode_sf


php artisan make:migration "Nombre de la Migracion" --create  or 
php artisan make:migration add_votes_to_users_table --table=users
php artisan make:migration create_users_table --create=users

 example:  $ php artisan make:migration create_users_table --create="users"


Esquema para construir secciones para crear la base de datos desde laravel 
schema builder / Available Column Types / Migration Structure

https://laravel.com/docs/5.2/migrations#migration-structure

Abrimos nuestro archivo para modificar el Esquema de Estructura de Migracion en example:

example: database/migrations/2016_03_08_071932_create_movies_table.php

			class CreateMoviesTable extends Migration
			{
			    /**
			     * Run the migrations.
			     *
			     * @return void
			     */
			    public function up()
			    {
			        Schema::create('movies', function (Blueprint $table) {
			            $table->increments('id');
			            $table->string('name');
			            $table->string('email')->unique();
			            $table->string('password', 60);
			            $table->string('cast');
			            $table->string('direction');
			            $table->string('duration');
			            $table->timestamps();
			            $table->integer('genres_id')->unsigned();
			            $table->foreign('genres_id')->references('id')->on('genres'); ***           
			        });
			    }

					*** para hacer un foreignkeys
			    /**
			     * Reverse the migrations.
			     *
			     * @return void
			     */
			    public function down()
			    {
			        Schema::drop('movies');
			    }
			}


Crear Manualmente la Base de Datos para luego hacer la Migracion
CREATE database cinema; unicode latin_unicode_sf

 $ php artisan migrate or 
 $ php artisan migrate:rollback




7) Declarando Vistas

resources/views/contacto.php


a) Declarando la ruta

Route::get('/', function () {
    return view('contacto');
});

otros ejemplos
		resources/views/admin/profile.php, you may reference it like so:

		return view('admin.profile', $data);

		resources/views/greeting.php, 

		we may return it using the global view helper function like so:

		Route::get('/', function () {
		    return view('greeting', ['name' => 'James']);
		});

b) Declarando el Controller

    /**
     * Display a listing 
     */
    public function contacto()
    {
        return view('contacto');
    }


8) Pasando data
        
        $name= "Gerzahim";
        //return view('about')->with('name',$name);
		<h1>About me: {{$name}}</h1>        

        $name1= '<span style="color:red;"> Salas </span>';
        //return view('about')->with('name1',$name1);
		<h1>About me: {!! $name1 !!}</h1>

        return view('about')->with([
            'name'=> 'Gerzahim',
            'lastn'=> 'Salas'
            ]);
        <h1>About me: {{$name}} {{$lastn}}</h1>


        $data=[];
        $data['first'] = "Gerzahim";
        $data['last'] = "Salas";
        return view('about', $data);        
        
        $first= "Gerzahim";
        $last= "Salas";
        return view('about', compact('first','last')); 



9) Declarando Plantillas

a) Creando el template "Defining A Layout"
crear carpeta layouts en 
resources/views/layouts/contacto.blade.php
los templates siempre terminan en .blade.php

<!-- Stored in resources/views/layouts/master.blade.php -->

<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>


b) Extending A Layout

<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection


c) Declarando el llamado

from routes.php

 <-- Stored in resources/views/child.blade.php -->
 
	Route::get('blade', function () {
	    return view('child');
	});

or from Controller

   <-- Stored in resources/views/child.blade.php -->

    public function reviews()
    {
        return view('child');
    }  


///////////////////////////////
https://laravelcollective.com/

10) para la edicion de formularios 

Error: 
Non-static method Illuminate\Http\Request::all() should not be called statically, assuming $this from incompatible context


sustituir 
//use Illuminate\Http\Request;
por 
use Request;

//recuerda ponerlo antes de articles/id porque sino entra alli pensado que la palabra create es un id
Route::get('articles/create','ArticlesController@create');
Route::get('articles/{id}','ArticlesController@show');

para ayuda https://laravelcollective.com/docs/5.0/html

{!! Form::open() !!}
{!! Form::close() !!}

esto produce esto

    <form method="POST" action="http://127.0.0.1/laravel/public/articles/create/..." accept-charset="UTF-8"><input name="_token" type="hidden">
    </form>

        {!!Form::label('title','Title')!!}
        {!!Form::text('title', 'null')!!}
        
        para agregar el boton submit
        {!!Form::submit('Add Article')!!}

example:

@extends('layouts.admin')
    @section('content')
            {!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
                <div class="form-group">
                    {!!Form::label('nombre','Nombre:')!!}
                    {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('email','Correo:')!!}
                    {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('password','Contraseña:')!!}
                    {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
                </div>
                {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            {!!Form::close()!!}         
    @endsection


11) para la Validaciones 

usamos Request

 $ php artisan make:request     //Create a new form request class
 
 $ php artisan make:request UserCreateRequest

<!-- Stored in app/Http/Request/UserCreateRequest.php -->

agregamos en el controlador UsuarioController

use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;


sustituir 
    public function update(Request $request, $id)
    public function update(UserUpdateRequest $request, $id)


  public function authorize()
    {
        return false; 
        //cambiar por 
        return true;
    }

    public function rules()
    {
        return [
        //agregar las execpciones
            'title' => 'required|min:3',
            'body' => 'required|max:400',
            'email' => 'required|unique:users',
            'published_at' => 'required|date',
        ];
    }    



12)  Creando Login , Autenticacion


    php artisan make:auth 

    it's gonna add 
    Route::auth();
    Route::get('/home', 'HomeController@index');

    and create /resources/views/auth blades files

    "Add" this to HomeController.php
    use Illuminate\Foundation\Auth\ThrottlesLogins;
    use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


    php artisan migrate 


13) Ajustando las Fechas de los migrates 

si tienes tablas con foreignkeys deben crearse luego de la tabla que hacen index


14) Seeder

Add Fillable on Models/Product.php
    

class Product extends Model
{
    protected $fillable = ['sku','title','description','imagepath','price','quantity','status','categories_id','brand_id'];
}




php artisan make:seed ProductTableSeeder

It'll create 2 seeds Files in database/seeds 



ProductTableSeeder.php

    public function run()
    {
        $product = new \App\Product([
            'sku'=> 'MM101',
            'title'=> 'Product 1',
            'imagepath'=> 'MM101.jpg',
            'price'=> '10.5',
            'quantity'=> '100',
            'status'=> '1',
            'categories_id'=> '0',
            'brand_id'=> '0'
        ]);
        $product->save();

        $product = new \App\Product([
            'sku'=> 'MM102',
            'title'=> 'Product 2',
            'imagepath'=> 'MM102.jpg',
            'price'=> '11.5',
            'quantity'=> '100',
            'status'=> '1',
            'categories_id'=> '0',
            'brand_id'=> '0'
        ]);
        $product->save();
    }


DatabaseSeeder.php    

public function run()
{
    $this->call(ProductTableSeeder::class);
}


Ejecutar Comando 
php artisan db:seed 