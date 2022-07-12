<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pajak;

class transpajak extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Set status to Pending
     *
     * @return void
     */
    public function setStatusPending()
    {
        $this->attributes['status'] = 'pending';
        $this->save();
    }

    /**
     * Set status to Success
     *
     * @return void
     */
    public function setStatusSuccess()
    {
        $this->attributes['status'] = 'success';
        $this->save();
    }

    /**
     * Set status to Failed
     *
     * @return void
     */
    public function setStatusFailed()
    {
        $this->attributes['status'] = 'failed';
        $this->save();
    }

    /**
     * Set status to Expired
     *
     * @return void
     */
    public function setStatusExpired()
    {
        $this->attributes['status'] = 'expired';
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function detail(){
        return $this->belongsTo(pajak::class,'NOP','NOP');
    }
}
