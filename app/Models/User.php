<?php

namespace App\Models;

use Illuminate\Support\Str;
use Wave\User as WaveUser;
use Illuminate\Notifications\Notifiable;
use Wave\Traits\HasProfileKeyValues;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends WaveUser
{
    use Notifiable, HasProfileKeyValues;

    public $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'avatar',
        'password',
        'role_id',
        'verification_code',
        'verified',
        'trial_ends_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    // Define the services relationship
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }

    // Define the services relationship
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    // Define the services relationship
    public function towns(): BelongsToMany
    {
        return $this->belongsToMany(Town::class);
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    protected static function boot()
    {
        parent::boot();
        
        // Listen for the creating event of the model
        static::creating(function ($user) {
            // Check if the username attribute is empty
            if (empty($user->username)) {
                // Use the name to generate a slugified username
                $username = Str::slug($user->name, '');
                $i = 1;
                while (self::where('username', $username)->exists()) {
                    $username = Str::slug($user->name, '') . $i;
                    $i++;
                }
                $user->username = $username;
            }
        });

        // Listen for the created event of the model
        static::created(function ($user) {
            // Remove all roles
            $user->syncRoles([]);
            // Assign the default role
            $user->assignRole( config('wave.default_user_role', 'registered') );
        });
    }
}