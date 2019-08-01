@extends('layouts.app')

@section('content')
    @if (Auth::check())
       <div class="text-left">
            <h3>クーポン検索</h3>
        </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="glyphicon glyphicon-search"></span>検索条件</div>
                            <div class="panel-body">
                                <table class="table">
                                
                                {!! Form::open(['method' => 'get']) !!}
                                　　
                                　　<tr>
                                        <div class="form-group">
                                           <th>{!! Form::label('store_id', '管理番号') !!}</th>
                                           <td>{!! Form::number('store_id', null, ['class' => 'form-control']) !!}</td>
                                        </div>
                                        
                                        <div class="form-group">
                                            <th>{!! Form::label('coupon_site', 'クーポンサイト名') !!}</th>
                                            <td>{!! Form::text('coupon_site', null, ['class' => 'form-control']) !!}</td>
                                        </div>
                                    </tr>
                                      
                                    <tr>
                                        <div class="form-group">
                                            <th>{!! Form::label('store_name', '店舗名') !!}</th>
                                            <td>{!! Form::text('store_name', null, ['class' => 'form-control', ]) !!}</td>
                                        </div>
                                        
                                        <div class="form-group">
                                            <th>{!! Form::label('coupon_name', 'クーポン名') !!}</th>
                                            <td>{!! Form::text('coupon_name', null, ['class' => 'form-control']) !!}</td>
                                        </div>
                                    </tr>
                                    
                                    <tr>
                                        <div class="form-group">
                                            <th>{!! Form::label('store_url', '記事URL') !!}</th>
                                            <td>{!! Form::url('store_url', null, ['class' => 'form-control']) !!}</td>
                                        </div>
                                        
                                        <div class="form-group">
                                            <th>{!! Form::label('coupon_expire', '有効期限') !!}</th>
                                            <td>{!! Form::date('coupon_expire', null, ['class' => 'form-control']) !!}</td>
                                        </div>
                                    </tr>
                                    
                                    <tr>
                                        <div class="form-group">
                                            <th>{!! Form::label('large_category', '大カテゴリ') !!}</th>
                                            <td>{!! Form::select('large_category', ['ランチ' =>'ランチ', 'ラーメン' =>'ラーメン', '食べ歩き'=> '食べ歩き', 'カフェ'=> 'カフェ'], null, ['placeholder' => '大カテゴリを選択してください' , 'class' => 'form-control']) !!}</td>
                                        </div>
                                        
                                        <div class="form-group">
                                             <th>{!! Form::label('coupon_term', '利用条件') !!}</th>
                                             <td><label>{!! Form::radio('coupon_term', 'ランチ可', null, ['class'=>'circle']) !!}ランチ可&emsp;</label>
                                             <label>{!! Form::radio('coupon_term', 'ランチ不可', null, ['class'=>'circle']) !!}ランチ不可</label></td>
                                        </div>
                                    </tr>
                                    
                                    <tr>
                                        <div class="form-group">
                                            <th>{!! Form::label('small_category', '子カテゴリ') !!}</th>
                                            <td>{!! Form::select('small_category', [
                                                'ランチ' => ['カフェランチ' => 'カフェランチ', 'イタリアン' => 'イタリアン', '焼肉・韓国料理' => '焼肉・韓国料理', '和食・寿司' => '和食・寿司', 'フレンチ・西洋料理' => 'フレンチ・西洋料理', '各国料理' => '各国料理' , '洋食・ハンバーグ' => '洋食・ハンバーグ' , '食べ放題' => '食べ放題' , 'その他' => 'その他'],
                                                'ラーメン' => ['ラーメン通おすすめ' => 'ラーメン通おすすめ' ,'醤油ラーメン'=>'醤油ラーメン', '塩ラーメン' => '塩ラーメン' , '味噌ラーメン' => '味噌ラーメン', '豚骨ラーメン' => '豚骨ラーメン', '家系ラーメン' => '家系ラーメン', '魚介ラーメン' => '魚介ラーメン', '二郎インスパイア' => '二郎インスパイア', 'つけ麺' => 'つけ麺', 'その他' => 'その他'],
                                                ], null, ['placeholder' => '子カテゴリを選択してください' , 'class' => 'form-control']) !!}</td>
                                        </div>
                                  
                                        <div class="form-group">
                                            <th>{!! Form::label('coupon_url', 'クーポンURL') !!}</th>
                                            <td>{!! Form::url('coupon_url', null, ['class' => 'form-control']) !!}</td>
                                        </div>
                                    </tr>
                                </table>    
                                    <div class="text-center">
                                        {!! Form::submit('&emsp;検索&emsp;', ['class' => 'btn btn-primary']) !!}
                                    </div>
                                {!! Form::close() !!}
                                    
                                    <div class="text-right">
                                        <a href="{{ route('coupons.export', ['store_id'=>$store_id, 'store_name'=>$store_name, 'store_url'=>$store_url, 'large_category'=>$large_category, 'small_category'=>$small_category, 'coupon_site'=>$coupon_site, 'coupon_name'=>$coupon_name, 'coupon_term'=>$coupon_term, 'coupon_expire'=>$coupon_expire, 'coupon_url'=>$coupon_url]) }} "class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span></i>&nbsp;CSVダウンロード</a>
                                    </div>
                                  
                            </div>
                    </div>
                </div>
            </div>
        <div class="text-right">
            {!! link_to_route('/csv_file.get', '&thinsp;CSVインポート',null,  ['class' => 'btn btn-success glyphicon glyphicon-plus']) !!}
        </div><br>
        <div class="row">
            <div class="col-xs-12">
                @if (count($coupons) > 0)
                    @include('coupons.coupons', ['coupons' => $coupons])
                @endif
            </div>
        </div>
        <br>
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