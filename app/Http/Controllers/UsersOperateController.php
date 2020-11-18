<?php

namespace App\Http\Controllers;
use App\Models\UserOperate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpMyAdmin\Console;

class UsersOperateController extends Controller
{
    public function index(Request $request)
    {
        $users =  DB::select('select * from users');
        return view('User.dblist',['users'=> $users]);
    }

    public function create(Request $request)
    {
        $param = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        DB::insert('insert into users (email,password) value (email,password)', $param);
        return redirect('User.dblist');
    }

    public function store(Request $request)
    {
        //
    }

    //ユーザーデータ参照
    public function show(Request $request)
    {
        //データ初期化
        $result = false;
        $message = '';
        
        //ユーザー検索
        $email = $request->email;
        $password = $request->password;

        $users = DB::table('users')->where('email',$email)->first();
        $findData = DB::table('users')->where('email',$email)->first('password');

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
            'findData' => $findData,
            'request_password' => $password,
            'name_family' => $users->name_family,
            'name_first' => $users->name_first,
            'message' => $message
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
        return $responses;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
