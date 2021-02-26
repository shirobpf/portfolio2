<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rooms管理者画面</title>
  <link rel="stylesheet" href="css/dblist.css" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/d3js/6.2.0/d3.min.js"></script>

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
    <table>
      <tr>
      <td>在庫管理一覧のエクスポート</td>
      <td><a href="#" class="btn btn--orange btn--radius">エクスポート</a></td>
      </tr>
      <tr>
      <td>ユーザーデータベースのエクスポート</td>  
      <td><a href="#" class="btn btn--blue btn--radius">エクスポート</a></td>
      </tr>
    </table>

    <table> 
      <tr>      
      <td>在庫管理一覧のインポート</td>
      <td>
        <form role="form" method="post" action="import" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" id="csv_file">
      </td>
      <td> 
        <div class="form-group">
            <button type="submit" class="btn btn-default btn-success">保存</button>
        </div>
        </form>
      </td>
      </tr>
      <tr>
      <td>ユーザーデータベースのインポート</td>  
      <td>
        <form role="form" method="post" action="import" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" id="csv_file">
      </td>
      <td>  
        <div class="form-group">
            <button type="submit" class="btn btn-default btn-success">保存</button>
        </div>
        </form>
      </td>
      </tr>
</table>

<div class="content">
    <a class="js-modal-open" href="">クリックでモーダルを表示</a>
</div>
<div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
        <p>ここにモーダルウィンドウで表示したいコンテンツを入れます。モーダルウィンドウを閉じる場合は下の「閉じる」をクリックするか、背景の黒い部分をクリックしても閉じることができます。</p>
        <a class="js-modal-close" href="">閉じる</a>
    </div><!--modal__inner-->
</div><!--modal-->

</body>
</html>