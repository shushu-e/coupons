@extends('layouts.app')

@section('content')
    <div class="text-left">
        <h2>クーポン新規登録</h2>
    </div>
    <div class="row">
        <div class="col-xs-12 col-ms-12 col-md-10 col-lg-10">
            <div class="create">
            <table class="table table-bordered">
            
              {!! Form::open(['route' => 'coupons.store']) !!}
            
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('store_id', '管理番号') !!}</th>
                        <td>{!! Form::number('store_id', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('store_name', '店舗名') !!}</th>
                        <td>{!! Form::text('store_name', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('store_url', '記事URL') !!}</th>
                        <td>{!! Form::url('store_url', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('large_category', '大カテゴリ') !!}</th>
                        <td>{!! Form::select('large_category', ['ランチ' =>'ランチ', 'ラーメン' =>'ラーメン', '食べ歩き'=> '食べ歩き', 'カフェ'=> 'カフェ'], null, ['placeholder' => '大カテゴリを選択してください' , 'class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('small_category', '子カテゴリ') !!}</th>
                        <td>{!! Form::select('small_category', [
                               'ランチ' => ['カフェランチ' => 'カフェランチ', 'イタリアン' => 'イタリアン', '焼肉・韓国料理' => '焼肉・韓国料理', '和食・寿司' => '和食・寿司', 'フレンチ・西洋料理' => 'フレンチ・西洋料理', '各国料理' => '各国料理' , '洋食・ハンバーグ' => '洋食・ハンバーグ' , '食べ放題' => '食べ放題' , 'その他' => 'その他'],
                               'ラーメン' => ['ラーメン通おすすめ' => 'ラーメン通おすすめ' ,'醤油ラーメン'=>'醤油ラーメン', '塩ラーメン' => '塩ラーメン' , '味噌ラーメン' => '味噌ラーメン', '豚骨ラーメン' => '豚骨ラーメン', '家系ラーメン' => '家系ラーメン', '魚介ラーメン' => '魚介ラーメン', '二郎インスパイア' => '二郎インスパイア', 'つけ麺' => 'つけ麺', 'その他' => 'その他'],
                               ], null, ['placeholder' => '子カテゴリを選択してください' , 'class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('coupon_site', 'クーポンサイト名') !!}</th>
                        <td>{!! Form::text('coupon_site', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('coupon_name', 'クーポン名') !!}</th>
                        <td>{!! Form::text('coupon_name', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('coupon_expire', '有効期限') !!}</th>
                        <td>{!! Form::date('coupon_expire', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('coupon_term', '利用条件') !!}</th>
                        <td><label>{!! Form::radio('coupon_term', 'ランチ可', null, ['class'=>'circle']) !!}ランチ可&emsp;</label>
                        <label>{!! Form::radio('coupon_term', 'ランチ不可', null, ['class'=>'circle']) !!}ランチ不可</label></td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('coupon_url', 'クーポンURL') !!}</th>
                        <td>{!! Form::url('coupon_url', null, ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
            </table>
            </div>
                
            <div class="text-center">
                {!! Form::submit('&emsp;登録&emsp;', ['class' => 'btn btn-primary']) !!}
            </div>
            
            {!! Form::close() !!}
        </div>
    </div>
    <br>
@endsection