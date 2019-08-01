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
            $store_id = $request->input('store_id');
            $store_name = $request->input('store_name');
            $store_url = $request->input('store_url');
            $large_category = $request->input('large_category');
            $small_category = $request->input('small_category');
            $coupon_site = $request->input('coupon_site');
            $coupon_name = $request->input('coupon_name');
            $coupon_term = $request->input('coupon_term');
            $coupon_expire = $request->input('coupon_expire');
            $coupon_url = $request->input('coupon_url');
            
            $query = \App\Coupon::query();
            
            if(!empty($store_id)) {  
                $query->where('store_id', $store_id);
            }
            
            if(!empty($store_name)) {
                $query->where('store_name', 'like', '%'.$store_name.'%');
            }
            
            if(!empty($store_url)) {
                $query->where('store_url', 'like', '%'.$store_url.'%');
            }
            
            if(!empty($large_category)) {
                $query->where('large_category', 'like', '%'.$large_category.'%');
            }
            
            if(!empty($small_category)) {
                $query->where('small_category', 'like', '%'.$small_category.'%');
            }
            
            if(!empty($coupon_site)) {
                $query->where('coupon_site', 'like', '%'.$coupon_site.'%');
            }
            
            if(!empty($coupon_name)) {
                $query->where('coupon_name', 'like', '%'.$coupon_name.'%');
            }
            
            if(!empty($coupon_expire)) {
                $query->where('coupon_expire', 'like', '%'.$coupon_expire.'%');
            }
            
            if(!empty($coupon_term)) {
                $query->where('coupon_term', 'like', '%'.$coupon_term.'%');
            }
            
            if(!empty($coupon_url)) {
                $query->where('coupon_url', 'like', '%'.$coupon_url.'%');
            }

           else{
               
               $coupons = \App\Coupon::all();
            }
        
        $coupons = $query->get();
        $coupons = $query->orderBy('created_at','desc')->get();
        
        return view('welcome')->with('coupons', $coupons)
                              ->with('store_id', $store_id)
                              ->with('store_name', $store_name)
                              ->with('store_url', $store_url)
                              ->with('large_category', $large_category)
                              ->with('small_category', $small_category)
                              ->with('coupon_site', $coupon_site)
                              ->with('coupon_name', $coupon_name)
                              ->with('coupon_term', $coupon_term)
                              ->with('coupon_expire', $coupon_expire)
                              ->with('coupon_url', $coupon_url);
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
