<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawabans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jawaban',
        'score',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo("App\User");
    }

    public function soal()
    {
        return $this->belongsToMany("App\Models\Soal");        
    }
}
