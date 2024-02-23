<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
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
