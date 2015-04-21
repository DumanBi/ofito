<?php if (Session::get('role') == 'owner' || Session::get('role') == 'admin'): ?>
<h1>Редактировать меню</h1>

<form action="<?php echo URL; ?>menu/editSave/<?php echo $this->menu[0]['foodid']; ?>" method="post">
    <table class="food_menu">
        <tr>
            <th>
                Категория
            </th>
            <th>
                Название
            </th>
            <th></th>
            <th></th>
            <th>
                Цена
            </th>
        </tr>
        <tr>
            <td>
                <select name="foodcategory">
                    <?php
                        foreach ($this->foodCategoryList as $value){
                            if($this->menu[0]['foodcategory'] == $value) echo '<option value="'. $value .'" selected >'. $value .'</option>';
                            else echo '<option value="'. $value .'" >'. $value .'</option>';
                        }
                    ?>
                </select>
            </td>
            <td>
                <input type="text" name="foodname" value="<?php echo $this->menu[0]['foodname']; ?>">
            </td>
            <td>
                <input type="text" name="foodsize" class="w50" value="<?php echo $this->menu[0]['foodsize']; ?>">
            </td>
            <td>
                <select name="foodmeasure">
                    <?php
                        foreach ($this->foodMeasuerList as $value){
                            if($this->menu[0]['foodmeasure'] == $value) echo '<option value="'. $value .'" selected >'. $value .'</option>';
                            else echo '<option value="'. $value .'" >'. $value .'</option>';
                        }
                    ?>
                </select>
            </td>
            <td>
                <input type="number" name="foodprice" class="w100" value="<?php echo $this->menu[0]['foodprice']; ?>">
            </td>
        </tr>
    </table>
    
    <p class="ta-r"><input type="submit" value="Сохранить" /></p>
</form>
<?php else: ?>
<p>У вас нет прав для доступа к этой странице.</p>
<?php endif; ?>