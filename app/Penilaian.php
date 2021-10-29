<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'user_id',
        'peringkat',
        'skala',
        'ket',
        'nilai',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
