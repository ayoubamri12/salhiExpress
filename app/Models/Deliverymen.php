<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverymen extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'region_id',
        'user_id',
        'num', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function colis()
    {
        return $this->hasMany(Coli::class, 'deliverymen_id');
    }
    
}
