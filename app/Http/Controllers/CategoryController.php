<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Uso de Querys

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function view(){
        $category = DB::select('SELECT * FROM VIEW_CATEGORY;');
        return response()->json($category);

        // $categories = Category::all();
        // return response()->json($categories);
    }

    public function addCategory(Request $request){
        DB::statement('CALL SP_ADDUP_CATEGORIA(0, ?, "A");', 
        [$request->categories_nom]);
        
    }

    public function upCategory(Request $request){
        DB::statement('CALL SP_ADDUP_CATEGORIA(?, ?, "U");', 
        [$request->id,
        $request->nombre]);
        return $request;
    }

    public function delCategory(Request $request){
        DB::statement('CALL SP_SHOWDEL_CATEGORIA(?, "D");', 
        [$request->id]);
        return $request;
    }

    public function showCategory(Request $request){
        $category = DB::select('CALL SP_SHOWDEL_CATEGORIA('.$request->id.', "S");');
        return response()->json($category);
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
