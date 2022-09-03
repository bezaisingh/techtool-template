<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Kyslik\ColumnSortable\Sortable;

class LongTermLoan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    use Sortable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'long_term_loan',
        'eligibility_criteria_long_term',
        'loan_applied_for_long_term',
        'admissible_loan_long_term',
        'actual_admissible_loan_long_term',
        'actual_loan_to_disbursed_long_term',
        'interest_8c_long_term',
        'no_of_installment',
        'principal_long_term',
        'interest_long_term',
        'total_amt_to_be_deduced_from_salary_long_term',
        'outstanding_balance_long_term',
        'deduction_list_print_long_term'
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
