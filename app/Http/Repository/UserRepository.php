<?php

namespace App\Http\Repository;

use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function index($request)
    {
        //return $data = DB::table('users')->paginate(2);
        return User::where('role', '=', $request->role)
            ->orderBy('id', 'desc')
            ->paginate(config('constant.pagination_records'));
    }
    public static function store($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        if ($request->role==2){
            if ($request->has('is_enabled')) {
                $user->is_enabled = 1;
            } else {
                $user->is_enabled = 0;
            }
        }
        $user->save();
        if ($request->role==2){
            $data=$request->only('number','address','company_name','company_fax','license_number','company_address','company_number','company_email','account_name','account_number','bank_name','bank_code','branch_name','branch_code','bank_address','sales_commission','paid_amount');

            $user->seller()->create($data);
        }
        return $user;
    }

    public static function findById($id)
    {
        return User::find($id);
    }

    public static function update($user, $request)
    {
        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->has('is_enabled')) {
            $user->is_enabled = 1;
        } else {
            $user->is_enabled = 0;
        }
        if($user->role==2){
            $data=$request->only('number','address','company_name','company_fax','license_number','company_address','company_number','company_email','account_name','account_number','bank_name','bank_code','branch_name','branch_code','bank_address','sales_commission','paid_amount');
            $user->seller()->update($data);
        }
        $user->update();

        return true;
    }

    public static function delete($user)
    {
        return $user->delete();
    }

    public static function findByEmail($request)
    {
        return User::where('email', $request->email)
            ->where('role', 4)->first();
    }
}
