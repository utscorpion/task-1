<?php
    $file = 'template.tpl';

    function checkData ()
    {
        if (file_exists('template.tpl') && isset($_POST['name']) && isset($_POST['date']) &&
            isset($_POST['number']) && isset($_POST['month']) && (int)$_POST['month']!==0 && (int)$_POST['number']!==0)
        {

            return true;
        } else {

          return false;
        }
    }

    function exFile ($file)
    {
        if (file_exists($file)) {
            $arrFile = file($file);
            return $arrFile;
        } else {
            exit("Файла $file не существует  или невозможно загрузить");
        }
    }

    function makeDateCli ($arr)
    {
        $arrUserInfo = [];
            if ((int)$arr[2] !== 0 && (int)$arr[3] !== 0) {
                $arrUserInfo['number'] = (int)$arr[2];
                $arrUserInfo[3] = (int)$arr[3];
            } else {
                exit('Please, use correct data type');
            }
            $arrUserInfo[0] = ucfirst(strtolower($arr[1]));
            $arrUserInfo[2] = date('d-m-Y');
            $arrUserInfo[4] = date("d-m-Y", mktime(0, 0, 0, date("m") + (int)$arr[3], date("d"), date("Y")));

            return $arrUserInfo;
    }

    function makeDate ($arr)
    {
        $arrUserInfo = [];
        if (isset($_POST) && count($_POST)>0) {
            $execdate = $_POST['date'];
            $arrUserInfo['number'] = $_POST['number'];
            $arrDate = explode('-', $execdate);
            $arrUserInfo['month'] = $_POST['month'];
            $arrUserInfo['enddate'] = date("d-m-Y", mktime(0, 0, 0, $arrDate[1] + $_POST['month'], $arrDate[2], $arrDate[0]));
            $arrUserInfo['execdate'] = date("d-m-Y", mktime(0, 0, 0, $arrDate[1], $arrDate[2], $arrDate[0]));
            $arrUserInfo['name'] = ucfirst(strtolower(trim($_POST['name'])));

            return $arrUserInfo;
        } else {
            if ((int)$arr[2] !== 0 && (int)$arr[3] !== 0) {
                $arrUserInfo['number'] = (int)$arr[2];
                $arrUserInfo['month'] = (int)$arr[3];
            } else {
                exit('Please, use correct data type');
            }
            $arrUserInfo['name'] = ucfirst(strtolower($arr[1]));
            $arrUserInfo['execdate'] = date('d-m-Y');
            $arrUserInfo['enddate'] = date("d-m-Y", mktime(0, 0, 0, date("m") + (int)$arr[3], date("d"), date("Y")));

            return $arrUserInfo;
        }
    }

    function createText ($arrUserInfo)
    {
        $toStr = implode('', exFile('template.tpl'));
        $regExp = '/[%]\w+[%]/';
        preg_match_all($regExp, $toStr, $matches);
        $arrTemplate = array_flip($matches[0]);
        foreach ($arrTemplate as $key=>$value) {
            switch ($key) {
                case '%USERNAME%':
                    $arrTemplate['%USERNAME%'] = $arrUserInfo['name'];
                    break;
                case '%NUMBER%':
                    $arrTemplate['%NUMBER%'] = $arrUserInfo['number'];
                    break;
                case '%EXECDATE%':
                    $arrTemplate['%EXECDATE%'] = $arrUserInfo['execdate'];
                    break;
                case '%MONTHNUM%':
                    $arrTemplate['%MONTHNUM%'] = $arrUserInfo['month'];
                    break;
                case '%ENDDATE%':
                    $arrTemplate['%ENDDATE%'] = $arrUserInfo['enddate'];
                    break;
            }
        }
        foreach ($arrTemplate as $key => $value) {
            $toStr = str_replace($key, $value, $toStr);
        }

        return $toStr;
    }
