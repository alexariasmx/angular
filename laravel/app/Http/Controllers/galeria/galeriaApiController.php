<?php

namespace App\Http\Controllers\galeria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeria;

class galeriaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Galeria::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Galeria::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Galeria::find($id);
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

        if(Galeria::where('id',$id)->exists()){
            $galeria=Galeria::find($id);
            $galeria->title=$request->title;
            $galeria->body=$request->body;
            $galeria->image='empty';

            $galeria->save();
            return response()->json([
                "message"=>"Galeria actualizada con exito"
            ],200);
        } else {
            return response()->json([
                "message"=>"Galeria no encontrada"
            ],404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(Galeria::where('id',$id)->exists()){
            $galeria=Galeria::find($id);
            $galeria->delete();

            return response()->json([
                "message"=>"Galeria eliminada"
            ],200);
        } else {
            return response()->json([
                "message"=>"Galeria no encontrada"
            ],404);
        }

    }
}
