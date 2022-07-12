<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userdetail extends Model
{
    use HasFactory;
    protected $table = 'user_detail';
    protected $fillable = ['user_id','nohp','alamat'];
    public $timestamps = false;
    public $incrementing = false;
    public $keyType = 'string';
}
