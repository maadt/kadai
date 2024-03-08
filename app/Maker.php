<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    // Modelの設定
    public $timestamps = false;//登録日と更新日を自動保存しない

    public function drinks()
    {
        return $this->hasMany("App\Drink");
    }
}