<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class BuyList extends Model
{
    use HasFactory;
    use HasCompositeKey;

    protected $primaryKey = ['user_id', 'wine_id'];

    public $fillable = [
        'user_id',
        'wine_id',
        'quantity'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function wine() {
        return $this->belongsTo(Wine::class, 'wine_id', 'id');
    }    
}
