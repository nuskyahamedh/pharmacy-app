<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct()
    {
     
        $this->middleware(['permission:add-items'], ['only' => ['store']]);
        $this->middleware(['permission:update-items'], ['only' => ['update']]);
        $this->middleware(['permission:delete-items'], ['only' => ['destroy']]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $item = new Item();
            $item->item_name = $request->item_name;
            $item->price = $request->price;
            $item->item_description = $request->item_description;
            $item->save();

            return ['status' => 'success', 'msg' => 'item saved'];
        } catch(Exception $e) {
            Log::info($e);
            return ['status' => 'fail', 'msg' => $e->getMessage()];
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $item = Item::find($id);
            if($item) {
                $item->item_name = $request->item_name;
                $item->price = $request->price;
                $item->item_description = $request->item_description;
                $item->save();
            } else {
                return ['status' => 'success', 'msg' => 'Item Not Found'];
            }
           

            return ['status' => 'success', 'msg' => 'item saved'];
        } catch(Exception $e) {
            Log::info($e);
            return ['status' => 'fail', 'msg' => $e->getMessage()];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $item = Item::find($id);
            if($item) {
                $item->delete();
            } else {
                return ['status' => 'success', 'msg' => 'Item Not Found'];
            }
           

            return ['status' => 'success', 'msg' => 'item deleted'];
        } catch(Exception $e) {
            Log::info($e);
            return ['status' => 'fail', 'msg' => $e->getMessage()];
        }
    }
}
