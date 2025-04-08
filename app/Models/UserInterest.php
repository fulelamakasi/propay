<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'interest_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function interests()
    {
        return $this->hasMany(Interest::class);
    }
}
