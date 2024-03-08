<!DOCTYPE html>
<html>
<head>
    <title>飲み物一覧</title>
    <meta charset="utf8" />
</head>
<body>
    <h1>飲み物一覧</h1>
    <!-- ① -->
    <table>
        <thead>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
        </thead>
        <tbody>
            <?php foreach($drinks as $drink): ?>
                <tr>
                    <td><?php echo $drink->name; ?></td>
                    <td><?php echo $drink->price; ?></td>
                    <td><?php echo $drink->stock; ?></td>
                    <td><?php echo $drink->maker->name; ?></td>
                    <!--リレーションを利用してメーカー名を表示-->
                    <td><a href="drinks/edit/{{$drink->id}}">編集</a></td>
                    <td>
                        <form action="{{url('drinks/delete/'. $drink->id)}}" method="POST">
                            @csrf
                            <div>
                                <input type="submit" value="削除">
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <hr><!--水平線を描画するタグ-->
    <form action="{{url('drinks')}}" method="GET">
        <div>
            <label for="name">飲み物名</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="price">価格</label>
            <select name="price" id="price">
                <option value="1" selected>指定なし</option>
                <option value="2">100円未満</option>
                <option value="3">100~150円未満</option>
                <option value="4">150円以上</option>
            </select>
        </div>
        <div>
            <label for="stock">在庫数</label>
            <select name="stock" id="stock">
                <option value="1" selected>指定なし</option>
                <option value="2">30個以下</option>
                <option value="3">31~50個以下</option>
                <option value="4">51~100個以下</option>
                <option value="5">101個以上</option>
            </select>
        </div>
        <div>
            <label for="maker">メーカー</label>
            <select name="maker_id" id="maker">
                <option value="指定なし" selected>指定なし</option>
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
                <option value="4">D</option>
            </select>
        </div>
        <div>
            <input type="submit" value="検索">
            <a href="{{url('drinks')}}"><input type="button" value="全件表示"></a>
        </div>
    </form>
    <th></th>
</body>
</html>