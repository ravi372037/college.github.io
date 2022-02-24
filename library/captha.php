<!DOCTYPE html>
<html>
<body>

<?php
$r=rand(1000,9999);

 if($_SERVER['REQUEST_METHOD']=='POST')
{
	$n=$_POST['n'];
    echo $n;
    
}

?>
<form method="POST">
<input type="text" name="n">
<input type="submit">
</form>
</body>
</html>
