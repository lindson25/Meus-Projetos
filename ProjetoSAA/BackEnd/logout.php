<?php

if(!isset($_SESSION)) {
    session_start();
}

session_destroy();

header("Location: pag03.html");

?>