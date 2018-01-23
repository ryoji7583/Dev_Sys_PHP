
<html>
<head>
<title>PHP SQL</title>
<meta charset="utf-8">
</head>

<body>

<?php
$link = mysqli_connect('localhost', 'root', 'android.1429', 'board');

if ($link) {
	


    if (isset($_POST['send']) === true) {
        $name = $_POST["name"];
        $comment = $_POST["Document"];
        $sql =  " INSERT INTO board ( "
                    . "    name , "
                    . "    Document "
                    . " ) VALUES ( "
                    . "'" . mysqli_real_escape_string( $link, $name ) ."', "
                    . "'" . mysqli_real_escape_string( $link, $comment ) . "'"
                    ." ) ";
        $result = mysqli_query($link, $sql);
    }
        $query  = "SELECT name, Document FROM board";
        $res    = mysqli_query( $link,$query );
        $data = array();
        while( $row = mysqli_fetch_assoc( $res ) ) {
            array_push( $data, $row);
        }
        arsort( $data );
 
// データベースへの接続を閉じる


	foreach($data as $key => $val) {
		echo $val['name'] . ' ' . $val['Document'] . '<br />';
	}
        mysqli_close( $link );
        
}
?>
<form action="実験2.php" method="post">
ユーザー名:<input type="text" name="name"/>
内容:<input type="text" name="Document"/>
<input type="submit" name="send" value="追加">
</form>

</body>
</html>