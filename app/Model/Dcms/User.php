<?php

namespace App\Model\Dcms;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\ResetPassword as NotificationsResetPassword;
use Illuminate\Http\Exceptions\HttpResponseException;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public function getData()
    {
        return $this->orderBy('id', 'DESC')->where('deleted_at', '=', null)->where('role', '!=', 'user')->paginate(10);
    }

    public function getRules()
    {
        $rules = array(
            // 'name'           => 'required|string|max:225|min:3',
            // 'username'       => 'required|string|max:225|min:3',
            // 'email'          => 'required|string|email|max:225|min:5',
            // 'avatar'         => 'nullable|mimes:jpeg,jpg,png,gif|max:1024',
            // 'mobile'         => 'required|string|max:10|min:5',
            // 'password'       => 'required|confirmed|min:6|max:20',
            // 'password_confirmation'       => 'required|min:6',
        );
        return $rules;
    }
    public function getMessage()
    {
        $rules = array(
            // 'name.required'                    => 'पुरा नाम अनिवार्य छ',
            // 'username.required'                => 'प्रोफाइल नाम अनिवार्य छ',
            // 'email.required'                   => 'इमेल अनिवार्य छ',
            // 'mobile.required'                  => 'मोबाइल नम्बरअनिवार्य छ',
            // 'password.required'                => 'पासवर्ड अनिवार्य छ',
            // 'password_confirmation.required'   => 'पासवर्ड पुन:  अनिवार्य छ',
        );
        return $rules;
    }
    public function editRules()
    {
        $rules = array(
            // 'name'           => 'required|string|max:225|min:3',
            // 'username'       => 'required|string|max:225|min:3',
            // 'email'          => 'required|string|email|max:225|min:5',
            // 'avatar'         => 'nullable|mimes:jpeg,jpg,png,gif|max:1024',
            // 'mobile'         => 'required|string|max:10|min:6',
            // 'password'       => 'required|same:confirmed|min:6|max:20',
            // 'password_confirmation'       => 'required|min:6',

        );
        return $rules;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'role_super',
        'last_login_at', 'last_login_ip','google_id','facebook_id'
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

    public function user_info()
    {
        return $this->hasOne(UserInfo::class, 'user_id');
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new NotificationsResetPassword($token));
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class, 'id');
    }

    public function member()
    {
        return $this->hasMany(Memberenroll::class, 'user_id' ,'id');
    }
    public function personalinfo()
    {
        return $this->hasOne(Personalinfo::class, 'user_id' ,'id');
    }
    public function customerdetail()
    {
        return $this->hasMany(CustomerDetail::class, 'user_id' ,'id');
    }
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id' ,'id');
    }



}
