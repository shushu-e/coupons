@extends('layouts.app')

@section('content')
    @if (Auth::check())
    
    {!! Form::open(['method' => 'get']) !!}
    管理番号:{!! Form::number('store_id', null) !!}
    店舗名:{!! Form::text('store_name', null) !!}
    記事URL:{!! Form::url('store_url', null) !!}
    {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    
    <div class="text-left">
                <h2>クーポン一覧</h2>
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