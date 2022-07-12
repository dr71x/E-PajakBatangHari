<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pajak extends Model
{
    use HasFactory;
    protected $table = 'pajak';
    protected $fillable = ['NOP', 'luas_bumi','luas_bangunan','tunggakan','letak','tanggal'];
    protected $primaryKey = 'NOP';

    public $incrementing = false;
    public $timestamps = false;
    public $keyType = 'string';

    public function nama()
    {
        return $this->belongsTo(User::class, 'NOP','NOP');
    }

    public function bayar(){
        return $this->hasMany(transpajak::class,'NOP','NOP');
    }
}
