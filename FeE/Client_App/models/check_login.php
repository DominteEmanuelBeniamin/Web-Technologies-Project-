<?php

function isValid(){
    if(isset($_POST['signin']))
        return true;
    else 
        return false;
}
