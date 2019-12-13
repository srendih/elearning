<?php
session_start();

$_SESSION['level']='';
$_SESSION['id']='';

unset($_SESSION['id']);
unset($_SESSION['level']);
session_unset();
session_destroy();
?>
<script language="javascript">
	alert("Anda Telah Log Out");
	document.location='../';
	</script>