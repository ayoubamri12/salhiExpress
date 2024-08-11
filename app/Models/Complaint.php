<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = ["coli_id",'comment','status','req_state',];
    public function coli(){
        return $this->belongsTo(Coli::class);
    }
}
