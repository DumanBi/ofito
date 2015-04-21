<?php if (Session::get('loggedIn') == true && Session::get('role') == 'default' ): ?>

    <?php if(!empty($this->reportSingleList)){?>
        <form action="<?php echo URL; ?>report/reportSingle" method="post">
            Сформировать отчет с: <input type="date" name="date1"> по: <input type="date" name="date2">
            <input type="submit" value="Показать">
        </form>
        <hr />
        <h1>Отчет с <?php echo $this->date1 ?> по <?php echo $this->date2 ?></h1>
        <table class="table" id="print1">
            <tr class="brd_btm">
                <th>Дата</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Сумма</th>
                <th>Статус</th>
            </tr>
            <?php      
                $day = '';
                $total = 0;
                $summa = 0;
                $paymentsum = 0;
                $paymenttot = 0;
                foreach ($this->reportSingleList as $key => $value){
                    if($day == $value['ordertime']){
                        $one = 1;
                    }else{
                        $one = 0;
                    }
                    $day = $value['ordertime'];
                    $odds = $summa - $paymentsum;
                    if($one == 0 && $summa != 0){ echo '<tr class="brd_btm"><td colspan="4" class="ta-r fw-b">Cумма</td>'
                    . '<td class="fw-b w100 ta-c">'. $summa . ' / ' . $paymentsum . '</td><td class="ta-c red">'. $odds . '</td></tr>';}
                    if($one == 0) { $summa = 0; $paymentsum = 0; }
                    echo '<tr>';
                    echo '<td class="ta-c">';
                            if($one == 0) echo $value['ordertime']
                        . '</td>';
                    echo '<td class="ta-l">'. $value['foodname'] . '</td>';
                    echo '<td class="w50 ta-c">'. $value['quantity'] .'</td>';
                    echo '<td class="w100 ta-c">'. $value['orderprice'] .'</td>';
                    echo '<td class="w50 ta-c">'. $value['total'] .'</td>';
                    echo '<td class="ta-c">';
                            if($value['status'] == 2) echo 'Оплачено';
                            else echo 'Ожидает оплаты';
                    echo '</td>';
                    echo '</tr>';
                    $total += $value['total'];
                    $summa += $value['total'];
                    if($value['status'] == 2){
                        $paymentsum += $value['total'];
                        $paymenttot += $value['total'];
                    }
                }    
            ?>
            <tr class="brd_btm"><td colspan="4" class="ta-r fw-b">Cумма</td><td class="fw-b w100 ta-c"><?php echo $summa . ' / ' . $paymentsum ?></td>
                <td class="ta-c red"><?php echo $summa - $paymentsum ?></td></tr>
            <tr class="brd_btm"><td colspan="4" class="fw-b pd20">Общая сумма</td><td class="fw-b w100 ta-c pd20"><?php echo $total . ' / ' . $paymenttot ?></td>
                <td class="ta-c red"><?php echo $total - $paymenttot ?></td></tr>
        </table>
        <div class="cb mb30"></div>

    <?php }else{ ?>

        <form action="<?php echo URL; ?>report/reportSingle" method="post">
            Сформировать отчет с: <input type="date" name="date1"> по: <input type="date" name="date2">
            <input type="submit" value="Показать">
        </form>
    <?php } ?>

