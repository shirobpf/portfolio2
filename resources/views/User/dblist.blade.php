<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    th {
      background-color: black;
      color: white;
      padding: 5px 13px;
    }

    td {
      border: 1px solid black;
      padding: 5px 13px;
      text-align: center;
    }

    button {
      border: 1px solid black;
      padding: 5px 10px;
      text-align: center;
    }
    
    .show{
      display: block;
    }

    *,
    *:before,
    *:after {
      -webkit-box-sizing: inherit;
      box-sizing: inherit;
    }

    html {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      font-size: 62.5%;/*rem算出をしやすくするために*/
    }

    .btn,
    a.btn,
    button.btn {
     font-size: 0.6rem;
      font-weight: 700;
      line-height: 0.7;
      position: relative;
      display: inline-block;
      padding: 1rem 2rem;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      -webkit-transition: all 0.3s;
      transition: all 0.3s;
      text-align: center;
      vertical-align: middle;
      text-decoration: none;
      letter-spacing: 0.1em;
      color: #212529;
      border-radius: 0.5rem;
    }

    .btn--orange,
    a.btn--orange {
      color: #fff;
      background-color: #eb6100;
    }
    .btn--orange:hover,
    a.btn--orange:hover {
      color: #fff;
      background: #f5dd00;
    }

    a.btn--radius {
      border-radius: 100vh;
    }

    .btn--blue,
    a.btn--blue {
      color: #fff;
      background-color:blue;
    }
    .btn--blue:hover,
    a.btn--blue:hover {
      color: #fff;
      background: skyblue;
    }

    a.btn--radius {
      border-radius: 100vh;
    }

  </style>
</head>

<body>
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
  </form>

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
    </form>
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
      <td><a href="/details/{{$user->id}}" class="btn btn--orange btn--radius">詳細</a> </td>
      <td><a href="/destroy/{{$user->id}}" class="btn btn--blue btn--radius">削除</a> </td>
    </tr>
    @endforeach
  </table>
</body>
</html>