<?php

if (isset($_POST['btn'])) { //проверка существования отправленных данных по кнопке
    switch ($_POST['btn']) {
        case 'Send2': // по кнопке Send2
            if($_POST['name'] && $_POST['surname'] && $_POST['age'] && $_POST['salary']) {
                $user = ['name' => $_POST['name'], 'surname' => $_POST['surname'], 'age' => $_POST['age'], 'salary' => $_POST['salary']];
                $_SESSION['user'] = $user;
                exit("<meta http-equiv='refresh' content='0; url=2c_dop.php'>"); //редирект на lab2с_dop.php
            }
    }
}
?>
<form action="" method="get">
    <input type="text" name="name" placeholder="Введите имя">
    <input type="text" name="age" placeholder="Введите возраст">
    <input type="text" name="salary" placeholder="Введите зарплату">
    <input type="text" name="zodiac" placeholder="Знак зодиака">
    <input type="submit">
</form>




