<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;
use Goodby\CSV\Export\Standard\ExporterConfig;
use App\Coupon;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coupon = \App\Coupon::all();

        return view('coupons.create', [
            'coupon' => $coupon,
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'store_id' => 'required|integer',
            'store_name' => 'required|max:255',
            'large_category' => 'required|max:255',
            'small_category' => 'required|max:255',
            'coupon_site' => 'required|max:255',
            'coupon_name' => 'required|max:255',
            'coupon_term' => 'required|max:255',
        ]);
        
        $request->user()->coupons()->create([
            'store_id' => $request->store_id,
            'store_name' => $request->store_name,
            'store_url' => $request->store_url,
            'large_category' => $request->large_category,
            'small_category' => $request->small_category,
            'coupon_site' => $request->coupon_site,
            'coupon_name' => $request->coupon_name,
            'coupon_term' => $request->coupon_term,
            'coupon_expire' => $request->coupon_expire,
            'coupon_url' => $request->coupon_url,
            
        ]);
    
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = \App\Coupon::find($id);

        return view('coupons.show', [
            'coupon' => $coupon,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = \App\Coupon::find($id);

        return view('coupons.edit', [
            'coupon' => $coupon,
        ]);
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
        $this->validate($request, [
            'store_id' => 'required|integer',
            'store_name' => 'required|max:255',
            'large_category' => 'required|max:255',
            'small_category' => 'required|max:255',
            'coupon_site' => 'required|max:255',
            'coupon_name' => 'required|max:255',
            'coupon_term' => 'required|max:255',
        ]);
        
        $coupon = \App\Coupon::find($id);
        $coupon->store_id = $request->store_id;
        $coupon->store_name = $request->store_name;
        $coupon->store_url = $request->store_url;
        $coupon->large_category = $request->large_category;
        $coupon->small_category = $request->small_category;
        $coupon->coupon_site = $request->coupon_site;
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_term = $request->coupon_term;
        $coupon->coupon_expire = $request->coupon_expire;
        $coupon->coupon_url = $request->coupon_url;
        $coupon->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = \App\Coupon::find($id);
        $coupon->delete();

        return redirect('/');
    }
    
    public function showImportCSV()      //csvファイルインポート
  {
 
     return view('csv_file');
 
  }
 
  public function importCSV(Request $request)
  {
 
     //postで受け取ったcsvファイルデータ
     $file = $request->file('file');
 
     //Goodby CSVのconfig設定
     $config = new LexerConfig();
     $interpreter = new Interpreter();
     $lexer = new Lexer($config);
 
     //CharsetをUTF-8に変換
     $config->setToCharset("UTF-8");
     $config->setFromCharset("sjis-win");
     
     //インポートするファイルの一行目を読み込まない
     $config->setIgnoreHeaderLine(true);
 
     $rows = array();
 
     $interpreter->addObserver(function(array $row) use (&$rows) {
         $rows[] = $row;
     });
 
     // CSVデータをパース
     $lexer->parse($file, $interpreter);
 
     $data = array();
 
     // CSVのデータを配列化
     foreach ($rows as $key => $value) {
 
        $arr = array();
 
        foreach ($value as $k => $v) {
 
            switch ($k) {
 
        	case 0:
        	$arr['store_id'] = $v;
        	break;
 
        	case 1:
        	$arr['store_name'] = $v;
        	break;
        	
        	case 2:
        	$arr['store_url'] = $v;
        	break;
        	
        	case 3:
        	$arr['large_category'] = $v;
        	break;
        	
        	case 4:
        	$arr['small_category'] = $v;
        	break;
        	
        	case 5:
        	$arr['coupon_site'] = $v;
        	break;
        	
        	case 6:
        	$arr['coupon_name'] = $v;
        	break;
        	
        	case 7:
        	$arr['coupon_term'] = $v;
        	break;
        	
        	case 8:
        	$arr['coupon_expire'] = $v;
        	break;
        	
        	case 9:
        	$arr['coupon_url'] = $v;
        	break;
 
        	default:
        	break;
            }
 
        }
 
        $data[] = $arr;
 
    }
 
    // DBに一括保存
    Coupon::insert($data);
 
    return redirect('/');
 
  }
}
