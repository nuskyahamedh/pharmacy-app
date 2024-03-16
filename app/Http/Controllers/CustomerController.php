<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    function __construct()
    {
     
        $this->middleware(['permission:add-customers'], ['only' => ['store']]);
        $this->middleware(['permission:update-customers'], ['only' => ['update']]);
        $this->middleware(['permission:delete-customers'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $customer = new Customer();
            $customer->customer_name = $request->customer_name;
            $customer->mobile_no = $request->mobile_no;
            $customer->age = $request->age;
            $customer->gender = $request->gender;
            $customer->address = $request->address;
            $customer->save();

            return ['status' => 'success', 'msg' => 'customer saved'];
        } catch(Exception $e) {
            Log::info($e);
            return ['status' => 'fail', 'msg' => $e->getMessage()];
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $customer = Customer::find($id);
            if($customer) {
                $customer->customer_name = $request->customer_name;
                $customer->mobile_no = $request->mobile_no;
                $customer->age = $request->age;
                $customer->gender = $request->gender;
                $customer->address = $request->address;
                $customer->save();
            } else {
                 return ['status' => 'success', 'msg' => 'customer not found'];

            }
           

            return ['status' => 'success', 'msg' => 'customer saved'];
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
            $customer = Customer::find($id);
            if($customer) {
                $customer->delete();
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
