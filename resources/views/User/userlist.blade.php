<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rooms管理者画面</title>
  <link rel="stylesheet" href="css/dblist.css" type="text/css" />


    <div class="header flex between">
      <div class="left">
      <a  alt="roomsロゴ" href="http://localhost:8081/">HOME</a>
      </div>
  
      <div class="right">
        <p>ログイン</p>
      </div>
    </div>

    <nav class="nav">
      <ul>
      <li><a href=”#”>在庫管理</a></li>
      <li><a href="/list">お客様情報管理</a></li>      
      <li><a href=”#”>管理者ユーザー</a></li>
      <li><a href="/csv">CSVメニュー</a></li>
      <li><a href=”#”>その他</a></li>
      </ul>
    </nav>    
</head>
<body>
{{-- 
  <form action="/login" method="post" class="login">
  <table>
    @csrf
    <tr>
      <th>Login</th>
    <tr>
      <th>email</th>
      <td><input type="text" name="email"></td>
    <tr>
    <tr>
        <th>パスワード</th>
        <td><input type="text" name="password"></td>
    <tr>
  <table>
  <button>送信</button> 
  
  <form action="/create" method="post" class="create">
    <table>
      @csrf
      <tr>
        <th>新規登録</th>
      <tr>
        <th>email</th>
      <td><input type="text" name="email"></td>
      <tr>
      <tr>
          <th>パスワード</th>
      <td><input type="text" name="possword"></td>
      <tr>
      <tr>
          <th>パスワード確認入力</th>
          <td><input type="text" name="posswordConfirmation"></td>
      <tr>
    <table>
    <button>送信</button> 
  </form> --}}
  <table>
    <tr>
      <th>id</th>
      <th>姓</th>
      <th>名</th>
      <th>メールアドレス</th>
      <th>アドレス認証</th>
      <th>パスワード</th>
      <th>詳細</th>
      <th>削除</th>
    </tr>
    @foreach ($users as $user)
    <tr>
      <td>{{$user->id}}</td>  
      <td>{{$user->name_family}}</td>
      <td>{{$user->name_first}}</td>
      <td>{{$user->email}}</td>      
      <td>{{$user->email_verified}}</td>
      <td>{{$user->password}}</td>
     @csrf
      <td><a href="/details/{{$user->id}}" class="btn btn--orange btn--radius">詳細/編集</a> </td>
      <td><a href="/destroy/{{$user->id}}" class="btn btn--blue btn--radius">削除</a> </td>
    </tr>
    @endforeach
  </table>
</body>
</html>