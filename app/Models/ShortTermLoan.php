<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Kyslik\ColumnSortable\Sortable;

class ShortTermLoan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    use Sortable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'short_term_loan',
        'eligibility_criteria',
        'loan_applied_for',
        'admissible_loan',
        'actual_admissible_loan',
        'actual_loan_disbursed',
        'interest_8pc',
        'no_of_installment',
        'principal',
        'interest',
        'total_amt_to_be_deduced_from_salary',
        'outstanding_balance',
        'deduction_list_print',
        'user'
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
