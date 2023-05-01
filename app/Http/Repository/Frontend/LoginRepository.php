<?php

namespace App\Http\Repository\Frontend;

use App\Models\User;
use App\Models\UserContacts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class LoginRepository extends CommonRepository
{
    public function __construct()
    {
        parent::__construct();
        //
    }

    public static function store($request)
    {
        $user = User::whereEmail($request->email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->role = 4;
            $user->save();
        }else{
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->password =  Hash::make($request->password);
            $user->update();
        }

        return $user;
    }

    public static function currentPasswordCheckInEmail($request){
        $user_ =  User::find(auth()->user()->id);
       // dd($request->currentPasswordInEmail);
        return Hash::check($request->currentPasswordInEmail, $user_->password);
      //  return Hash::check($request->currentPasswordInEmail, auth()->user()->password);       
       
    }
    public static function currentPassCheckInChangePassowrd($request){
        $user =  User::find(auth()->user()->id);
        return Hash::check($request->currentPassword, $user->password);
        
       /*  $hashed = Hash::make($request->currentPassword);
        return Hash::check($hashed, auth()->user()->password); */
        
       
    }
    public static function profileUpdate($request){       
        $user =  User::where('email', $request->currentEmail)       
        ->get()->first(); 
        if($user){
            $user->name = $request->name;
            if ($request->has('name')) {
                $user->name = $request->name;
            }
            if ($request->has('last_name')) {
                $user->last_name = $request->last_name;
            }
            if ($request->has('address_line_1')) {
                $user->address_line_1 = $request->address_line_1;
            }

            if ($request->has('address_line_2')) {
                $user->address_line_2 = $request->address_line_2;
            }
            if ($request->has('city')) {
                $user->city = $request->city;
            }
            if ($request->has('state')) {
                $user->state = $request->state;
            }
            if ($request->has('zipe_code')) {
                $user->zipe_code = $request->zipe_code;
            }
            if ($request->has('country')) {
                $user->country = $request->country;
            }
            if ($request->has('port')) {
                $user->port = $request->port;
            }
            if ($request->filled('newEmail')) {
                $user->email = $request->newEmail;
            }

            if ($request->filled('newPassword')) {
                $user->password = Hash::make($request->newPassword);
            }
            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $uniqueName = md5($image->getClientOriginalName() . time()) . '.' . $image->extension();
                $file = 'images/' . $uniqueName;
               // dd($file);
                if (!file_exists('images')) {
                    // path does not exist
                    mkdir('images', 0777, true);
                }
    
                $contents = file_get_contents($image);
                file_put_contents($file, $contents);
                $uploaded_file = new UploadedFile($file, $uniqueName);
                if($user->image){
                    unlink('images/' . $user->image);
                }
                
                $user->image = $uniqueName;
              
            }
            $user->update();

            $userContacts1 =  UserContacts::where('user_id',$user->id) 
            ->where('choice', "choice1")      
            ->get()->first(); 

            $userContacts2 =  UserContacts::where('user_id',$user->id) 
            ->where('choice', "choice2")      
            ->get()->first(); 

            $userContacts3 =  UserContacts::where('user_id',$user->id) 
            ->where('choice', "choice3")      
            ->get()->first(); 

            $active1 = false;
            $active2 = false;
            $active3 = false;
             if($request->choice == "choice1"){
                $active1 = true;
             }else if($request->choice == "choice2"){
                $active2 = true;
            }else if($request->choice == "choice3"){
                $active3 = true;
             }

            if($userContacts1){
                $userContacts1->user_id =  $user->id;
                $userContacts1->active = $active1;
                $userContacts1->name =  $request->name_1;
                $userContacts1->number =  $request->number_1;
                $userContacts1->type =  $request->type_1;
                $userContacts1->choice =  "choice1";
                $userContacts1->update();
            }else{
                $userContacts1 = new UserContacts();
                $userContacts1->user_id =  $user->id;
                $userContacts1->active =  $active1;
                $userContacts1->name =  $request->name_1;
                $userContacts1->number =  $request->number_1;
                $userContacts1->type =  $request->type_1;
                $userContacts1->choice =   "choice1";
                $userContacts1->save();
            }
            

            if($userContacts2){
                $userContacts2->user_id =  $user->id;
                $userContacts2->active = $active2;
                $userContacts2->name =  $request->name_2;
                $userContacts2->number =  $request->number_2;
                $userContacts2->type =  $request->type_2;
                $userContacts2->choice =   "choice2";
                $userContacts2->update();
            }else{
                $userContacts2 = new UserContacts();
                $userContacts2->user_id =  $user->id;
                $userContacts2->active =  $active2;
                $userContacts2->name =  $request->name_2;
                $userContacts2->number =  $request->number_2;
                $userContacts2->type =  $request->type_2;
                $userContacts2->choice =   "choice2";
                $userContacts2->save();
            }

            if($userContacts3){
                $userContacts3->user_id =  $user->id;
                $userContacts3->active = $active3;
                $userContacts3->name =  $request->name_3;
                $userContacts3->number =  $request->number_3;
                $userContacts3->type =  $request->type_3;
                $userContacts3->choice =  "choice3";;
                $userContacts3->update();
            }else{
                $userContacts3 = new UserContacts();
                $userContacts3->user_id =  $user->id;
                $userContacts3->active =  $active3;
                $userContacts3->name =  $request->name_3;
                $userContacts3->number =  $request->number_3;
                $userContacts3->type =  $request->type_3;
                $userContacts3->choice =   "choice3";;
                $userContacts3->save();
            }
          
        }

        return $user;
    }

    public static function getUserContacts()
    {
        return UserContacts::where('user_id', Auth::user()->id)
            ->get();
    } 
}
