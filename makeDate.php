<?php
    function strRep($a, $b, $c)
    {
        $c = str_replace($a, $b, $c);
        return $c;
    }
    function makeDate ()
    {
        $USERNAME = ucfirst(strtolower($_POST['name']));
        $EXECDATE = $_POST['date'];
        $NUMBER = (int)$_POST['number'];
        $arrDate = explode('-', $EXECDATE);
        $MONTHNUM = $_POST['month'];
        $ENDDATE = date("d-m-Y", mktime(0, 0, 0, $arrDate[1] + $MONTHNUM, $arrDate[2], $arrDate[0]));
        $EXECDATE = date("d-m-Y", mktime(0, 0, 0, $arrDate[1], $arrDate[2], $arrDate[0]));
        $arrFile = file('template.tpl');
        $toStr = implode('<br>', $arrFile);
        $regExp = '/[%]\w+[%]/';
        preg_match_all($regExp, $toStr, $matches);
        $arr = $matches[0];
        $arr2 = [];
        for ($j = 0; $j < 5; ++$j) {
            switch ($j) {
                case 0:
                    $arr2[$j] = [$arr[$j] => $USERNAME];
                    break;
                case 1:
                    $arr2[$j] = [$arr[$j] => $NUMBER];
                    break;
                case 2:
                    $arr2[$j] = [$arr[$j] => $EXECDATE];
                    break;
                case 3:
                    $arr2[$j] = [$arr[$j] => $MONTHNUM];
                    break;
                case 4:
                    $arr2[$j] = [$arr[$j] => $ENDDATE];
                    break;
            }
        }
        for ($i = 0; $i < count($arr2); $i++) {
            foreach ($arr2[$i] as $key => $value) {
                $toStr = strRep($key, $value, $toStr);
            }
        }
        return $toStr;
    }

    function makeDateCons ($arrCon)
    {
        $USERNAME = ucfirst(strtolower($arrCon[1]));
        $EXECDATE = date('d-m-Y');
        $NUMBER = (int)$arrCon[2];
        $MONTHNUM = (int)$arrCon[3];
        $ENDDATE = date("d-m-Y", mktime(0, 0, 0, date("m")+$MONTHNUM, date("d"),   date("Y")));
        $arrFile = file('template.tpl');
        $toStr = implode(' ', $arrFile);
        $regExp = '/[%]\w+[%]/';
        preg_match_all($regExp, $toStr, $matches);
        $arr = $matches[0];
        $arr2 = [];
        for ($j = 0; $j < 5; ++$j) {
            switch ($j) {
                case 0:
                    $arr2[$j] = [$arr[$j] => $USERNAME];
                    break;
                case 1:
                    $arr2[$j] = [$arr[$j] => $NUMBER];
                    break;
                case 2:
                    $arr2[$j] = [$arr[$j] => $EXECDATE];
                    break;
                case 3:
                    $arr2[$j] = [$arr[$j] => $MONTHNUM];
                    break;
                case 4:
                    $arr2[$j] = [$arr[$j] => $ENDDATE];
                    break;
            }
        }
        for ($i = 0; $i < count($arr2); $i++) {
            foreach ($arr2[$i] as $key => $value) {
                $toStr = strRep($key, $value, $toStr);
            }
        }
        return $toStr;
    }