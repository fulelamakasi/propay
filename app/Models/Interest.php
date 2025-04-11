<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\UserInterest;

class Interest extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function user_interests(): HasMany
    {
        return $this->HasMany(UserInterest::class);
    }

}
