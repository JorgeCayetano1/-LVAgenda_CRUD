<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function view(){
        $agenda = DB::select('SELECT * FROM VIEW_TASK;');
        return response()->json($agenda);

        // $categories = Category::all();
        // return response()->json($categories);
    }

    public function addTask(Request $request){
        DB::statement('CALL SP_ADDUP_TASKS(0, ?, ?, ?, ?, "A");', 
        [$request->titulo,
        $request->contenido,
        $request->dia,
        $request->idCategoria]);
        
    }

    public function upTask(Request $request){
        DB::statement('CALL SP_ADDUP_TASKS(?, ?, ?, ?, ?, "U");', 
        [$request->id,
        $request->titulo,
        $request->contenido,
        $request->dia,
        $request->idCategoria]);
        return $request;
    }

    public function delTask(Request $request){
        DB::statement('CALL SP_SHOWDEL_TASKS(?, "D");', 
        [$request->id]);
        return $request;
    }

    public function showTask(Request $request){
        $agenda = DB::select('CALL SP_SHOWDEL_TASKS('.$request->id.', "S");');
        return response()->json($agenda);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
