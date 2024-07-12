<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'Discription',
        'Privacy',
        'post_date',
        'user_id',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function profile(){
        return $this->hasMany(profile::class);
    }

    
}
