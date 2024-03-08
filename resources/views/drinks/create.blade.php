<!DOCTYPE html>
<form action="<?php echo url('drinks/store'); ?>" method="POST">
    <div>
        <label>商品名</label>
        <input type="text" name="name" value="" placeholder="名前を入力してください" required>
    </div>
    <div>
        <label>価格</label>
        <input type="number" name="price" value="" placeholder="価格を入力してください" required>
    </div>
    <div>
        <label>在庫数</label>
        <input type="number" name="stock" value="" placeholder="在庫数を入力してください" required>
    </div>
    <div>
        <label>メーカー</label>

        <!--メーカーのリストを含むドロップダウンメニューを生成-->
        <!--name 属性が "maker_id" である <select> 要素を表す-->
        <select name="maker_id">
            <?php foreach ($makers as $maker): ?>
            <!--:：ループの開始を示す-->
                <option value="{{$maker->id}}">
                <!--option：選択肢を表すために使用される要素-->
                <!--value：要素に関連付けられた値-->
                <!--$maker->id：メーカーのIDを取得する-->
                    <?php echo $maker->name; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input class="btn" type="submit" value="登録する">
        <a class="btn" href="<?php echo url('/drinks'); ?>">戻る</a>
    </div>
</form>