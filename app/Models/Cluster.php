<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table = 'clusters';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cluster',
        'lokasi',
        'asesor_name',
        'created_at',
        'updated_at'
    ];

    public function cluster()
    {
        return $this->hasMany("App\Models\Soal");
    }

    public function jawaban()
    {
        return $this->belongsToMany("App\Models\Jawaban");        
    }
}