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

$login = $_POST['login'];
$password =  $_POST['password'];


    $pdo = new PDO($dsn, $user, $pass, $opt);
    $stn = $pdo->prepare('select login from users where login = :login and password = :password');
    $stn->execute(array($_POST['login'], $_POST['password']));
   
$arr = $stn->fetchAll(PDO::FETCH_COLUMN);



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
 

 <?php 
 if($_POST['login']=='admin' && $_POST['password']=='admin158') {
     echo '<div class="mainmenu"><a href="admin/index.php">ГЛАВНАЯ</a></div>';
  echo '<div class="mainmenu"><a href="#">О КОМПАНИИ</a></div>';
 echo '<div class="mainmenu"><a href="admin/news.php">НОВОСТИ</a></div>';
  echo '<div class="mainmenu"><a  class="activ"  href="#">ВХОД</a></div>';
}
else {
    echo '<div class="mainmenu"><a href="index.php">ГЛАВНАЯ</a></div>';
  echo '<div class="mainmenu"><a href="#">О КОМПАНИИ</a></div>';
 echo '<div class="mainmenu"><a href="newsusers.php">НОВОСТИ</a></div>';
  echo ' <div class="mainmenu"><a  class="activ"  href="#">ВХОД</a></div>';
}


 ?>

</nav>

</header> 
<section id="wrapper">
	<div class="middle">
		<div class="registration">

<img src="images/icon.png">

<div class="form">

<br>

<br>
<form method="post" action="">
<input type="text" class="pol" id="email" name="login" placeholder="Введите логин"><br>
<br>
<input type="password" class="pol" id="pass" name="password" placeholder="Пароль">
<br>
<br>
<input type="submit" value="Вход" class="buttons">
<input type="button" value="Регистрация"  class="buttons" onclick="location.href='registration.php'"/>
</form>

<p> 
	<?php  
if($_POST['login']!="") {
if(count($arr)>0) {
    if($_POST['login']=='admin')
        echo "Вы зашли под учеткой администратора.";
    else
    echo "Авторизация прошла успешно.";
}
else echo "Такого пользователя не существует.";
}
else 
    echo "";
   ?>
    	
    </p>

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