<?php if (Session::get('loggedIn') == true): ?>
<h1>Меню</h1>

<table class="table">
    <tr>
        <th class="w150 ta-l">Категория</th>
        <th class="ta-l">Наименование</th>
        <th class="w50 ta-c">Единица</th>
        <th class="w100 ta-c"></th>
        <th class="w50 ta-c">Цена</th>
        <th class="w100 ta-c">Количество</th>
        <th class="w100 ta-c"></th>
    </tr>
</table>

    <?php
        
        $foodcategory = '';
        foreach ($this->orderList as $key => $value){
            echo '<form action="' . URL . 'order/cart/'. $value['foodid'] .'" method="post"><table class="table">';
            if($foodcategory == $value['foodcategory']){
                $one = 1;
            }else{
                $one = 0;
            }
            $foodcategory = $value['foodcategory'];

            echo '<tr>'
                    . '<td class="w150 ta-l">';
                        if($one == 0) echo $value['foodcategory']
                    . '</td>';
            echo '<td class="ta-l">'. $value['foodname'] . '</td>';
            echo '<td class="w50 ta-c">'. $value['foodsize'] .'</td>';
            echo '<td class="w100 ta-c">'. $value['foodmeasure'] .'</td>';
            echo '<td class="w50 ta-c">'. $value['foodprice'] .'</td>';
            echo '<td class="w100 ta-c"><input type="number" value="1" name="orderquantity" class="quantity"></td>';
            echo '<td class="w100 ta-c"><input type="submit" value="Добавить" /></td>';
            echo '</tr>';
            echo '</table></form>';
        }
        if(empty($this->orderList)){
            echo '<p class="ta-c">Сегодняшнее меню еще не сформировано</p>';
        }
    ?>

<hr class="mb30 mt30">

<h1>Ваш заказ:</h1>

<?php 
    if(!empty($this->userOrderList)){ 
?>
        <table class="food_menu">
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Сумма</th>
                <th>Время заказа</th>
                <th></th>
            </tr>
            <?php
                $total = 0;
                foreach ($this->userOrderList as $key => $value){
                    echo '<tr>';
                    echo '<td class="ta-c">'. $value['foodname'] .'</td>';
                    echo '<td class="ta-c">'. $value['orderprice'] .'</td>';
                    echo '<td class="ta-c">'. $value['quantity'] .'</td>';
                    echo '<td class="ta-c w100">'. $value['total'] .'</td>';
                    echo '<td class="ta-c">'. $value['ordertime'] .'</td>';
                    echo '<td>';
                        if($value['status'] == 1) echo 'Заказан';
                        else if($value['status'] == 2) echo 'Оплачено';
                        else if($value['status'] == 0) echo '<a class="delete" href="'.URL.'order/delete/'.$value['orderid'].'">Удалить</a>'
                       . '</td>';
                    echo '</tr>';
                    $total += $value['total'];
                }
                echo '<tr class="fw-b"><td colspan="3">Общая сумма:</td><td class="w100 ta-c">'. $total .'</td><td colspan="2"></td></tr>';
            ?>
        </table>

<?php 
    }else{
        echo '<h2>Ваша корзина пуста</h2';
    } 
?>

<?php else: ?>
<p>Чтобы заказать авторизуйтесь пожалуйста.</p>
<?php endif; ?>