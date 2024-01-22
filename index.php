<?php
session_start();
use App\Libraries\Route;
require_once ('vendor/autoload.php');


require_once ('config/database.php');

$route=new Route();

Route::route_site();
