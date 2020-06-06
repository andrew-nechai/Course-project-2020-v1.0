<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dist/style.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>  
    <?php 
        session_start();

        ini_set('date.timezone', 'Europe/Minsk');

        if (isset($_POST['logout'])) {
            session_destroy();
            setcookie('last-visit', date("d-m-y H:i:s"));
            header("Location: http://localhost:8080/lab%208/index.php?");
        }

        $server = "localhost";
        $user1 = "root";
        $password1 = "opo0";
        $link = mysqli_connect($server, $user1, $password1, "lunch");
        $login = $_SESSION['login'];

        $query = "SELECT*FROM users WHERE login='$login'";
        $result = mysqli_query($link, $query);  
        $user = mysqli_fetch_assoc($result); 
        $feedback = "";

        if(isset($_POST['name'])) {
            $name = $_POST['name'];
            $query = "UPDATE users  SET name = '$name' WHERE login = '$login'";
            mysqli_query($link, $query);  
        }

        if(isset($_POST['surname'])) {
            $surname = $_POST['surname'];
            $query = "UPDATE users  SET surname = '$surname' WHERE login = '$login'";
            mysqli_query($link, $query);  
        }

        if(isset($_POST['login'])) {
            $login = $_POST['login'];
            $query = "SELECT * FROM users WHERE login = '$login'";
            $result = mysqli_query($link, $query);
            $is_login_free = mysqli_fetch_array($result);
            if (empty($is_login_free)){
                $old_login = $_SESSION['login'];

                $query = "SELECT * FROM users WHERE login = '$old_login'";
                $delete_query = "DELETE FROM users WHERE login = '$old_login'";

                $resultquery = mysqli_query($link, $query); 
                $user = mysqli_fetch_array($resultquery);
                mysqli_query($link, $delete_query); 

                $login = $_POST['login'];
                $password = $user['password'];
                $name = $user['name'];
                $surname = $user['surname'];
                $salt = $user['salt'];

                $new_query = "INSERT INTO users  SET login = '$login', password = '$password', name = '$name', surname = '$surname', salt = '$salt'";
                $_SESSION['login'] = $login;

                mysqli_query($link, $new_query);  
            }
            else {
                $feedback = "Логин уже занят!";
            }

            
        }
        
        if (isset($_POST['new-password1'])) {
            if ($_POST['new-password1'] == $_POST['new-password2']) {
                $password = md5(md5($_POST['new-password1'] . $user['salt']));
                $query = "UPDATE users  SET password = '$password' WHERE login = '$login'";
                mysqli_query($link, $query);   
            }
            else {
                $feedback = "Пароли не совпадают!";
            }
        }
    ?>
    <header class="header">
        <div class="wrapper header__wrapper">
            <a href="main.php" class="logo"><img src="dist/img/logo.png" alt="Productly LCC"></a>
            <h1 class="header__title">BUISSNES LUNCH</h1>
            <nav class="header__navigation">
                <ul class="navigation">
                    <li class="navigation__link"><a href="main.php">ГЛАВНАЯ</a></li>
                    <li class="navigation__link"><a href="menu.php">МЕНЮ</a></li>
                    <li class="navigation__link"><a href="">КОНТАКТЫ</a></li>  
                </ul>
            </nav>
            <div class="header__user-section">                
                <form action="user-info.php" class="user">
                    <button class="button button_user" type="submit"><?php echo $_SESSION['login']; ?></button>        
                </form>
                <form action="korzina.php" class="korzina">
                    <button class="button button_korzina" type="submit">Корзина</button>        
                </form>
            </div>  
        </div>
    </header>
    <section class="wrapper user-info">
        <div>
        <h2>Профиль</h2>
        <div class="user-info__form">
            <form action="" method="post">
                <div class="form-group d-flex">
                     <div class="flex-grow-1">
                        <label for="exampleInputEmail1">Имя</label><br>
                        <input type="text" class="form-control" name="name" maxlength="20" minlength="4"> 
                    </div>
                    <div class="d-flex align-items-end ml-4">
                        <button class="btn btn-secondary" type="submit">Изменить</button>
                    </div>
                </div>
            </form>
            <form action="" method="post">
                <div class="form-group d-flex">
                     <div class="flex-grow-1">
                        <label for="exampleInputEmail1">Фамилия</label><br>
                        <input type="text" class="form-control" name="surname" maxlength="20" minlength="4"> 
                    </div>
                    <div class="d-flex align-items-end ml-4">
                        <button class="btn btn-secondary" type="submit">Изменить</button>
                    </div>
                </div>
            </form>
            <form action="" method="post">
                <div class="form-group d-flex">
                     <div class="flex-grow-1">
                        <label for="exampleInputEmail1">Логин</label><br>
                        <input type="text" class="form-control" name="login" maxlength="12" minlength="4"> 
                    </div>
                    <div class="d-flex align-items-end ml-4">
                        <button class="btn btn-secondary" type="submit">Изменить</button>
                    </div>
                </div>
            </form>
            <form action="" method="post">
                <div class="form-group d-flex">
                     <div class="flex-grow-1">
                        <label for="exampleInputEmail1">Пароль</label><br>
                        <input type="password" class="form-control" name="new-password1" maxlength="10" minlength="6"> 
                        <small class="form-text text-muted">Новый пароль</small> 
                        <input type="password" class="form-control" name="new-password2" maxlength="10" minlength="6">
                        <small class="form-text text-muted">Подтвердите</small> 
                    </div>
                    <div class="d-flex align-items-center ml-4">
                        <button class="btn btn-secondary" type="submit">Изменить</button>
                    </div>
                </div>
            </form>
            <form action="" method="post">
                <button class="btn btn-danger" style="background-color: #CF4946;" name="logout">Выйти</button>
            </form>
            <?php echo "<h5 style=\"color: red\">{$feedback}</h5>";?>
        </div>
        <?php if (isset($_COOKIE['last-visit'])) echo "Последний раз вы заходили " . $_COOKIE['last-visit']?>
        </div>
        <?php  
            if ($_SESSION['auth'] == 1) {

                $NOWTIME_UNIX = time();

                function updateData($link, $login, $value, $ban) {

                    $query = "SELECT * FROM users WHERE login = '$login'";
                    $delete_query = "DELETE FROM users WHERE login = '$login'";

                    $NOWTIME_UNIX = time();

                    $result = mysqli_query($link, $query);
                    $user = mysqli_fetch_array($result);
                    mysqli_query($link, $delete_query); 

                    $password = $user['password'];
                    $name = $user['name'];
                    $surname = $user['surname'];
                    $salt = $user['salt'];
                    $admin = $user['admin'];

                    $newdate = date("Y-m-d H:i:s", $NOWTIME_UNIX  + $value);

                    $new_query = "INSERT INTO users  SET login = '$login', password = '$password', name = '$name', surname = '$surname', salt = '$salt', admin = '$admin', ban = '$ban', bantime = '$newdate'";

                    mysqli_query($link, $new_query);
                }

                if (isset($_POST['hour'])) {
                    $login = $_POST['hour'];
                    updateData($link, $login, 3600, 1);

                } elseif (isset($_POST['day'])) {
                    $login = $_POST['day'];
                    updateData($link, $login, 86400, 1);
                }
                elseif (isset($_POST['week'])) {
                    $login = $_POST['week'];
                    updateData($link, $login, 604800, 1);
                }

                if (isset($_POST['delete_user'])) {
                    $login = $_POST['delete_user'];
                    $query = "DELETE FROM users WHERE login = '$login'";
                    mysqli_query($link, $query);
                }

                if (isset($_POST['unban'])) {
                    $login = $_POST['unban'];
                    updateData($link, $login, 0, 0);
                }

                echo '<div class="users-block">';
                
                $query = "SELECT COUNT(*) FROM users";
                $res = mysqli_query($link, $query);
                $count = mysqli_fetch_array($res)[0];

                echo "<h5>Всего пользователей: " . $count[0] .  ";</h5>";

                $query = "SELECT COUNT(*) FROM users WHERE ban = 1";
                $res = mysqli_query($link, $query);
                $count = mysqli_fetch_array($res)[0];

                echo "<h5>Количество забаненых: " . $count[0] .  ";</h5>";

                $query = "SELECT COUNT(*) FROM users WHERE ban = 0";
                $res = mysqli_query($link, $query);
                $count = mysqli_fetch_array($res)[0];

                echo "<h5>Количество без бана: " . $count[0] .  ";</h5>";

                echo '<table class="users-block__table" border cellpadding="7px">
                        <tr>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Логин</th>
                            <th>Статус</th>
                            <th>Вермя бана</th>
                            <th>Управление</th>
                        </tr>';

                $query = "SELECT * FROM users"; 
                $result = mysqli_query($link, $query);  

                while ($user = mysqli_fetch_assoc($result)) {

                    $name = $user['name'];
                    $surname = $user['surname'];
                    $login = $user['login'];
                    $status = $user['admin'];
                    $ban = $user['ban'];
                    
                    $bantime = $user['bantime'];
                    $nowtime = date("Y-m-d H:i:s");

                    $bantime_unix = strtotime($bantime);

                    $result_ban_time = "";

                    if ($bantime_unix > $NOWTIME_UNIX) {
                        $result_ban_time = date("d-m-Y H:i", $bantime_unix);
                    } 
                    else {
                        $result_ban_time = "-";
                    }


                    if ($status == 0) {
                        $status = "Пользователь";
                    }
                    elseif ($status == 1) {
                        $status = "Админ";
                    }

                    echo '<div>
                            <tr>
                            <td>' . $name . '</td>
                            <td>' . $surname . '</td>
                            <td>' . $login . '</td>
                            <td>' . $status .'</td>
                            <td>' . $result_ban_time . '</td>
                            <td style="width: 200px;">
                            <div style="display: flex; justify-content: space-between">
                                <div class="dropdown user-ban">
                                    <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Забанить
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <form action="" method="post">
                                            <button class="dropdown-item" href="#" type="submit" name="hour" value="'. $login .'">На час</button>
                                        </form>
                                        <form action="" method="post">
                                            <button class="dropdown-item" href="#" type="submit" name="day" value="'. $login .'">На день</button>
                                        </form>
                                        <form action="" method="post">
                                            <button class="dropdown-item" href="#" type="submit" name="week" value="'. $login .'">На неделю</button>
                                        </form>
                                    </div>
                                </div>
                                <form action="" method="post">
                                    <button class="btn btn-primary" type="submit" name="unban" value="'. $login .'">Разбанить</button>
                                </form>
                            </div>
                            <div style="justify-content: center; display:flex;">
                                <form action="" method="post">
                                    <button class="btn btn-danger mt-1" type="submit" name="delete_user" value="'. $login .'">Удалить</button>
                                </form>
                            </div>
                            </td>
                        </tr>
                        </div>';
                }
                echo '</table>
                    </div>';
            }
        ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<!-- Осталось доделать поле ban в UpdateFunction и поля информации о пользователях -->