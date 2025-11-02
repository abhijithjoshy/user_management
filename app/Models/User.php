<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'prefixname',
        'firstname',
        'middlename',
        'lastname',
        'suffixname',
        'username',
        'email',
        'password',
        'photo',
        'type',
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

    public function getAvatarAttribute()
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }
        return asset('logo.png');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        $nameParts = array_filter([
            $this->prefixname,
            $this->firstname,
            $this->middlename,
            $this->lastname,
            $this->suffixname,
        ]);
        
        return implode(' ', $nameParts);
    }

    public function getMiddleinitialAttribute()
    {
        if (empty($this->middlename)) {
            return '';
        }

        $firstChar = mb_substr(trim($this->middlename), 0, 1);
        
        return strtoupper($firstChar) . '.';
    }

    public function getFullnameAttribute()
    {
        $nameParts = [];
        
        if (!empty($this->firstname)) {
            $nameParts[] = $this->firstname;
        }
        
        if (!empty($this->middleinitial)) {
            $nameParts[] = $this->middleinitial;
        }
        
        if (!empty($this->lastname)) {
            $nameParts[] = $this->lastname;
        }
        
        return implode(' ', $nameParts);
    }
}
