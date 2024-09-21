<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'referral_code', 'referred_by'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->referral_code = Str::upper(Str::random(10));
        });
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }

    public function getLevel()
    {
        $current = $this;
        $level = 1;
        while ($current->referred_by) {
            $current = User::find($current->referred_by);
            $level++;
        }
        return $level;
    }
}