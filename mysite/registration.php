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
   

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Контакты</title>
	 <link rel="stylesheet" href="style3.css">
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
 <div class="mainmenu"><a href="#">ПРОДУКЦИЯ</a></div>
 <div class="mainmenu"><a  class="activ"  href="contacts.php">КОНТАКТЫ</a></div>

 
</nav>

</header> 
<section id="wrapper">
	<div class="middle">
		<div class="registration">

<img src="images/icon.png">

<div class="form">

<p> 


<?php 
if($_POST['login']=='')
echo "Для регистрации вам необходимо придумать логин и пароль.";

else 
{
    $sql1 = 'select login from users where login = :login and password = :password';
    $stn = $pdo->prepare($sql1);
$stn->execute(array($_POST['login'], $_POST['password']));
$arr = $stn->fetchAll(PDO::FETCH_COLUMN);

if(count($arr)>0)
echo "Пользователь с таким логином уже существует.";
else 
{
    $sql2 = 'insert into users (login, password) values(:login, :password)';
    $stn = $pdo->prepare($sql2);
$stn->execute(array($_POST['login'], $_POST['password']));
echo "Регистрация прошла успешно.";
}


}
?>


</p>
<form method="post" action="">
<input type="text" class="pol" id="email" name="login" placeholder="Логин"><br>
<br>
<input type="password" class="pol" id="pass" name="password" placeholder="Пароль">
<br>
<br>
<input type="submit" value="Зарегистрироваться"  class="buttons" href="index.php">
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