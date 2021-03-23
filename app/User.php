<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin', 'company', 'filled', 'trial', 'subscription', 'approved', 'subscription_end'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
        'company' => 'boolean',
        'filled' => 'boolean',
        'trial' => 'boolean',
        'subscription' => 'boolean',
        'approved' => 'boolean',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class)->withDefault();
    }

    public function isSuperAdmin()
    {
        return $this->id === 1;
    }

    public function isAdmin()
    {
        return $this->admin;
    }

    public function isCompany()
    {
        return $this->company;
    }

    public function isTriable()
    {
        return $this->trial && !$this->subscription && $this->subscription_end == null && $this->filled && !$this->approved;
    }

    public function isSubscriptable()
    {
        return (!$this->trial && $this->subscription && $this->subscription_end != null && !$this->approved);
    }


    public function isTrial()
    {
        return $this->trial && !$this->subscription && $this->subscription_end != null && $this->filled && $this->approved;
    }

    public function isSubscribed()
    {
        return (!$this->trial && !$this->subscription && $this->subscription_end != null && $this->approved);
    }

    public function isSubscription_ending()
    {
        $date = Carbon::now();

        if ($this->subscription_end != null && $date < $this->subscription_end) {
            $subscription_end = Carbon::parse($this->subscription_end);

            return ($date->addWeek() > $subscription_end) && $this->approved;
        }

        return false;
    }

    public function role()
    {
        if ($this->admin) {
            return "Administrador";
        }
        return "Usuario";
    }

    public function owns(Model $model)
    {
        return $this->id === $model->user_id;
    }

    public function scopeFilterBy($query, QueryFilter $filters, array $data)
    {
        return $filters->applyTo($query, $data);
    }
}
