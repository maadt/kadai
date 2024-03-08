<!DOCTYPE html>
<html>
<head>
    <title>飲み物編集</title>
    <meta charset="utf8" />
</head>
<body>
    <h1>飲み物編集</h1>
    <form action="<?php echo url('drinks/update/'. $drink->id); ?>"  method="POST">
    <!--action：フォームが送信された際にブラウザがリクエストを送信する先のURLを指定する-->
    <!--url()：指定されたパスを基に、アプリケーションのルートURLと組み合わせて完全なURLを生成する-->
        <div>
            <label>商品名</label>
            <input type="text" name="name" value="<?php echo $drink->name; ?>" placeholder="名前を入力してください" required>
            <!--required：フィールドが必須であることを示す-->
        </div>
        <div>
            <label>価格</label>
            <input type="number" name="price" value="<?php echo $drink->price; ?>" placeholder="価格を入力してください" required>
        </div>
        <div>
            <label>在庫数</label>
            <input type="number" name="stock" value="<?php echo $drink->stock; ?>" placeholder="在庫数を入力してください" required>
        </div>
        <div>
            <label>メーカー</label>
            <select name="maker_id">
                <?php foreach ($makers as $maker) :?>
                    <?php if ($drink->maker_id === $maker->id): ?>
                        <option value="<?php echo $maker->id; ?>" selected><?php echo $maker->name; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $maker->id; ?>"><?php echo $maker->name; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input class="btn" type="submit" value="登録する">
            <a class="btn" href="<?php echo url('drinks'); ?>">戻る</a>
        </div>
    </form>
</body>
</html>