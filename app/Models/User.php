<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Sotietkiem;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Casts\EncryptInfo;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const ROLE_ADMIN = 1;
    const ROLE_OFFICER = 2;
    const ROLE_USER = 3;
    
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'cmnd_cccd',
        'phone',
        'address',
        'birthday',
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
        'cmnd_cccd' => EncryptInfo::class,
    ];

    public function userRole() {
        return $this->role_id; 
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function hasPermission($permission) : bool{
        $check = $this->role->permissions()->where('name', $permission)->first();
        if(!empty($check)){
            return true;
        }
        return false;
    }

    public function bankAccount(){
        return $this->hasOne(BankAccount::class, 'user_id', 'id');
    }

    public function accountHistory(){
        return $this->hasMany(AccountHistory::class, 'account_number', 'phone');
    }
    public function passBook(){
        return $this->hasMany(sotietkiem::class, 'user_id', 'id');
    }
}