<?php elseif (Session::get('loggedIn') == true && Session::get('role') == 'owner' || Session::get('role') == 'admin'): ?>
    
    <?php if(!empty($this->reportList)){?>
        <form action="<?php echo URL; ?>report/report" method="post">
            Сформировать отчет с: <input type="date" name="date1"> по: <input type="date" name="date2">
            <input type="submit" value="Показать">
        </form>
        <hr />
        <h1>Отчет с <?php echo $this->date1 ?> по <?php echo $this->date2 ?></h1>
        <table class="table" id="print1">
            <tr class="brd_btm">
                <th>Офис</th>
                <th>ФИО</th>
                <th>Дата</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Сумма</th>
                <th>Статус</th>
            </tr>
            <?php      
                $name = '';         //Имя пользователя
                $day = '';          //Дата заказа
                $total = 0;         //Общая сумма
                $totalSingle = 0;   //Общая сумма пользователя 
                $summa = 0;         //Общая сумма пользоветля за один день
                $paymentsum = 0;    //Оплаченная сумма за один день
                $paymenttot = 0;    //Оплаченная сумма пользователя
                foreach ($this->reportList as $key => $value){
                    if($name == $value['name']){
                        $one = 1;
                    }else{
                        $one = 0;
                    }
                    if($day == $value['ordertime'] && $name == $value['name']){
                        $two = 1;
                    }else{
                        $two = 0;
                    }
                    $name = $value['name'];
                    $day = $value['ordertime'];
                    $odds1 = $summa - $paymentsum;
                    $odds2 = $totalSingle - $paymenttot;
                    if($two == 0 && $summa != 0){ echo '<tr><td colspan="2"></td><td colspan="4" class="ta-r fw-b brd_btm">Cумма</td>'
                    . '<td class="fw-b w100 ta-c brd_btm">'. $summa . ' / ' . $paymentsum . '</td><td class="brd_btm ta-c red">'. $odds1 . '</td></tr>';}
                    if($two == 0){ $summa = 0; $paymentsum = 0;}
                    if($one == 0 && $totalSingle != 0){ echo '<tr class="brd_btm brd_top"><td colspan="6" class="fw-b">Общая сумма</td>'
                    . '<td class="fw-b w100 ta-c">'. $totalSingle . ' / ' . $paymenttot . '</td><td class="brd_btm ta-c red">'. $odds2 . '</td></tr>';}
                    if($one == 0){ $totalSingle = 0; $paymenttot = 0; }
                    echo '<tr>'
                            . '<td class="w50 ta-l">';
                                if($one == 0) echo $value['office']
                            . '</td>';
                    echo      '<td class="ta-l">';
                                if($one == 0) echo $value['surname'] . ' ' . $value['name']
                            . '</td>';
                    echo '<td class="ta-c">';
                            if($two == 0) echo $value['ordertime']
                        . '</td>';
                    echo '<td class="ta-l">'. $value['foodname'] . '<input type="hidden"  name="orderid[]" value="'. $value['orderid'] . '"></td>';
                    echo '<td class="w50 ta-c">'. $value['quantity'] .'</td>';
                    echo '<td class="w100 ta-c">'. $value['orderprice'] .'</td>';
                    echo '<td class="w50 ta-c">'. $value['total'] .'</td>';
                    echo '<td class="ta-c">';
                            if($value['status'] == 2) echo '<span id="'.$value['orderid'].'">Оплачено</span>';
                            else{ echo '<a href="'.URL.'report/payment/'.$value['orderid'].'/?date1='.$this->date1.'&date2='.$this->date2.'" id="' . $value['orderid'] . '">Принять оплату</a>';}
                    echo '</td>';
                    echo '</tr>';
                    $total += $value['total'];
                    $summa += $value['total'];
                    $totalSingle += $value['total'];
                    if($value['status'] == 2){
                        $paymentsum += $value['total'];
                        $paymenttot += $value['total'];
                    }
                }    
            ?>
            <tr class="brd_btm"><td colspan="6" class="ta-r fw-b">Cумма</td><td class="fw-b w100 ta-c"><?php echo $summa . ' / ' . $paymentsum  ?></td>
                <td class="ta-c red"><?php echo $summa - $paymentsum  ?></td></tr>
            <tr class="brd_btm"><td colspan="6" class="fw-b pd20">Общая сумма</td><td class="fw-b w100 ta-c pd20"><?php echo $totalSingle . ' / ' . $paymenttot ?></td>
                <td class="ta-c red"><?php echo $totalSingle - $paymenttot ?></td></tr>
            <tr class="brd_btm"><td colspan="6" class="fw-b pd20">Вся сумма</td><td class="fw-b w100 ta-c pd20"><?php echo $total ?></td><td></td></tr>
        </table>
        <div class="cb mb30"></div>

    <?php }else{ ?>

        <form action="<?php echo URL; ?>report/report" method="post">
            Сформировать отчет с: <input type="date" name="date1"> по: <input type="date" name="date2">
            <input type="submit" value="Сформировать">
        </form>
    <?php } ?>
    
<?php else: ?>
<p>Чтобы оформить заказ вы должны иметь права администратора.</p>
<?php endif; ?>