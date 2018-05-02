<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once 'php/functions.php';
    if (isset($argv)) {
        echo createText(makeDate($argv));
        exit;
    } else {
        include_once 'html/header.html';
        exFile ($file);
        if (isset($_POST['submit'])) {
            if (checkData () ) {
                var_dump(parseTpl());
                //echo createText(makeDate($_POST));
                include_once 'html/output.html';
            } else {
                echo 'Please, fill all fields and use correct data type';
            }
        } elseif (isset($_POST['mainPage'])) {
            header('Location: /index.php');
        } else {
            include_once 'html/input.html';
        }
    }
    include_once 'html/footer.html';






