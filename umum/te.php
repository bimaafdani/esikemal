<?
session_start();
$_SESSION['capnum'] = ((isset($_SESSION['capnum'])) ? $_SESSION['capnum'] : 0);
if(isset($_GET['add'])){
     $_SESSION['capnum']++;
}
if (isset($_GET['reset'])){
	$_SESSION['capnum']=0;
}
?>
<form action="<? echo $_SERVER['PHP_SELF']; ?>" method="get">
<input type="submit" name="add" value="add" />
<input type="submit" name="reset" value="reset" />
</form>
<?
echo $_SESSION['capnum'];
?>