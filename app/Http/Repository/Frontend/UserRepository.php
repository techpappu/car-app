<?php

namespace App\Http\Repository\Frontend;

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
            ->paginate(5);
    }
    public static function store($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
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
        }else{
            $user->is_enabled = 0;
        }
        $user->update();

        return true;
    }

    public static function delete($user)
    {
        return $user->delete();
    }
}
