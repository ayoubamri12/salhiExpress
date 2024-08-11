<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coli extends Model
{
    use HasFactory;
    protected $fillable = ["id",'destination','phone_number','Name','state','status','price','magasin','deliverymen_id'];
    public function deliverymen(){
        return $this->belongsTo(Deliverymen::class);
    }
    public function complaint(){
        return $this->hasOne(Complaint::class);
    }
}
