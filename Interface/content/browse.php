<?php

/* get a list of the books in a usable form */
$booksArray = null;

require_once("util/connect.php");
connect(false);
$criterion='title';
$direction='ASC';
$page_num=1;
//$per_page=10; //default
$per_page=10;
if(isset($_GET['sort'])) {
    $criterion=$_GET['sort'];
}
if(isset($_GET['dir'])) {
    $direction=$_GET['dir'];
}
if(isset($_GET['page'])) {
    $page_num=$_GET['page'];
}
if(isset($_GET['num'])) {
    $per_page=$_GET['num'];
}
$pos=(($page_num - 1) * $per_page);
$query='SELECT * FROM Books ORDER BY '.$criterion .' ' .$direction .
" LIMIT " . $pos . ", " . $per_page. "";
$resource=mysql_query($query);
if($resource) {
    while($book=mysql_fetch_array($resource)) {
    	$booksArray[] = $book;
    }
} else {
	echo mysql_error();
}

?>

<div id="content">

<?php 
	require_once("util/listing.php");

	foreach ($booksArray as $book) {
		echo(generateBookListing($book));
	}

?>
	
	
	<div style="clear:both"></div>
	
	<div id="loading">
		<div id="loading-upper-border"></div>
		<div id="animation"></div>
	</div>
</div> <!-- end content -->	


<!--
    Authors: Derek Leung, Ben Chan
    Project BellBook - 2.0
    Bellarmine College Preparatory, 2012
-->