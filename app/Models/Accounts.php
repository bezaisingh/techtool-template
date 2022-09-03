<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Kyslik\ColumnSortable\Sortable;

class Accounts extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    use Sortable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_of_membership_in_the_society',
        'compulsory_deposit',
        'interest_on_cd',
        'no_of_shares_hold',
        'dividend_on_share',
        'total_balance',
        'final_withdrawal',
        'users_id'
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->salutation} {$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    // public $sortable = ['email'];


}
