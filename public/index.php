<?php
require '../app/config/db.php';
require '../app/lib/Bootstrap.php';
require '../app/lib/Database.php';
require '../app/lib/Session.php';
require '../app/lib/Model.php';
require '../app/lib/Controller.php';
require '../app/lib/View.php';

Session::init();
$b = new Bootstrap();
