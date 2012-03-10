<? 
/*
* Derek Leung
* Benjamin Chan
*/?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
	<!-- jquery -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<script type="text/javascript" src="includes/spin.min.js"></script>
	<script type="text/javascript" src="includes/browse.js"></script>
	<title>Title Goes Here</title>
	<?php $pagetitle = "Title Goes Here"; ?>
</head>
<body>

<div id="header">
	<div id="content-area">
		<form id="search-form">
			<input  type="text" value="<?php echo $pagetitle; /* Title of the page */?>"/>
			<button id="search-icon"  type="submit" name="title-bar" value="Submit"></button>
		</form>
		<div id="menu-and-options">
			<div id="page-options">
				Sort by: <a class="selected" href="">relevance</a> <a href="">seller</a> <a href="">date</a>
			</div>
			<ul id="menu">
				<li><a href="about.php">questions</a></li>
				<li id="profile">
					<?php if(isset($_SESSION['id'])) { ?>
					<a id="profile-link" href=""><?php echo $_SESSION['firstname']; ?></a>
					<ul id="profile-nav">
						<li><a href="myAccount.php">My Profile</a></li>
						<li><a href="myAccount.php">Transaction Settings</a></li>
						<li><a href="myAccount.php">Sell A Book</a></li>
						<li><a href="util/logout.php">Log Out</a></li>
					</ul>
					<?php }  else {?>
					<a id="profile-link" href="login.php">Log In</a>
					<ul id="profile-nav">
						<li><a href="register.php">Register</a></li>
					</ul>
					<?php } ?>
				</li>
				<li><a id="title-logo" href="index.php">BellBook</a></li>
			</ul>
		</div>
	</div>
	<div id="border-bottom"></div>
</div><!--header, beginning of content-->

