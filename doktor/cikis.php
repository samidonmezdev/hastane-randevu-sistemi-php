<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 3.03.2019
 * Time: 15:56
 */

session_start();
session_destroy();
header("Location: login.php");
