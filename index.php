<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once ('functions.php');
    include_once ('header.html');
    if (isset($argv)) {
        echo makeDateCons($argv);
        exit;
    } else {
        if (isset($_POST['submit'])) {
            if (isset($_POST['name']) && isset($_POST['date']) && isset($_POST['number']) && isset($_POST['month']) && (int)$_POST['month']!=0 && (int)$_POST['number']!=0) {
                include_once ('output.php');
            }
            else {
                echo 'Check Data';
            }
        }
        else {
            include_once ('input.html');
        }
    }
    include_once ('footer.html');






