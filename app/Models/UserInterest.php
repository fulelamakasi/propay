<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'interest_id'];

    public static function getUserInterest(int $user_id, int $interest_id)
    {
        $user_interest = self::where('user_id', $user_id)->where('interest_id', $interest_id)->get();

        if ($user_interest) {
            return $user_interest;
        }

        return false;
    }

    public static function getUserInterestByUser(int $user_id)
    {
        $user_interests = self::with('interest', 'user')
                            ->where('user_id', $user_id)->get();

        if ($user_interests) {
            return $user_interests;
        }

        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function interest()
    {
        return $this->belongsTo(Interest::class);
    }
}
