@extends('layouts.app')

@section('content')
    <div class="text-left">
        <h2>CSVファイルインポート</h2>
    </div>
    {!! Form::open(['url' => url('/csv_file'), 'method' => 'POST', 'class' => '', 'files' => true]) !!}
 
    <div class="form-group">
        <input type="file" class="" name="file" value="">
    </div>
 
    <button type="submit" class="btn btn-primary">CSVインポート</button>
 
    {!! Form::close() !!}
@endsection