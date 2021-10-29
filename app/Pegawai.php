<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'alamat',
        'jenkel',
        'tempat',
        'tanggal',
        'jnskartu',
        'noiden',
        'agama',
        'tlp',
        'status',
        'nmibu',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
