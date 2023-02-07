<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastScanned extends Model
{
    use HasFactory;
    protected $table = 'last_scanned';
    protected $guarded = [''];

    public function tamu(){
        return $this->belongsTo(Tamu::class, 'id_tamu','id_tamu');
    }
}
