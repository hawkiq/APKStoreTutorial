<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 12/09/2017
 * Time: 08:51 م
 * IQ TECH Tutorials
 * Project : apkstore
 * logout.php
 */
session_start();
$_SESSION['login'] = "";
unset($_SESSION['login']);
session_destroy();
header("Location:index.php");