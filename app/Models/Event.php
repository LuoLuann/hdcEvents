<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'city',
        'private',
        'image',
        'items',
        'date',
    ];

    protected $casts = [
        'items' => 'array'
    ];
    protected $dates = ['date'];
   

    public function user() {
        //pertence a um usuario
        return $this->belongsTo(User::class);
    }
    public function users () {
        return $this->belongsToMany(User::class);
    }
}
