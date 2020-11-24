<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpMyAdmin\Console;

class UsersOperateController extends Controller
{
    /***********************
        ユーザー参照
    **********************/

    public function index(Request $request)
    {
        $users = user::select('id','name_family','name_first','email','email_verified','password')->get();
        return view('User.dblist',['users'=>$users]);
    }

    /****************************
            ユーザー追加
　          ※11/18 未作成
    *****************************/
    public function create(Request $request)
    {
        //データ初期化
        $result = false;
        $message = '';

        $Newemail = $request->email;
        $Newpassword = $request->password;
        $passwordConfirmation = $request->passwordConfirmation;
        
        $users = DB::table('users')->where('email',$Newemail)->first();

        //アドレスがあるか確認
        if(empty($users))
        {
            if($Newpassword == $passwordConfirmation)
            {
                $message = '登録しました';
                return $message;
              
                $users = new User;
                $users ->email = $request->$Newemail;
                $users ->password = $request->$Newpassword;
                $users ->save();

            }else{
                $message = 'パスワードを確認してください';
                return $message;
            }
        }else{
          $message = 'そのアドレスはすでに登録されています';
          return $message;
        }

        return redirect('/');
    }

    public function store(Request $request)
    {
        //
    }

    /********************************
             ユーザーログイン
    *********************************/

    public function login(Request $request)
    {
        //データ初期化
        $result = false;
        $message = '';
        
        //ユーザー検索
        $email = $request->email;
        $password = $request->password;

        $users = DB::table('users')->where('email',$email)->first();
        $findData = DB::table('users')->where('email',$email)->first('password');
        $userTableName = (new User())->getTable();

        //アドレスがあるか確認
        if(empty($users))
        {
            $message = 'not email';
        }else{
          //パスワードを比較  
            if($findData->password == $password)
            {
                $message = 'success!!';
                $result = true;
            }else{
                $message = 'password error';
                $result = false;                
            }
        }
   
        if($result == true){
            // 該当レコードありの処理
            $responses = response()->json(
            [
            'result' => $result,
            'id' => $users->id,
            'email' => $users->email,
            'password' => $users->password,
            'name_family' => $users->name_family,
            'name_first' => $users->name_first,
            'message' => $message,
            'table'=> $userTableName            
            ]);
        }else{
        //該当レコードなしの処理
            $responses = response()->json(
            [
            'email' => $request->email,
            'result' => $result,
            'message' => $message
            ]);
        }

        return view('User.userResult',compact('responses'));
    }

    /************************
         ユーザー詳細
    *************************/

    public function details(Request $request)
    {
        //データ初期化
        $id =  $request->id;
        $userdata = null;

        $user = user::where('id',$id)->first();

        $userdata = response()->json(
            [
            'id' => $user->id,
            'email' => $user->email,
            'password' => $user->password,
            'name_family' => $user->name_family,
            'name_first' => $user->name_first,
            'email_verified' => $user->email_verified,
            'email_verified_at' => $user->email_verified_at,
            'telnumber' => $user->telnumber,
            'postalcode' => $user->postalcode,
            'address' => $user->address,
            'remember_token' => $user->remember_token,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'deleted_at' => $user->deleted_at,
            ]);
                
        return view('User.userEdit',compact('userdata'));
    }

    /***********************
         ユーザー更新        
    ***********************/
    public function update(Request $request, $id)
    {
        //
    }

    /***********************
        ユーザー削除
    ***********************/
     public function destroy($id)
    {
        //
    }
}
