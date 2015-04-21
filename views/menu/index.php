<?php if (Session::get('role') == 'owner' || Session::get('role') == 'admin'): ?>
<h1>Меню</h1>

<form action="<?php echo URL; ?>menu/create" method="post">
    <table>
        <tr>
            <th>
                Категория
            </th>
            <th>
                Название
            </th>
            <th>Единица</th>
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
                            echo '<option value="'. $value .'">'. $value .'</option>';
                        }
                    ?>
                </select>
            </td>
            <td>
                <input type="text" name="foodname">
            </td>
            <td>
                <input type="text" name="foodsize" style="width: 50px;">
            </td>
            <td>
                <select name="foodmeasure">
                    <?php
                        foreach ($this->foodMeasuerList as $value){
                            echo '<option value="'. $value .'">'. $value .'</option>';
                        }
                    ?>
                </select>
            </td>
            <td>
                <input type="number" name="foodprice" style="width: 100px;">
            </td>
        </tr>
    </table>
    
    <p class="ta-r"><input type="submit" value="Добавить" /></p>
</form>

<hr />
<h2>Все меню</h2>
<form action="<?php echo URL; ?>menu/todaysMenu" method="post">
    <table class="food_menu">
        <tr>
            <th>Категория</th>
            <th></th>
            <th>Название</th>
            <th>Единица</th>
            <th></th>
            <th>Цена</th>
            <th></th>
            <th></th>
        </tr>
    <?php
        $foodcategory = '';
        foreach ($this->menuList as $key => $value){
            if($foodcategory == $value['foodcategory']){
                $one = 1;
            }else{
                $one = 0;
            }
            $foodcategory = $value['foodcategory'];
            
            echo '<tr>'
                    . '<td>';
                        if($one == 0) echo $value['foodcategory']
                    . '</td>';
            echo '<td><input type="checkbox" name="check_list[]" value="'. $value['foodid'] .'" id = "'. $value['foodid'] .'" /></td>';
            echo '<td><label for = "'. $value['foodid'] .'">'. $value['foodname'] . '</label></td>';
            echo '<td>'. $value['foodsize'] .'</td>';
            echo '<td>'. $value['foodmeasure'] .'</td>';
            echo '<td>'. $value['foodprice'] .' тг</td>';
            echo '<td class="ta-r"><a class="fz14" href="' . URL . 'menu/edit/' . $value['foodid'] .'">Редактировать</a></td>';
            echo '<td class="ta-r"><a class="fz14" class="delete" href="' . URL . 'menu/delete/' . $value['foodid'] .'">Удалить</a></td>';
            echo '</tr>';
        }
    ?>
    </table>
    <p class="ta-r mt30 mb30"><input type="submit" value="Сформировать меню на сегодня" /></p>
</form>
<hr />
<h2>Меню на сегодня</h2>

<table class="food_menu">
    <tr>
        <th>Время</th>
        <th>Категория</th>
        <th>Название</th>
        <th>Единица</th>
        <th></th>
        <th>Цена</th>
    </tr>
<?php
    foreach ($this->todaysMenuList as $key => $value){
        echo '<tr>';
        echo '<td>'. $value['date_added'] .'</td>';
        echo '<td>'. $value['foodcategory'] .'</td>';
        echo '<td>'. $value['foodname'] .'</td>';
        echo '<td>'. $value['foodsize'] .'</td>';
        echo '<td>'. $value['foodmeasure'] .'</td>';
        echo '<td>'. $value['foodprice'] .' тг</td>';
        echo '</tr>';
    }
    if(empty($this->todaysMenuList)){
        echo '<tr><td colspan="6" class="ta-c">Вы еще не сформировали меню на сегодня.</td></tr>';
    }
?>
</table>
<?php else: ?>
<p>У вас нет прав для доступа к этой странице.</p>
<?php endif; ?>