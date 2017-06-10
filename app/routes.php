<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('Todolist/todolist');
});

Route::get('pages/{page}',function($page){
	$view_page = 'site.pages.'.$page;
	if(View::exists($view_page))
		return View::make('site.pages.template')->nest('contenu', $view_page);
	return App::abort('404');
});

Route::get('todolist', function(){
	$task = DB::table('Tasks')->get();
	return View::make('AdminLTE.form')->with('tasks', $task);
});
Route::post('todolist', function(){
	$inputs = Input::except('_token');
	DB::table('tasks')->insert(
		array(
			'title' => $inputs["title"],
			'description' => $inputs["description"],
			'date' => $inputs["date"]
		)
	);	
	$task = DB::table('Tasks')->get();
	return View::make('AdminLTE.form')->with('tasks', $task);
});

Route::get('todolist/modifier/{id}', function($id){
	return View::make('AdminLTE.modifier')->with($id);
});

Route::post('todolist/modifier/{id}', function($id){
	$inputs = Input::except('_token');
	DB::table('tasks')
		->where('id', '=', $id)
		->update(
			array(
			'title' => $inputs["title"],
			'description' => $inputs["description"],
			'date' => $inputs["date"]
			)
		);
	return Redirect::to('Todolist/todolist');
});


Route::get('todolist/supprimer/{id}', function($id){
	DB::table('tasks')
		->where('id', '=', $id)
		->delete();
		return Redirect::to('Todolist/todolist');
});

App::missing(function($exception){
    return Response::make('Page Introuvable', 404);
});