<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Thiagoprz\CompositeKey\HasCompositeKey;

class Note extends Model
{
    use HasFactory;
    protected $primaryKey = ['user_id', 'wine_id'];

    public $fillable = [
        'wine_id',
        'user_id',
        'note'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function wine() {
        return $this->belongsTo(Wine::class);
    }
}
