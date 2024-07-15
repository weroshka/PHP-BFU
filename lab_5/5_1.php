<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доска объявлений</title>
</head>
<body>

<form action="4.2.php" method="POST">
    <label for="email">email</label>
    <input type="email" name="email">
    <br>
    <label for="category">КАТЕГОРИИ</label>
    <select name="category" required>
        <?php
        require_once __DIR__ . '/connect-database.php';

        $categories = array("cars", "books", "apartments");
        foreach ($categories as $category)
        {
            echo "<option value=\"$category\">$category</option>";
        }
        ?>
    </select>
    <br>
    <label for="title">Заголовок объявления</label>
    <input type="text" name="title" required>
    <br>
    <label for="description">Текст объявления</label>
    <textarea name="description" id="" cols="30" rows="5" required></textarea><br>
    <input type="submit" value="Сохранить">
</form>

<table>
    <thead>
    <th>Категория</th>
    <th>Заголовок</th>
    <th>Описание</th>
    <th>Почтовый адрес</th>
    </thead>
    <?php
    //$connection = getDBConnection();
    $connection = new mysqli("localhost", "login", "password", "web");
    if(mysqli_connect_errno())
    {
        printf("ERROR! CONNECTION TO THE MYSQL IS NOT AVAILIBLE!!! ERROR CODE: %s\n", mysqli_connect_error());
        exit;
    }
    if($result = $connection->query('SELECT * FROM ad ORDER BY created DESC'))
    {
        while( $row = $result->fetch_assoc())
        {
            ?>
            <tr><td><?php echo $row['category'];?></td><td><?php echo $row['title'];?>
                </td><td><?php echo $row['description'];?></td><td><?php echo $row['email'];?></td></tr>
            <?php
        }
        $result->close();
    }

    $connection->close();
    ?>
</table>
</body>
</html>