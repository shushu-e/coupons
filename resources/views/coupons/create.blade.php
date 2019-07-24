@extends('layouts.app')

@section('content')
    <div class="text-left">
        <h2>クーポン新規登録</h2>
    </div>
    <div class="row">
        <div class="col-xs-12 col-ms-12 col-md-10 col-lg-10">
            <table class="table table-bordered">
            
              {!! Form::open(['route' => 'coupons.store']) !!}
            
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('store_id', '管理番号') !!}</th>
                        <td>{!! Form::number('store_id', old('store_id'), ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('store_name', '店舗名') !!}</th>
                        <td>{!! Form::text('store_name', old('store_name'), ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('store_url', '記事URL') !!}</th>
                        <td>{!! Form::url('store_url', old('store_url'), ['class' => 'form-control']) !!}</td>
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
                        <td>{!!Form::select('small_category', ['ランチ' =>'ランチ', 'ラーメン' =>'ラーメン', '食べ歩き'=> '食べ歩き', 'カフェ'=> 'カフェ'], null,  ['placeholder' => '子カテゴリを選択してください' , 'class' => 'form-control' ] )!!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('coupon_site', 'クーポンサイト名') !!}</th>
                        <td>{!! Form::text('coupon_site', old('coupon_site'), ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('coupon_name', 'クーポン名') !!}</th>
                        <td>{!! Form::text('coupon_name', old('coupon_name'), ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('coupon_term', '利用条件') !!}</th>
                        <td><label>{!! Form::radio('coupon_term', 'ランチ可', null, ['class'=>'circle']) !!}ランチ可</label>
                        <label>{!! Form::radio('coupon_term', 'ランチ不可', null, ['class'=>'circle']) !!}ランチ不可</label></td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('coupon_expire', '有効期限') !!}</th>
                        <td>{!! Form::date('coupon_expire', old('coupon_expire'), ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
                
                <tr>
                    <div class="form-group">
                        <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{!! Form::label('coupon_url', 'クーポンURL') !!}</th>
                        <td>{!! Form::url('coupon_url', old('coupon_url'), ['class' => 'form-control']) !!}</td>
                    </div>
                </tr>
            </table>
                
                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection