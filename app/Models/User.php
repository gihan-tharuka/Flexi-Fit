<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\Role;
use App\Models\Order;
use App\Models\Subscription;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'membership_start_date',
        'membership_end_date',
        'membership_id',
        'status',
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
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => Role::class,
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function orders(): HasMany
    {
        return $this->HasMany(Order::class);
    }



    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }



    public function scheduleAssignments()
    {
        return $this->hasMany(ScheduleAssignment::class);
    }

    // Relationship with MembershipPlan
    public function membershipPlan()
    {
        return $this->belongsTo(MembershipPlan::class, 'membership_id');
    }

    // Check if the user's membership is active
    public function isMembershipActive()
    {
        return $this->membership_end_date && $this->membership_end_date->isFuture();
    }

    // Relationship with MembershipPayment
    public function membershipPayments()
    {
        return $this->hasMany(MembershipPayment::class);
    }

}
