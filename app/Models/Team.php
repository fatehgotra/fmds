<?php

namespace App\Models;

use App\Notifications\Admin\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use PragmaRX\Google2FA\Google2FA;

class Team extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'phone',
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
        'avatar',
        'is_admin',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public static function booted() {
        static::creating(function ($model) {
            $model->uuid = bin2hex(random_bytes(5));
        });
    }

    public function tags(){
        return $this->hasMany(Tags::class,'customer_id',$this->customer_id)->orderBy('id','desc');
    }

    public function fields(){
        return $this->hasMany(Fields::class,'customer_id','id');
    }

    public function group(){
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id','id');
    }

    public function selectedList(){

        return $this->hasMany(IntegrationList::class,'customer_id','id')->where('in_list','1')->orderBy('id','desc');
    }

    public function hasValidCode($code)
    {
        $google2fa = new Google2FA();
        
        $valid2FACode = $google2fa->verifyKey(decrypt($this->two_factor_secret), $code);

        $validRecoveryCode = in_array($code, $this->recoveryCodes());

        return $valid2FACode || $validRecoveryCode;
    }

    public function verifyTwoFactorCode($code)
    {
        return $this->hasValidCode($code);
    }

    public function contactAssigned(){
    
        if($this->is_admin == 1)
        return $this->hasMany(Contact::class,'customer_id','customer_id')->count();
        else
        return $this->hasMany(Contact::class,'team_id','id')->count();
    }
}