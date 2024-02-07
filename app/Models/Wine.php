<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'code_saq',
        'country',
        'size',
        'type',
        'photo',
        'price',
        'user_id'
    ];
    
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
