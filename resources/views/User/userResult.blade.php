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
@php
  
  $result_json  = $responses->content();
  $responses = json_decode( $result_json, true );

@endphp
  <p>{{$responses['result']}}</p>
  <p>{{$responses['id'].$responses['email']}}</p>
  <p>{{$responses['message']}}</p>
</body>
</html>