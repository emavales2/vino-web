<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;
class CellarHasWine extends Model
{
    use HasFactory;
    use HasCompositeKey;
    protected $primaryKey = ['cellar_id', 'wine_id'];
    public $fillable = [
        'wine_id',
        'cellar_id',
        'quantity'
    ];
    public $autoincrement = false;
    public $timestamps = false;

    public function cellar() {
        return $this->belongsTo(Cellar::class, 'cellar_id', 'id');
    }
    public function wine() {
        return $this->belongsTo(Wine::class, 'wine_id', 'id');
    }
}
