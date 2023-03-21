<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data = Product::All();
            return response()->json([
            "code" => 200,
            "message" => "request data succesfully",
            "data" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            $fill = [
                "name" => $request->name,
                "price" => $request->price
            ];
    
            $data = Product::create($fill);
    
            return Response()->json([
                "message" => "new data add succesfully",
                "code" => 200,
                "data" => $data
            ], 200);
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
        $data = Product::findOrFail($id);

        try {
            $data->update([
                'name' => $request->name,
                'price' => $request->price
            ]);
    
            return response()->json([
                'message' => 'data updated has been succesfully',
                'code' => 200,
                'data' => $data
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Updated data failed',
                'error' => $e->getMessage()
            ]);
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
        try {
            $data = Product::findOrFail($id);

            $data->delete();

            return response()->json([
                'code' => 200,
                'message' => "data id {$id} has been deleted"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "data id {$id} not found",
                'code' => 404,
                'error' => $e->getMessage()
            ]);
        }
    }
}
