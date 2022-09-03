<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\Accounts;
use App\Models\ShortTermLoan;
use App\Models\LongTermLoan;

class LoanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['delete']]);
    }


    /**
     * List User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index(Request $request)
    {   
        $filter = $request->query('filter');
        if (!empty($filter)) {
            $users = User::with('roles')->where('users.first_name', 'like', '%'.$filter.'%')->paginate(10);
             
        }else {
            $users = User::with('roles')->paginate(10);
        }
        return view('users.index', ['users' => $users])->with('users', $users)->with('filter', $filter);
    

    }
    
    /**
     * Create User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function create()
    {
        $roles = Role::all();
       
        return view('users.add', ['roles' => $roles]);
    }

    public function account() 
    {
        $roles = Role::all();
        $users = User::all();
        return view('users.account-details',['users' => $users])->with([
            'roles' => $roles]);
    }
    /**
     * Update Status Of User
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    public function updateStatus($user_id, $status)
    {
        // Validation
        $validate = Validator::make([
            'user_id'   => $user_id,
            'status'    => $status
        ], [
            'user_id'   =>  'required|exists:users,id',
            'status'    =>  'required|in:0,1',
        ]);

        // If Validations Fails
        if($validate->fails()){
            return redirect()->route('users.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            User::whereId($user_id)->update(['status' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('users.index')->with('success','User Status Updated Successfully!');
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit')->with([
            'roles' => $roles,
            'user'  => $user
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
 //for save account
 public function saveShortTermLoan(Request $request)
 {
     // Validations
     // $request->validate([
     //     'first_name'    => 'required',
     //     'last_name'     => 'required',
     //     'email'         => 'required|unique:users,email',
     //     'mobile_number' => 'required|numeric|digits:10',
     //     'role_id'       =>  'required|exists:roles,id',
     //     'status'       =>  'required|numeric|in:0,1',
     //     'salutation'    => 'required',
     //     'dob'    => 'required',
     //     'date_of_joining'    => 'required',
     //     'retirement_age'    => 'required',
     //     'date_of_retirement'    => 'required',
     //     'basic_pay'    => 'required',
     //     'current_basic'    => 'required',
         
     // ]);

     DB::beginTransaction();
     try {

         // Store Data
         $loan = ShortTermLoan::create([
             'short_term_loan'    => $request->short_term_loan,
             'eligibility_criteria'    => $request->eligibility_criteria,
             'loan_applied_for'    => $request->loan_applied_for,
             'admissible_loan'     => $request->admissible_loan,
             'actual_admissible_loan'         => $request->actual_admissible_loan,
             'actual_loan_disbursed' => $request->actual_loan_disbursed,
             'interest_8pc' => $request->interest_8pc,
             'no_of_installment' => $request ->no_of_installment,
             'principal' => $request ->principal,
             'interest' => $request ->interest,
             'total_amt_to_be_deduced_from_salary' => $request ->total_amt_to_be_deduced_from_salary,
             'outstanding_balance' => $request ->outstanding_balance,
             'deduction_list_print' => $request ->deduction_list_print
         ]);

         // Delete Any Existing Role
       //  DB::table('model_has_roles')->where('model_id',$user->id)->delete();
         
         // Assign Role To User
        // $user->assignRole($user->role_id);

         // Commit And Redirected To Listing
         DB::commit();
         return redirect()->route('users.index')->with('success','Short Term Loan Details Added Successfully.');

     } catch (\Throwable $th) {
         // Rollback and return with Error
         DB::rollBack();
         return redirect()->back()->withInput()->with('error', $th->getMessage());
     }
 }

    /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author Bijay Singh
     */
    public function delete(Accounts $accounts)
    {
        DB::beginTransaction();
        try {
            // Delete User
            Accounts::whereId($accounts->id)->delete();

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Import Users 
     * @param Null
     * @return View File
     */
    public function importUsers()
    {
        return view('users.import');
    }

    public function uploadUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);
        
        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function addLoan() 
    {
        $roles = Role::all();
        return view('users.add-loan-details')->with([
            'roles' => $roles]);
    }

    //for saving long term loan details
     //for save account
 public function saveLongTermLoan(Request $request)
 {
     // Validations
     // $request->validate([
     //     'first_name'    => 'required',
     //     'last_name'     => 'required',
     //     'email'         => 'required|unique:users,email',
     //     'mobile_number' => 'required|numeric|digits:10',
     //     'role_id'       =>  'required|exists:roles,id',
     //     'status'       =>  'required|numeric|in:0,1',
     //     'salutation'    => 'required',
     //     'dob'    => 'required',
     //     'date_of_joining'    => 'required',
     //     'retirement_age'    => 'required',
     //     'date_of_retirement'    => 'required',
     //     'basic_pay'    => 'required',
     //     'current_basic'    => 'required',
         
     // ]);

     DB::beginTransaction();
     try {

         // Store Data
         $loan = LongTermLoan::create([
             'long_term_loan'    => $request->long_term_loan,
             'eligibility_criteria_long_term'    => $request->eligibility_criteria_long_term,
             'loan_applied_for_long_term'    => $request->loan_applied_for_long_term,
             'admissible_loan_long_term'     => $request->admissible_loan_long_term,
             'actual_admissible_loan_long_term'         => $request->actual_admissible_loan_long_term,
             'actual_loan_to_disbursed_long_term' => $request->actual_loan_to_disbursed_long_term,
             'interest_8c_long_term' => $request->interest_8c_long_term,
             'no_of_installment' => $request ->no_of_installment,
             'principal_long_term' => $request ->principal_long_term,
             'interest_long_term' => $request ->interest_long_term,
             'total_amt_to_be_deduced_from_salary_long_term' => $request ->total_amt_to_be_deduced_from_salary_long_term,
             'outstanding_balance_long_term' => $request ->outstanding_balance_long_term,
             'deduction_list_print_long_term' => $request ->deduction_list_print_long_term
         ]);

         // Delete Any Existing Role
       //  DB::table('model_has_roles')->where('model_id',$user->id)->delete();
         
         // Assign Role To User
        // $user->assignRole($user->role_id);

         // Commit And Redirected To Listing
         DB::commit();
         return redirect()->route('users.index')->with('success','Long Term Loan Details Added Successfully.');

     } catch (\Throwable $th) {
         // Rollback and return with Error
         DB::rollBack();
         return redirect()->back()->withInput()->with('error', $th->getMessage());
     }
 }

   

}
