<?php 
$host = '127.0.0.1';
    $db   = 'my_database';
    $user = 'root';
    $pass = '';
    //$pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $user, $pass, $opt);





if(isset($_POST['submit'])) {
$img = $_POST['img'];
$h = $_POST['h'];
$p = $_POST['p'];


    $sql = "insert into news (img, h, p) values(:img, h, p)";
        $stn = $pdo->prepare($sql);
        $stn->bindParam(':img', $img, PDO::PARAM_STR);
        $stn->bindParam(':h', $h, PDO::PARAM_STR);
        $stn->bindParam(':p', $p, PDO::PARAM_STR);
    $stn->execute();
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Контакты</title>
	 <link rel="stylesheet" href="style2.css">
     <script type="text/javascript">
     </script>
</head>
<body>
<header class="header">
<div class="heading">
<p> На Крючк </p>
<img src="images/hook.png" id="fon">
<img src="images/logo.png" id="logo">
</div>
<nav class="headMenu">
 

 <div class="mainmenu"><a href="index.php">ГЛАВНАЯ</a></div>
 <div class="mainmenu"><a href="#">О КОМПАНИИ</a></div>
 <div class="mainmenu"><a  class="activ"  href="#">НОВОСТИ</a></div>
 <div class="mainmenu"><a href="contactsaut.php">КОНТАКТЫ</a></div>

 
</nav>

</header> 
<section id="wrapper">
	<div class="middle">
		
<div class="registration">
    <div class="form">

<form method="post" action="">
<input type="text" class="pol" id="img" name="img" placeholder="Введите путь до img"><br>
<input type="text" class="pol" id="h" name="h" placeholder="Введите заголовок"><br>
<textarea class="pol" id="p" name="p"> </textarea><br>

<br>

<br>
<br>
<input type="submit" value="Отправить" class="buttons" name="submit">
</form>

</div>
</div>
		</div>


</section>
<footer class="footer">
	<div class="footerInner">
		<div class="social">
	<a title="Группа ВКонтакте" href="#" class="vk"></a>
		<a title="Наш Твиттер" class="twitter" ></a>
		<a title="Наш Инстаграм"  class="instagram"></a>
		</div>
	
		<p> 8(950)-217-97-35</p>
		<p>© www.on_hook.ru - ароматизированные крючки </p>
	</div>

</footer>
</body>
</html>