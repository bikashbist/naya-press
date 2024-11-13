<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Dcms\Role;
use App\DM_Traits\HasPermission;

class User extends Authenticatable
{
    use Notifiable;
    use HasPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'ip_address', 'user_group', 'forgotten_password_time', 'last_login', 'status', 'last_login_at', 'last_login_ip','google_id','facebook_id',
    ];

    protected $dates = ['last_login_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userGroup() {
        return $this->belongsTo('usergroup');
    }

    public function hasRole($role){
        return User::where('role', $role)->get();
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
