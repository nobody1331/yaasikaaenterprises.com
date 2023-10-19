<?php
if(!isset($_SESSION['auth']))
{
     redirect("login","Login to continue");
}

?>