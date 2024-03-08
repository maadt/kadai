<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        //リクエストから抽出したいプロパティ名
        "name",
        "price",
        "stock"
    ];

    // 関数名はモデル名のキャメルケース(複数形)
    public function saleLogs()
    {
        return $this->hasMany("App\SaleLog");
        //hasMany()：1対多のリレーション
    }
}