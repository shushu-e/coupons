<ul class="media-list">
    <li class="media">
        <div class="media-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>管理番号</th>
                        <th>店舗名</th>
                        <th>記事URL</th>
                        <th>大カテゴリ</th>
                        <th>子カテゴリ</th>
                        <th>クーポンサイト名</th>
                        <th>クーポン名</th>
                        <th>利用条件</th>
                        <th>有効期限</th>
                        <th>クーポンURL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $coupon)
                    <?php $user = $coupon->user;?>
                    <tr>
                        <td>{!! nl2br(e($coupon->store_id)) !!}</td>
                        <td>{!! nl2br(e($coupon->store_name)) !!}</td>
                        <td>{!! nl2br(e($coupon->store_url)) !!}</td>
                        <td>{!! nl2br(e($coupon->large_category)) !!}</td>
                        <td>{!! nl2br(e($coupon->small_category)) !!}</td>
                        <td>{!! nl2br(e($coupon->coupon_site)) !!}</td>
                        <td>{!! nl2br(e($coupon->coupon_name)) !!}</td>
                        <td>{!! nl2br(e($coupon->coupon_term)) !!}</td>
                        <td>{!! nl2br(e($coupon->coupon_expire)) !!}</td>
                        <td>{!! nl2br(e($coupon->coupon_url)) !!}</td>
                        
                        <td>{!! link_to_route('coupons.show', '詳細', ['id' => $coupon->id], ['class' => 'btn btn-xs btn-default']) !!}</td>
                        
                        <!--<td> {!! link_to_route('coupons.edit', '編集', ['id' => $coupon->id], ['class' => 'btn btn-xs btn-success']) !!}</td>
                        
                        <td>{!! Form::open(['route' => ['coupons.destroy', $coupon->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>-->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </li>
</ul>
{!! $coupons->render() !!}