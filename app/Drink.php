<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    // Modelの設定
    public $timestamps = false;//登録日と更新日を自動保存しない
    protected $fillable = [
        //リクエストから抽出したいプロパティ名
        "name",
        "price",
        "stock",
        "maker_id"
    ];

    public function maker()
    {
        return $this->belongsTo("App\Maker");
    }
}