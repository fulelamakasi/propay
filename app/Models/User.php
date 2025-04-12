<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\UserInterest;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function setPasswordAttribute(string $value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public static function getUserByEmail(string $email)
    {
        $user = self::where('email', $email)->get();

        if ($user) {
            return $user;
        }

        return false;
    }

    public static function getUserByEmailAndId(string $email, int $id)
    {
        $user = self::whereKeyNot($id)->where('email', $email)->get();

        if ($user) {
            return $user;
        }

        return false;
    }

    public function user_interests(): HasMany
    {
        return $this->HasMany(UserInterest::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
