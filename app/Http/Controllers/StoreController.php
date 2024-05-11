<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
class StoreController extends Controller
{
    private $storeModel;

    public function __construct(Store $store) {
        $this->storeModel = $store;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::with('books')->get();

        return response()->json($stores, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate($this->storeModel->rules());

            $createdStore = $this->storeModel->create($request->all());
    
            return response()->json($createdStore, 201);

        } catch (ValidationException $exception) {
            return response()->json(['errors' => $exception->validator->errors()], 422);
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
        
        $store = Store::findOrFail($id);

        
        if ($store->books()->exists()) {
            
            return response()->json($store->load('books'), 200);

        } else {
            
            return response()->json($store, 200);
        }
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
        $store = Store::findOrFail($id);

        $store->update($request->all());

        return response()->json($store, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store = Store::findOrFail($id);

        $store->delete();

        return response()->json(['message' => 'Store successfully deleted'], 200);
    }
}
