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
      padding: 5px 30px;
    }

    td {
      border: 1px solid black;
      padding: 5px 30px;
      text-align: center;
    }

    button {
      border: 1px solid black;
      padding: 5px 30px;
      text-align: center;
    }
    
    .show{
      display: block;
    }

  </style>
</head>

<body>
  <form action="/Users/show" method="post" class="show">
  <table>
    @csrf
    <tr>
      <th>show</th>
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

  <form action="/User/add" method="post" class="add">
    <table>
      @csrf
      <tr>
        <th>add</th>
      <tr>
        <th>email</th>
        <td><input type="text" name="email"></td>
      <tr>
      <tr>
          <th>パスワード</th>
          <td><input type="text" name="possword"></td>
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
      <th>電話番号</th>
      <th>郵便番号</th>
      <th>住所</th>
    </tr>
    @foreach ($users as $user)
    <tr>
      <td>{{$user->id}}</td>  
      <td>{{$user->name_family}}</td>
      <td>{{$user->name_first}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->email_verified_at}}</td>
      <td>{{$user->password}}</td>
      <td>{{$user->telnumber}}</td>
      <td>{{$user->postalcode}}</td>
      <td>{{$user->address}}</td>
    </tr>
    @endforeach
  </table>
</body>
</html>