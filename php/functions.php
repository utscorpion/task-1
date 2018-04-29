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

    function makeDate ()
    {
        $arrUserInfo = [];
        $execdate = $_POST['date'];
        $arrUserInfo[1] = $_POST['number'];
        $arrDate = explode('-', $execdate);
        $arrUserInfo[3] = $_POST['month'];
        $arrUserInfo[4] = date("d-m-Y", mktime(0, 0, 0, $arrDate[1] + $_POST['month'], $arrDate[2], $arrDate[0]));
        $arrUserInfo[2] = date("d-m-Y", mktime(0, 0, 0, $arrDate[1], $arrDate[2], $arrDate[0]));
        $arrUserInfo[0] = ucfirst(strtolower(trim($_POST['name'])));

        return $arrUserInfo;
    }

    function makeDateCLI ($arrCon)
    {
        $arrUserInfo = [];
        if ((int)$arrCon[2] !== 0 && (int)$arrCon[3] !== 0) {
            $arrUserInfo[1] = (int)$arrCon[2];
            $arrUserInfo[3] = (int)$arrCon[3];
        } else {
            exit('Please, use correct data type');
        }
        $arrUserInfo[0] = ucfirst(strtolower($arrCon[1]));
        $arrUserInfo[2] = date('d-m-Y');
        $arrUserInfo[4] = date("d-m-Y", mktime(0, 0, 0, date("m") + (int)$arrCon[3], date("d"), date("Y")));

        return $arrUserInfo;
    }

    function createText ($arrUserInfo)
    {
        $toStr = implode('', exFile('template.tpl'));
        $regExp = '/[%]\w+[%]/';
        preg_match_all($regExp, $toStr, $matches);
        $arrTemplate = $matches[0];
        foreach ($matches[0] as $elem) {
            $elem = str_replace("%", "",$elem);
            $arrTemplate[] .= $elem;
        };

        $arrRes = [];
        for ($j = 0; $j < 5; ++$j) {

            switch ($j) {
                case 0:
                    $arrRes[$j] = [$arrTemplate[$j] => $arrUserInfo[$j]];
                    break;
                case 1:
                    $arrRes[$j] = [$arrTemplate[$j] => $arrUserInfo[$j]];
                    break;
                case 2:
                    $arrRes[$j] = [$arrTemplate[$j] => $arrUserInfo[$j]];
                    break;
                case 3:
                    $arrRes[$j] = [$arrTemplate[$j] => $arrUserInfo[$j]];
                    break;
                case 4:
                    $arrRes[$j] = [$arrTemplate[$j] => $arrUserInfo[$j]];
                    break;
            }
        }

        for ($i = 0; $i < count($arrRes); $i++) {
            foreach ($arrRes[$i] as $key => $value) {
                $toStr = str_replace($key, $value, $toStr);
            }
        }
        return $toStr;
    }
