@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="row">
        <div class="col-xs-12 col-ms-12 col-md-10 col-lg-10">
            <table class="table table-bordered">
            
                {!! Form::open(['method' => 'get']) !!}
              
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">管理番号</th>
                        <td>{!! Form::number('store_id', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">店舗名</th>
                        <td>{!! Form::text('store_name', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">記事URL</th>
                        <td>{!! Form::url('store_url', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">大カテゴリ</th>
                        <td>{!! Form::select('large_category', ['ランチ' =>'ランチ', 'ラーメン' =>'ラーメン', '食べ歩き'=> '食べ歩き', 'カフェ'=> 'カフェ'], null, ['placeholder' => '大カテゴリを選択してください' , 'class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">子カテゴリ</th>
                        <td>{!!Form::select('small_category', ['ランチ' =>'ランチ', 'ラーメン' =>'ラーメン', '食べ歩き'=> '食べ歩き', 'カフェ'=> 'カフェ'], null,  ['placeholder' => '子カテゴリを選択してください' , 'class' => 'form-control' ] )!!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">クーポンサイト名</th>
                        <td>{!! Form::text('coupon_site', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">クーポン名</th>
                        <td>{!! Form::text('coupon_name', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">利用条件</th>
                        <td><label>{!! Form::radio('coupon_term', 'ランチ可', null, ['class'=>'circle']) !!}ランチ可</label>
                        <label>{!! Form::radio('coupon_term', 'ランチ不可', null, ['class'=>'circle']) !!}ランチ不可</label></td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">有効期限</th>
                        <td>{!! Form::date('coupon_expire', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">クーポンURL</th>
                        <td>{!! Form::url('coupon_url', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
            </table>
    
            {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            
            <a href="{{ route('coupons.export', ['store_id'=>$store_id, 'store_name'=>$store_name, 'store_url'=>$store_url, 'large_category'=>$large_category, 'small_category'=>$small_category, 'coupon_site'=>$coupon_site, 'coupon_name'=>$coupon_name, 'coupon_term'=>$coupon_term, 'coupon_expire'=>$coupon_expire, 'coupon_url'=>$coupon_url]) }}" class="btn btn-primary"></i>CSVダウンロード</a>
         
        </div>
    </div>
    
    <div class="text-left">
                <h2>クーポン一覧</h2>
    </div>
            <div>
                
                         
                
            </div>
            <div>
            {!! link_to_route('/csv_file.get', 'CSVインポート',null,  ['class' => 'btn btn-primary']) !!}
            </div>
        <div class="row">
            <div class="col-xs-12">
                @if (count($coupons) > 0)
                    @include('coupons.coupons', ['coupons' => $coupons])
                @endif
            </div>
        </div>
    @else
        <div class="text-center">
            <h1>ログイン</h1>
        </div>
    
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
            
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! Form::label('email', 'メールアドレス') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                
                    {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @endif
@endsection