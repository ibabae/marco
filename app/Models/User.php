<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'phone',
        'email',
        'cname',
        'password',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function State(){
        return $this->hasOne(State::class,'id','state');
    }

    protected $rememberTokenName = false;

    public function address(){
        return $this->hasMany(Address::class,'userId');
    }

    public function getnameAttribute(){
        return $this->firstName.' '. $this->lastName;
    }

    public function getavatarAttribute(){
        if($this->file->first()){
            return asset($this->file);
        } else {
            return asset('images/blank.png');
        }
    }

    public function file()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
