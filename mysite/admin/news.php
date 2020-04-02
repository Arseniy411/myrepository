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
    //$stn->execute(array('email' => $email, 'password' => $password));
    //$res = $stn->fetchColumn();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Контакты</title>
	 <link rel="stylesheet" href="style4.css">
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
		
	<?php  
?>
<div class="new">
<img class="newsimg" src="images/redhook.png">
<div class="newsdiv">
<h1> НОВИНКА! Крючок "Дождевые черви"</h1>
<p> 
В нашем ассортименте появилась партия крючков под названием "Дождевые черви". На такой крючок
отлично ловится речная рыба (плотва, карась, а также крупная рыба - сазан,
лещ). Для рыболов это стандартная наживка и практически универсальная,
т.к. даже некоторые представители хищной рыбы клюют на нее.
</p>
</div>

    </div>
		</div>

        <input type="button" name="addnews" class="buttons2" value="Добавить новость" onclick='location.href="newsadd.php"'>

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