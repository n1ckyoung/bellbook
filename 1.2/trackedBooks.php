<? require("util/header.php");
connect(true);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>My Tracked Books</title>
    </head>
    <body>
        <? print_header(); ?>
        <h2>My Tracked Books</h2>
<?php
////TODO integrate into search.php
    require_once("util/listing.php");
    $id=$_SESSION['id'];
    $query="SELECT * FROM TMap WHERE studentId=$id";
    $resource=mysql_query($query);
    if($resource) {
        while($row=mysql_fetch_array($resource)) {
            $listId=$row['listingId'];
            $tr_query="SELECT * FROM Listings WHERE listingId=$listId";
            $tr_rsrc=mysql_query($tr_query);
            if($tr_rsrc) {
                while($tr_row=mysql_fetch_array($tr_rsrc)) {
                    $owner=$tr_row['ownerId'];
                    $owner_query="SELECT * FROM Users WHERE studentId=$owner";
                    $own_rsrc=mysql_query($owner_query);
                    if($own_rsrc) {
                        $own_row=mysql_fetch_array($own_rsrc);
                        echo "<hr />";
                        echo generateListing_S($tr_row['ISBN'], mappedTitle($tr_row['ISBN']),
                            $tr_row['price'], $tr_row['post'], $tr_row['descr'],
                            $own_row['email'], $row2['studentId'], $own_row['firstName'],
                            $own_row['lastName']);
                        ?>
<form action="util/trackBook.php" method="post">
            <input type="hidden" name='list_id' value=<? echo '"' .
            $row['listingId'] . '"' ?> />
            <input type="hidden" name='oper' value='0' />
            <input type="submit" value="Remove" />
        </form>
                        <?
                    }
                }
            }
        }
    }
?>
        <? require("util/footer.php"); ?>
    </body>
</html>


<!--
    Authors: Derek Leung, David Byrd
    Project BellBook - 1.2
    Bellarmine College Preparatory, 2011
-->