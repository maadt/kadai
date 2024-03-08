<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>RequestForm</title>
</head>
<body>
    <form action="<?php echo url('session/setSession'); ?>" method="POST">
        @csrf
        <div>
            <label>メッセージ</label>
            <input type="text" name="message" value="" placeholder="メッセージを入力してください">
        </div>
        <div>
            <input class="btn" type="submit" value="Sessionへ登録">
        </div>
    </form>
    <hr>
    <div>
        <!-- セッションの値があれば表示する処理を追加 -->
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <!--endif：条件分岐の終了を示す-->
    </div>
</body>
</html>