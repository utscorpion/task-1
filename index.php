<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once 'php/functions.php';
    if (isset($argv)) {
        echo createText(makeDateCLI($argv));
        exit;
    } else {
        include_once 'html/header.html';
        exFile ($file);
        if (isset($_POST['submit'])) {
            if (file_exists($file) && isset($_POST['name']) && isset($_POST['date']) && isset($_POST['number']) && isset($_POST['month']) && (int)$_POST['month']!==0 && (int)$_POST['number']!==0) {
                echo createText(makeDate());
                include_once 'html/output.html';
            }
            else {
                echo 'Check Data';
            }
        }
        elseif (isset($_POST['mainPage'])) {
            cleanPost();
        }
        else {
            include_once 'html/input.html';
        }
    }
    include_once 'html/footer.html';






