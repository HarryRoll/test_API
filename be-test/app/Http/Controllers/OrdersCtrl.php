<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class OrdersCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Orders::All();
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
                "id_customer" => $request->id_customer,
                "id_product" => $request->id_product,
                "id_payment_method" =>$request->id_payment_method
            ];
    
            $data = Orders::create($fill);
    
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
        $data = Orders::findOrFail($id);

        try {
            $data->update([
                'id_customer' => $request->id_customer,
                'id_product' => $request->id_product,
                'id_payment_method' => $request->id_payment_method
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
            $data = Orders::findOrFail($id);

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
