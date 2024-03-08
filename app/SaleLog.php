<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleLog extends Model
{
    // 関数名はモデル名のキャメルケース(単数形)
    public function product()
    {
        return $this->belongsTo("App\Product");
    }
}