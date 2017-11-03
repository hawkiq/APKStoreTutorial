<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 05/09/2017
 * Time: 07:21 م
 * IQ TECH Tutorials
 * Project : apkstore
 * db.php
 */
session_start();
$DbHost = 'localhost';
$DbUser = 'root';
$DbPass = '7632431o';
$DbName = 'apkstore';

global $connect;
$connect = mysqli_connect($DbHost,$DbUser,$DbPass,$DbName);

if (mysqli_connect_errno() > 0){
    die('Cannot Connect to Database');
}

mysqli_query($connect,'SET NAMES UTF8');
