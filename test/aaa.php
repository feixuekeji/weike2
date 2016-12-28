<?php
/*foreach($_POST['nodeid'] as $k=>$v){
    $ar[]=array($v,$_POST['question'][$k],$_POST['xuanxiang'][$k]);
}*/

$out = array();
foreach ($_POST as $key => $value) {
    foreach ($value as $k => $v) {
        $a=$out[$k][] = $value[$k];
        var_dump($a);
    }
}
//print_r($ar);

var_dump($_POST);
?>