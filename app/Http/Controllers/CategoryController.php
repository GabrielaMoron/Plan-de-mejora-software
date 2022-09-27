<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\categoryCollection;
use App\Http\Resources\categoryResource;
use App\Http\Controllers\BaseController;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(new categoryCollection(category::all()));
    //     try{
    //         return $this->sendResponse(new actorCollection(actor::all()));
    //     }catch(\Exception $e){
    //     return $this->sendError('Server Error', 500);
    //     /*return response()->json([
    //         "success" => true,
    //         "data" => new BootcampCollection(Bootcamp::all())
    //     ] , 200 );*/
    // }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActorRequest $request)
    {
        try{
            return $this->sendResponse(new categoryResource(category::create($request->all())));
        }catch(\Exception $e){
        return $this->sendError('Server Error', 500);
        /*return response()->json([
            "success" => true,
            "data" => new BootcampResource (Bootcamp::create($request->all()))
        ] , 201);*/
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $category = category::find($id);
            return $this->sendResponse(new categoryResource($category));
        } catch (\Exceptio $e) {
            return $this->sendError("categoria con el :'$id' no encontrada", 400);
        }
        /*return response()->json([
            "success" => true,
            "data" => new BootcampResource(Bootcamp::find($id))
        ] , 200 );*/

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
        try {
            $b = category::find($id);
            if (!$b) {
                return $this->sendError("categoria con el :'$id' no encontrada", 400);
            }
        } catch (\Exceptio $e) {
            $b->update($request->all());
            return $this->sendResponse(new categoryResource($b));
        }
        /*return response()->json([
            "success" => true,
            "data" => new BootcampResource($b)
        ] , 200);*/
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $b = category::find($id);
            if(!$b){
                return $this->sendError("categoria con el :'$id' no encontrada", 400);
            }
        } catch (\Exceptio $e) {
            $b->delete();
            return $this->sendResponse(new categoryResource($b));
        /*return response()->json([
            "success" => true,
            "data" => new BootcampResource($b)
        ] , 200);*/
    }
    }
}