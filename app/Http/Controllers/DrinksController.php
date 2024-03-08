<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maker;
use App\Drink;

class DrinksController extends Controller
{
    public function index(Request $request)
    {
        $query = Drink::query();
        $data = $request->all();

        if (!empty($data["name"])) {
            $query->where("name", $data["name"]);
        }

        if (!empty($data["price"])) {
            if ($data["price"] === "2") {
                $query->where("price", "<", 100);
                //SELECT * FROM table_name WHERE price < 100;
            } else if ($data["price"] === "3") {
                $query->where("price", ">=", 100);
                //SELECT * FROM table_name WHERE price >= 100;
                $query->where("price", "<", 150);
                //SELECT * FROM table_name WHERE price > 100 AND price < 150;
            } else if ($data["price"] ==="4") {
                $query->where("price", ">=", 150);
                //SELECT * FROM table_name WHERE price >= 150;
            }
        }

        if (!empty($data["stock"])) {
            if ($data["stock"] === "2") {
                $query->where("stock", "<=", 30);
            } else if ($data["stock"] === "3") {
                $query->where("stock", ">=", 31);
                $query->where("stock", "<=", 50);
            } else if ($data["stock"] ==="4") {
                $query->where("stock", ">=", 51);
                $query->where("stock", "<=", 100);
            } else if ($data["stock"] ==="5") {
                $query->where("stock", ">=", 101);
            }
        }

        if (!empty($data["maker_id"]) && $data["maker_id"] != "指定なし") {
            $query->where("maker_id", $data["maker_id"]);
            //SELECT * FROM table_name WHERE maker_id = 'maker_idの値';
        }

        $drinks = $query->get();
        return view("drinks.index", [
            "drinks" => $drinks
        ]);

        /*
        $drinks = Drink::all();
        return view("drinks.index", [
            "drinks" => $drinks
        ]);
        */

        /*
        $drinks = $this->getDrinks();
        // 第二引数に$drinksを渡すように修正
        return view("drinks.index", [
            "drinks" => $drinks
        ]);
        //"drinks"：ビュー内で使用される変数の名前を指定
        //$drinks：値はコントローラーからビューに渡すデータ
        //array("drinks"=> $drinks)でも可（？）
        */

        /*
        echo "<pre>";
        var_dump($drinks);
        echo "</pre>";
        //<pre>：テキストはそのままの形式で表示され、改行や空白などもそのまま反映される
        */
    }

    public function getDrinks()
    {
        $drinks = [
            [
                "name" => "water",
                "price" => 100,
                "stock" => 50,
                "maker" => ["name" => "A社"]
            ],
            [
                "name" => "tea",
                "price" => 120,
                "stock" => 80,
                "maker" => ["name" => "株式会社 B社"]
            ],
            [
                "name" => "soda",
                "price" => 147,
                "stock" => 100,
                "maker" => ["name" => "株式会社 c社"]
            ]
            ];
        return $drinks;
    }

    public function saveSession(Request $request)
    {
        $request->session()->put("cola.price", 120);
        $request->session()->put("cola.stock", 20);
        /*
        以下の書き方でも可
        $data = [
            "price" => 120,
            "stock" => 20
        ];
        $request->session()->put("コーラ", $data);
        */
    }

    public function showSession(Request $request)
    {
        echo "<pre>";
        var_dump($request->session()->all());
        echo "</pre>";
    }

    public function deleteSession(Request $request)
    {
        $request->session()->forget("cola");
        echo "削除しました。";
    }

    public function create()
    {
        $makers = Maker::all();
        //$makersデータがビュー内で "makers" という変数名で利用できるようになります。
        return view("drinks.create", [
            "makers" => $makers
        ]);
    }

    public function store(Request $request)
    {
        $drink = new Drink();

        $drink->fill($request->all());

        /*
        以下の受け取り方法でも可（模範解答）
        $drink->name = $data["name"];
        $drink->price = $data["price"];
        $drink->stock = $data["stock"];
        $drink->maker_id = $data["maker_id"];
        */

        $drink->save();
        echo "商品を登録しました。";
    }

    public function edit($id)
    {
        $drink = Drink::find($id);
        $makers = Maker::all();

        return view("drinks.edit", [
            "drink" => $drink,
            "makers" => $makers
        ]);
    }

    public function update(Request $request, $id)
    {
        $drink = Drink::find($id);
        $drink->fill($request->all());
        $drink->save();
        /*
        $drink->fill($request->all())->save();
        でも可
        */
        return redirect("drinks");
    }

    public function delete(Request $request, $id)
    {
        $drink = Drink::find($id);
        $drink->fill($request->all())->delete();
        return redirect("drinks");
    }
};