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
        	
        	case 10:
        	$arr['created_at'] = $v;
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
  
  public function export(Request $request)     //csvエクスポート
    {
        //キーワードインプット
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

        //クエリ生成
        $query = \App\Coupon::query();

        //もしkeywordがあれば条件設定
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

        //クエリ実行
        $coupons = $query->get();

        //仮ファイルOpen
        $stream = fopen('php://temp','w');
        
        //カラム名（フィールド名）
        fputcsv($stream,['管理番号', '店舗名', '記事URL', '大カテゴリ', '子カテゴリ', 'クーポンサイト名', 'クーポン名', '利用条件', '有効期限', 'クーポンURL']);
    

        //loop
        foreach($coupons as $coupon)
        {
        
            //カラムを選択、レコード
            fputcsv($stream,[$coupon->store_id, $coupon->store_name, $coupon->store_url, $coupon->large_category, $coupon->small_category, $coupon->coupon_site, $coupon->coupon_name, $coupon->coupon_expire, $coupon->coupon_term, $coupon->coupon_url]);
           
        }

        //ポインタの先頭へ
        rewind($stream);

        //変換
        $csv = mb_convert_encoding(str_replace(PHP_EOL, "\r\n", stream_get_contents($stream)), 'SJIS', 'UTF-8');

        //file名
        $filename = "クーポン一覧".date('Ymd').".csv";

        //header
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        );

        //response
        return \Response::make($csv, 200, $headers);
    }
}

