<?php
namespace App\Http\Controllers;

// 利用するModelファイルを読込み
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        //全件取得
        $products = Product::all();
        // 配列の各要素を取り出す
        foreach ($products as $product) {
        // モデルのインスタンスなのでプロパティはアローで参照できる
            echo $product->name;
        }

        //1件取得
        $product = Product::find(1);
        //idが１の情報を取ってくる
        //パスから$idを受け取るためには
        // モデルのインスタンスなのでプロパティはアローで参照できる
        echo $product->name;

        //条件指定での取得
        $products = Product::where("price", ">=", 10000)->get();
        // 配列の各要素を取り出す
        foreach ($products as $product) {
        // モデルのインスタンスなのでプロパティはアローで参照できる
            echo $product->name;
        }
    }

    public function save()
    {
        // Productクラスのインスタンスを生成
        $product = new Product();
        
        // プロパティに値を代入
        $product->name = "時計";
        $product->price = 6000;
        $product->stock = 50;
        
        // データベースに保存
        $product->save();
    }

    public function store(Request $request)
    {
        // Productクラスのインスタンスを生成
        $product = new Product();

        // $fillableに設定された、"name","price","stock"だけが代入される
        $product->fill($request->all());
        //fill()：Eloquentモデルの属性を一括で設定します。
        //このメソッドは、連想配列を受け取り、キーがモデルの属性、値がその属性に設定される値として解釈されます。

        // データベースに保存
        $product->save();
    }

    public function update()
    {
        // データを1件取得
        $product = Product::find(1);
        
        // プロパティを書き換え
        $product->price = 4000;
        
        // データベースを更新
        $product->save();
    }

    public function edit(Request $request, $id)
    {
        // データを1件取得
        $product = Product::find($id);

        // $fillableに設定された、"name","price","stock"だけが代入される
        $product->fill($request->all());

        // データベースを更新
        $product->save();
    }

    public function delete()
    {
        // データを1件取得
        $product = Product::find($id);

        // データベースから削除
        $product->delete();
    }

    public function relation()
    {
        $product = Product::find(1);
        $saleLogs = $product->saleLogs; // $product->saleLogs()ではない
        foreach ($saleLogs as $saleLog) {
            // 販売個数を出力
            echo $saleLog->number;
        }
    }

    public function queryBuilder()
    {
        // クエリビルダ使用準備
        $sql = Product::query();
        // SQLの実行と結果の取得
        $products = $sql->get();
        /* 実行されるSQL
            SELECT * FROM `products`;
        */
        //下記の記述でも可
        //$products = Product::query()->get();


        $products = Product::query()
	        ->where("id", "=", 1)
	        ->get();
        /* 実行されるSQL
            SELECT * FROM `products`
            WHERE `id` = 1;
        */


        $products = Product::query()
	        ->orderBy("price", "ASC")
	        ->get();
        /* 実行されるSQL
            SELECT * FROM `products`
            ORDER BY `price` ASC;
        */


        $products = Product::query()
            ->limit(10)
            ->get();
        /* 実行されるSQL
            SELECT * FROM `products`
            LIMIT 10;
        */


        $products = Product::query()
            ->offset(10)
            ->limit(10) // 複数のクエリビルダを組み合わせることができます
            ->get();
        /* 実行されるSQL
            SELECT * FROM `products`
            OFFSET 10
            LIMIT 10;
        */


        $products = Product::query()->get();
        /* 実行されるSQL
            SELECT * FROM `products`;
        */

        // 次のようにクエリを使いますこともできます。
        // SELECT * FROM `products` WHERE `id` > 10;の結果を取得
        $sql->where("id", ">", 10);
        $products2 = $sql->get();

        // SELECT * FROM `products` WHERE `id` > 10 AND WHERE `price` > 150;の結果を取得
        $sql->where("price", ">", 120);
        $products3 = $sql->get();


        $product = Product::query()
            ->first();

        /* 実行されるSQL
            内部的にはLIMITを1で指定して取得してくれている
            SELECT * FROM `products`
            LIMIT 1;
        */  


        $sql = Product::query();
        $sql->where("price", ">", 100);
        $sql->orderBy("id", "ASC");
        var_dump($sql->toSql());

        /* toSql()を呼び出した時点での実行予定のクエリ文が出力される
            SELECT * FROM `products`
            WHERE `price` > 100
            ORDER BY `id` ASC;
        */
    }
}