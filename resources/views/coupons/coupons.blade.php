<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/t/bs-3.3.6/jqc-1.12.0,dt-1.10.11/datatables.min.css"/> 
    <script src="https://cdn.datatables.net/t/bs-3.3.6/jqc-1.12.0,dt-1.10.11/datatables.min.js"></script>
    
    <script>
        jQuery(function($){
            // デフォルトの設定を変更
            $.extend( $.fn.dataTable.defaults, { 
                language: {
                    url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
                } 
            });
            
            
            $("#coupons-table").DataTable({
                
                // 検索機能 無効
                searching: false,
                
                // 横スクロールバーを有効にする (scrollXはtrueかfalseで有効無効を切り替えます)
                //scrollX: true,
                
                // 縦スクロールバーを有効にする (scrollYは200, "200px"など「最大の高さ」を指定します)
                scrollY: 400,
                
                // 件数切替の値
                lengthMenu: [ 10, 30, 50, 100 ],
                
                // 件数のデフォルトの値
                displayLength: 50,
                
                // 初期表示時には並び替えをしない
                 "order": [],
                
                // 状態を保存する機能をつける
                //stateSave: true,
                
                //ソートを表示しない列の設定（0から数える）
                "columnDefs": [{
                    "targets": [10],
                    "orderable": false
                }],
            });
        });
    </script>
    
    <title></title>
</head>
<body>
    <table id="coupons-table" class="table table-striped table-bordered">
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
            </tr>
            @endforeach
        </tbody>
    </table>
<body>
</html>