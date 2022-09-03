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

class AccountController extends Controller
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
    public function accounList(Request $request)
    {   

        $accountList = DB::table('accounts')
            ->join('users', 'accounts.users_id', '=', 'users.id')
            ->select('accounts.*', 'users.first_name','users.last_name')
            ->get();

         $filter = $request->query('filter');
        // if (!empty($filter)) {
        //     $accountList = Accounts::with('roles')->where('accountLust.users_id', 'like', '%'.$filter.'%')->paginate(10);
             
        // }else {
        //     $accountList = Accounts::with('roles')->paginate(10);
        // }
        return view('users.account-list', ['accountList' => $accountList]);
    

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
 public function saveAccount(Request $request)
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
         $loan = Accounts::create([
             'date_of_membership_in_the_society'    => $request->date_of_membership_in_the_society,
             'compulsory_deposit'    => $request->compulsory_deposit,
             'interest_on_cd'    => $request->interest_on_cd,
             'no_of_shares_hold'     => $request->no_of_shares_hold,
             'dividend_on_share'         => $request->dividend_on_share,
             'total_balance' => $request->total_balance,
             'final_withdrawal' => $request->final_withdrawal,
             'users_id' => $request ->user
         ]);

         // Delete Any Existing Role
       //  DB::table('model_has_roles')->where('model_id',$user->id)->delete();
         
         // Assign Role To User
        // $user->assignRole($user->role_id);

         // Commit And Redirected To Listing
         DB::commit();
         return redirect()->route('users.index')->with('success','Account Created Successfully.');

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

   

}
