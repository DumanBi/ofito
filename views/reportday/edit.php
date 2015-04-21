<h1>Редактирование данных</h1>

<form action="<?php echo URL; ?>reportday/editSave/<?php echo $this->orderSingle[0]['orderid']; ?>" method="post">
    <table class="table">
        <tr class="brd_btm">
            <th>Наименование</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Сумма</th>
            <th>Дата</th>
            <th>Статус</th>
        </tr>
        <tr>
            <td><?php echo $this->orderSingle[0]['foodname']; ?></td>
            <td><input class="w100" type="text" name="orderquantity" value="<?php echo $this->orderSingle[0]['orderquantity']; ?>" /></td>
            <td><input class="w100" type="text" name="orderprice" value="<?php echo $this->orderSingle[0]['orderprice']; ?>" /></td>
            <td><input class="w100" type="text" name="ordersum" value="<?php echo $this->orderSingle[0]['ordersum']; ?>" /></td>
            <td><?php echo $this->orderSingle[0]['ordertime']; ?></td>
            <td><?php echo $this->orderSingle[0]['status']; ?></td>
        </tr>
    </table>
    <p class="ta-r"><input value="Сохранить" type="submit" /></p>
</form>