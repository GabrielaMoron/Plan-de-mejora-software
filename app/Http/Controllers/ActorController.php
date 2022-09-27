<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\actor;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreactorRequest;
use App\Http\Resources\actorCollection;
use App\Http\Resources\actorResource;
use App\Http\Controllers\BaseController;

class ActorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(new actorCollection(actor::all()));
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
            return $this->sendResponse(new actorResource(actor::create($request->all())));
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
            $actor = actor::find($id);
            return $this->sendResponse(new actorResource($actor));
        } catch (\Exceptio $e) {
            return $this->sendError("actor with id:'$id' not found", 400);
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
            $b = actor::find($id);
            if (!$b) {
                return $this->sendError("actor with id:'$id' not found", 400);
            }
        } catch (\Exceptio $e) {
            $b->update($request->all());
            return $this->sendResponse(new actorResource($b));
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
            $b = actor::find($id);
            if(!$b){
                return $this->sendError("actor with id:'$id' not found", 400);
            }
        } catch (\Exceptio $e) {
            $b->delete();
            return $this->sendResponse(new actorResource($b));
        /*return response()->json([
            "success" => true,
            "data" => new BootcampResource($b)
        ] , 200);*/
    }
    }
}