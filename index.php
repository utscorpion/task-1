<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include ('makeDate.php');
    include('form.html');
    if (isset($_POST['submit'])) {
        if(isset($_POST['name']) && isset($_POST['date']) && isset($_POST['number']) ) {
            //header('Location: /res.php');
            echo makeDate();
            //include ('res.php');
        } else {
            echo 'Check data';
        }
    }

    

    /*$toStr = str_replace("%USERNAME%", $USERNAME, "$toStr");
    $toStr = str_replace("%EXECDATE%", $EXECDATE, "$toStr");
    $toStr = str_replace("%MONTHNUM%", $MONTHNUM, "$toStr");
    $toStr = str_replace("%ENDDATE%", $ENDDATE, "$toStr");
    $toStr = str_replace("%NUMBER%", $NUMBER, "$toStr");*/
   // echo  strRep("%USERNAME%", $USERNAME, $toStr);






