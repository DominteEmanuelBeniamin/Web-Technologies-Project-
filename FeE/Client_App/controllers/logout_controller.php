<?php
session_start();
//$_SESSION['logged_in'] = false;
//setcookie("New_session","",time()-3600,"/");
setcookie("PHPSESSID","",time()-3600,"/");
session_destroy();
header("Location: /FeE/Client_App/project.php");
exit;