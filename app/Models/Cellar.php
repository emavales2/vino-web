<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cellar extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'name',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cellarHasWines() {
        return $this->hasMany(CellarHasWine::class, 'cellar_id', 'id');
    }

}
