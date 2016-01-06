<?php
/**
 * Created by PhpStorm.
 * User: Tinithrari
 * Date: 06/01/2016
 * Time: 09:31
 */

session_start();
session_destroy();

header("location: index.php");
?>