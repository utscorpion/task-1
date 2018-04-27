<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('form.html');
    include ('makeDate.php');
    if (isset($argv)) {
        echo makeDateCons($argv);
    } else {
       // include('form.html');
        if (isset($_POST['submit'])) {
            if (isset($_POST['name']) && isset($_POST['date']) && isset($_POST['number']) && isset($_POST['month']) && (int)$_POST['month']!=0 && (int)$_POST['number']!=0) {
                echo makeDate();
            }
            else {
                echo 'Check Data';
            }
        }
    }






