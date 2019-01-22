<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'soal',
        'image',
        'A',
        'B',
        'C',
        'D',
        'E',
        'kunci',
        'cluster_id',
        'created_at',
        'updated_at'
    ];

    public function cluster()
    {
        return $this->belongsTo("App\Models\Cluster");
    }

    public function jawaban()
    {
        return $this->belongsToMany("App\Models\Jawaban");        
    }
}
