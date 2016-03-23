<?php
/**
 * Created by PhpStorm.
 * User: Alek
 * Date: 18.03.16
 * Time: 22:29
 */
    $arrPersentYear = array(9, 11, 13, 15, 17, 19, 21);
    $month = 12;
    echo '<html>';
    echo '<head>';
    echo '<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">';
    echo '<title>PHP</title>';
    echo '</head>';
    echo '<body>';
    echo '<h3>Данные формы:</h3>';
    echo "Сумма покупки: <b>" . $_GET['summa'] . "</b><br>";
    echo "Выбирите первоначальный взнос в процентах: <b> " . $_GET['vznos'] . "</b><br>";
    echo "Значение списка с единственным выбором: <b>" . $_GET['srok'] . "</b><br><br>";
    $summa = $_GET['summa'];
    $vznos = $_GET['vznos'];
    $srok = $_GET['srok'];
    $persent = ($summa * $vznos) / 100;
    $ostatok = ($summa - $persent) + (((($summa - $persent) * $arrPersentYear[$srok-1] * $srok) / 100));
    $dolg = $ostatok / ($srok * $month);
    echo "<h3>Подсчет: </h3>";
    echo "Ежемесечная плата: " . round($dolg, 0) . "<br>";
    echo "Общий долг: " . round($ostatok, 0) . "<br>";
    echo "Процентная ставка: " . $arrPersentYear[$srok-1] . " %<br>";
    echo "<table border = 1><tr>";
    for ($x=1; $x < ($srok * $month)+1;)
        {
            if ($x%2) $color = "gray";
            else $color = "white";
            echo "<td width = 150 px bgcolor = $color>" . $x . " месяц </td>" . "<td width = 150 px bgcolor = $color>" .
            round($dolg, 0) . "</td>" . "<td width = 150 px bgcolor = $color>" . round($ostatok, 0) . "</td>";
            $ostatok = $ostatok - $dolg;
            $x++;
            echo "</tr>";
        }
?>