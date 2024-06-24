<?php
session_start();

require_once "../models/import.php";

$confirm = processFile();

if($confirm === "OK")
{
    require_once "../views/Import_Export/import_success.php";
}
else
    echo '<script language="javascript">alert("There has been a problem. Try again!")</script>';