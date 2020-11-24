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
 <table>
    <tr>
      <th>id</th>
      <th>姓</th>
      <th>名</th>
      <th>メールアドレス</th>
      <th>アドレス認証</th>
      <th>アドレス認証日</th>
      <th>パスワード</th>
      <th>電話番号</th>
      <th>郵便番号</th>
      <th>住所</th>
      <th>トークン</th>
      <th>作成日</th>
      <th>更新日</th>
      <th>削除日</th>
    </tr>
    <tr>
      @php 
         $result_json  = $userdata->content();
         $user = json_decode( $result_json, true );
      @endphp
      <td>{{$user['id']}}</td>  
      <td>{{$user['name_family']}}</td>
      <td>{{$user['name_first']}}</td>
      <td>{{$user['email']}}</td>      
      <td>{{$user['email_verified']}}</td>
      <td>{{$user['email_verified_at']}}</td>
      <td>{{$user['password']}}</td>
      <td>{{$user['telnumber']}}</td>
      <td>{{$user['postalcode']}}</td>
      <td>{{$user['address']}}</td>
      <td>{{$user['remember_token']}}</td>
      <td>{{$user['created_at']}}</td>
      <td>{{$user['updated_at']}}</td>
      <td>{{$user['deleted_at']}}</td>    
    </tr>
  </table>
  <a href="/list" class="btn btn--orange btn--radius">戻る</a>
</body>
</html>