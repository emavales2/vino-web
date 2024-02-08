<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CellarHasWine extends Model
{
    use HasFactory;
    public $fillable = [
        'wine_id',
        'cellar_id'
    ];
    public function cellar() {
        $this->belongsTo(Cellar::class, 'cellar_id', 'id');
    }
    public function wine() {
        $this->belongsTo(Wine::class, 'wine_id', 'id');
    }
}
