<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        if (\Auth::check()) {
            
            $store_id = $request->input('store_id');
            $store_name = $request->input('store_name');
            $store_url = $request->input('store_url');
            
            $query = \App\Coupon::query();
            
            if(!empty($store_id)) {
                $query->where('store_id', 'like', '%'.$store_id.'%');
            }
            
            if(!empty($store_name)) {
                $query->where('store_name', 'like', '%'.$store_name.'%');
            }
            
            if(!empty($store_url)) {
                $query->where('store_url', 'like', '%'.$store_url.'%');
            }

            else{
            $user = \Auth::user();
            $coupons = $user->all_coupons();
            $coupons =\App\Coupon::orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'coupons' => $coupons,
            ];
            }
        }
        
        $coupons = $query->get();
        $coupons = $query->paginate(10);
        
        return view('welcome')->with('coupons', $coupons);
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
