<?php
/**
 * Se sterge cookie-ul PHPSESSID si se distruge sesiunea
 *      cu tot cu variabilele din $_SESSION[].
 * 
 * Apoi se redirectioneaza catre o pagina.
 */
session_start();

setcookie("PHPSESSID","",time()-3600,"/");
session_destroy();
header("Location: /FeE/Client_App/project.php");
exit;