<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'variable_id',
        'name',
        'bobot',
        'nilai',
    ];

    public function variable() {
        return $this->belongsTo('App\Variable', 'variable_id');
    }
}
