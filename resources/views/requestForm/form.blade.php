<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>RequestForm</title>
</head>
<body>
    <form action="{{ url('showRequest') }}" method="POST">
        @csrf
        <div>
            <label for="message">入力フォーム</label>
            <input type="text" name="message" id="message">
        </div>
        <div>
            <input type="submit" value="リクエストを送る">
        </div>
    </form>
    <form action="{{ url('showRequest') }}" method="GET">
        @csrf
        <div>
            <label for="message">入力フォーム</label>
            <input type="text" name="message" id="message">
        </div>
        <div>
            <input type="submit" value="リクエストを送る">
        </div>
    </form>
    <form action="{{ url('showAllRequest') }}" method="GET">
        @csrf
        <div>
            <label for="message">入力フォーム</label>
            <input type="text" name="message" id="message">
            <select name="color" id="color">
                <option value="red">赤</option>
                <option value="yellow">黄</option>
                <option value="blue">青</option>
                <option value="green">緑</option>
                <option value="black">黒</option>
                <option value="white">白</option>
            </select>
        </div>
        <div>
            <input type="submit" value="リクエストを送る">
        </div>
    </form>
</body>
</html>