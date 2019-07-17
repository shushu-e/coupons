@extends('layouts.app')

@section('content')
<div class="text-left">
    <h2>クーポン詳細</h2>
</div>
    <ul class="media-list">
        <li class="media">
            <div class="media-body">
                <?php $user = $coupon->user;?>
                <div class="col-xs-12 col-ms-12 col-md-10 col-lg-10">
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">管理番号</th>
                            <td>{!! nl2br(e($coupon->store_id)) !!}</td>
                        </tr>
                        <tr>
                            <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">店舗名</th>
                            <td>{!! nl2br(e($coupon->store_name)) !!}</td>
                        </tr>
                        <tr>
                            <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">記事URL</th>
                            <td>{!! nl2br(e($coupon->store_url)) !!}</td>
                        </tr>
                        <tr>
                            <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">大カテゴリ</th>
                            <td>{!! nl2br(e($coupon->large_category)) !!}</td>
                        </tr>
                        <tr>
                            <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">子カテゴリ</th>
                            <td>{!! nl2br(e($coupon->small_category)) !!}</td>
                        </tr>
                        <tr>
                            <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">クーポンサイト名</th>
                            <td>{!! nl2br(e($coupon->coupon_site)) !!}</td>
                        </tr>
                        <tr>
                            <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">クーポン名</th>
                            <td>{!! nl2br(e($coupon->coupon_name)) !!}</td>
                        </tr>
                        <tr>    
                            <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">利用条件</th>
                            <td>{!! nl2br(e($coupon->coupon_term)) !!}</td>
                        </tr>
                        <tr>    
                            <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">有効期限</th>
                            <td>{!! nl2br(e($coupon->coupon_expire)) !!}</td>
                        </tr>
                        <tr>
                            <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">クーポンURL</th>
                            <td>{!! nl2br(e($coupon->coupon_url)) !!}</td>
                        </tr>
                    </table>
                
                    <div style="display:inline-flex">
                        <div>
                            {!! link_to_route('coupons.edit', '編集', ['id' => $coupon->id], ['class' => 'btn btn-success']) !!}
                        </div>
                        <div>
                            {!! Form::open(['route' => ['coupons.destroy', $coupon->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </li>
        </ul>
@endsection