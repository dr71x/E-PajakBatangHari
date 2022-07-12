<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transpajak_detail extends Model
{
    use HasFactory;
    protected $table = 'Transpajak_detail';
    protected $fillable = ['transaction_id','luas','jenis','nilai','njop'];
    protected $primaryKey = 'transaction_id';
    public $timestamps = false;
    public $incrementing = false;
    public $keyType = 'string';
}
