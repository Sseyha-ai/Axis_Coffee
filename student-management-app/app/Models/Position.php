<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',

    ];



    //Relationship
    public function users()
    {
        return $this->hasMany(User::class, 'id', 'name');
    }
}
