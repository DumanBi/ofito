<?php if (Session::get('loggedIn') == true && Session::get('role') == 'owner' || Session::get('role') == 'admin'): ?>
<h1>Список заказов на <?php echo date('Y-m-d')?></h1>

<?php if(!empty($this->orderList)){?>
<form action="<?php echo URL; ?>reportday/closereport" method="post">
    <table class="table fz14" id="print1">
        <tr class="brd_btm">
            <th>Офис</th>
            <th>ФИО</th>
            <th>Наименование</th>
            <th>Ед. изм.</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Сумма</th>
            <th>Дата</th>
            <th>Статус</th>
        </tr>
        <?php      
            $name = '';
            $total = 0;
            $summa = 0;
            foreach ($this->orderList as $key => $value){
                if($name == $value['name']){
                    $one = 1;
                }else{
                    $one = 0;
                }
                $name = $value['name'];
                if($one == 0 && $summa != 0) echo '<tr class="brd_btm"><td colspan="6" class="ta-r fw-b">Cумма</td><td class="fw-b w50 ta-c">'. $summa .'</td><td colspan="2"></td></tr>';
                if($one == 0) $summa = 0;
                echo '<tr>'
                        . '<td class="w50 ta-l">';
                            if($one == 0) echo $value['office']
                        . '</td>';
                echo      '<td class="ta-l">';
                            if($one == 0) echo $value['surname'] . ' ' . $value['name']
                        . '</td>';
                echo '<td class="ta-l">'. $value['foodname'] . '<input type="hidden"  name="orderid[]" value="'. $value['orderid'] . '"></td>';
                echo '<td class="w100 ta-c">'. $value['foodsize'] . ' ' . $value['foodmeasure'] .'</td>';
                echo '<td class="w50 ta-c">'. $value['quantity'] .'</td>';
                echo '<td class="w100 ta-c"><a title="Редактировать" href="'.URL.'reportday/edit/'.$value['orderid'].'">'. $value['orderprice'] .'</a></td>';
                echo '<td class="w50 ta-c">'. $value['total'] .'</td>';
                echo '<td class="w100 ta-c">'. $value['ordertime'] .'</td>';
                echo '<td class="ta-c w150">';
                if($value['status'] == 1) echo 'Заказан';
                else if($value['status'] == 0){ 
                    echo 'Не заказан <i><a href="'.URL.'reportday/delete/'.$value['orderid'].'">Удалить</a></i>';
                }
                echo '</td></tr>';
                $total += $value['total'];
                $summa += $value['total'];
            }    
        ?>
        <tr class="brd_btm"><td colspan="6" class="ta-r fw-b">Cумма</td><td class="fw-b w50 ta-c"><?php echo $summa ?></td><td colspan="2"></td></tr>
        <tr class="brd_btm"><td colspan="6" class="fw-b">Общая сумма</td><td class="fw-b w50 ta-c"><?php echo $total ?></td><td colspan="2"></td></tr>
    </table>
    <div class="cb mb30"></div>
    <input type="button" value="Печать" class="fl-r" onclick="printTable1()" />
    <input type="submit" value="Заказать" class="fl-r mr30" />
    <div class="cb mb30"></div>   
    </form>

<hr class="mb30 mt30">
<div id="print2">
    <h1>Сгрупированный список:</h1>

    <table>
        <tr>
            <th>Наименование</th>
            <th>Ед. изм.</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Сумма</th>
        </tr>
        <?php      
            $total = 0;
            foreach ($this->groupList as $key => $value){
                echo '<tr>';
                echo '<td class="ta-l">'. $value['foodname'] . '</td>';
                echo '<td class="w150 ta-c">'. $value['foodsize'] . ' ' . $value['foodmeasure'] .'</td>';
                echo '<td class="w50 ta-c">'. $value['quantity'] .'</td>';
                echo '<td class="w100 ta-c">'. $value['orderprice'] .'</td>';
                echo '<td class="w50 ta-c">'. $value['total'] .'</td>';
                echo '</tr>';
                $total += $value['total'];
            }    
            echo '<tr class="fw-b"><td colspan="4">Общая сумма:</td><td class="w100 ta-c">'. $total .'</td></tr>';
        ?>
    </table>
    
    <div class="cb mb30"></div>
    
    <hr class="mb30 mt30">

    <h1>Сгрупированный список по офисам:</h1>

    <table>
        <tr>
            <th>Офис</th>
            <th>Наименование</th>
            <th>Ед. изм.</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Сумма</th>
        </tr>
        <?php      
            $total = 0;
            $office = '';
            
            foreach ($this->groupListOffice as $key => $value){
                if($office == $value['office']){
                    $one = 1;
                }else{
                    $one = 0;
                }
                $office = $value['office'];
                echo '<tr>';
                echo '<tr>'
                        . '<td class="ta-l">';
                            if($one == 0) echo $value['office']
                        . '</td>';
                echo '<td class="ta-l">'. $value['foodname'] . '</td>';
                echo '<td class="w150 ta-c">'. $value['foodsize'] . ' ' . $value['foodmeasure'] .'</td>';
                echo '<td class="w50 ta-c">'. $value['quantity'] .'</td>';
                echo '<td class="w100 ta-c">'. $value['orderprice'] .'</td>';
                echo '<td class="w50 ta-c">'. $value['total'] .'</td>';
                echo '</tr>';
                $total += $value['total'];
            }    
            echo '<tr class="fw-b"><td colspan="5">Общая сумма:</td><td class="w100 ta-c">'. $total .'</td></tr>';
        ?>
    </table>
    </div>
    <input type="button" value="Печать" class="fl-r" onclick="printTable2()" />
    <div class="cb mb30"></div>
    
<?php 
    }else{
        echo '<p>Сегодня еще никто не заказывал!</p>';
    }
?>

<?php else: ?>
<p>Чтобы оформить заказ вы должны иметь права администратора.</p>
<?php endif; ?>