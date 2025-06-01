<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto';
    protected $fillable = ['nama_foto', 'deskripsi', 'path_foto',];
    public $timestamps = true;

    public function user()
{
    return $this->belongsTo(User::class);
}

}

