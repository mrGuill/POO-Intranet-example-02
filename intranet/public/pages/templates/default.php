<html>

<head>
	<title>CVS | Intranet</title>
	<meta charset='utf-8'/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="intranet/app/public/pages/templates/style.css" />
</head>

<br/>

<header>
	<h1 class="page-header text-center">INTRANET</h1>
</header>

<?php 
if($auth->islogged() === True){?>
<navbar>
	<ul>
		<li><a href="?page=dashboard">Dashboard</a></li>
		<li><a href="?page=settings">Settings</a></li>
		<li><a href="?page=logout">Logout</a></li>
	</ul>
</navbar>
<?php } ?>


<body>
<div class="container">
<!-- On affiche le contenu de la variable $content, définie dans index.php -->
<?php echo $content; ?>
</div>
</body>

</html>

