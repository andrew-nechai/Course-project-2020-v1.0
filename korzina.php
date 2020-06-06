<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <link rel="stylesheet" href="dist/style.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
    <title>Корзина</title>
</head>
<body>  
    <?php 
        session_start();
        $rez_sum = 0;
        $name = $_SESSION['login'];
        $rezmail = "<html><body>
            <h3>Новый заказ от пользователя " . $name ."!</h3>";
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
    <section class="wrapper">
        <div class="korzina-block">
            <div>
                <h2>Корзина</h2>
                <br>
                <div class="korzina-wrapp">
                    <?php 
                        function echo_block($name, $count, $src, $index) {
                            echo '<div class="korzina-table">
                                    <div class="korzina-table__img"><img src="'. $src .'" alt=""></div>
                                    <div class="korzina-table__name">' . $name . '</div>
                                    <div class="korzina-table__count"><div>Количество</div>
                                        <div class="position__amount">
                                            <input class="input_amount" type="number" name="' . $index .'" value="' . $count . '" min="1" max="50">
                                        </div>
                                    </div>
                                    <form action="" method="POST">
                                        <button class="korzina-table__delete-but" type="submit" name="' . $index .'"><img src="dist/img/deleteimg.png"></button>   
                                    </form>                 
                                </div>';
                        }

                        if (isset($_POST['clear'])) {
                            unset($_SESSION['set_polezni']);
                            unset($_SESSION['set_classic']);
                            unset($_SESSION['set_max1']);
                            unset($_SESSION['set_max2']);
                            unset($_SESSION['napitok1']);
                            unset($_SESSION['napitok2']);
                        }

                        if (isset($_POST['set_polezni'])) {
                            unset($_SESSION['set_polezni']);
                        }

                        if (isset($_POST['napitok1'])){
                            unset($_SESSION['napitok1']);
                        }

                        if (isset($_POST['napitok2'])){
                            unset($_SESSION['napitok2']);
                        }

                        if (isset($_POST['set_classic'])) {
                            unset($_SESSION['set_classic']);
                        }

                        if (isset($_POST['set_max1'])) {
                            unset($_SESSION['set_max1']);
                        }

                        if (isset($_POST['set_max2'])) {
                            unset($_SESSION['set_max2']);
                        }

                        if (isset($_SESSION['set_polezni'])) {
                            $name = "CЕТ \"ПОЛЕЗНЫЙ\"";
                            $index = 'set_polezni';
                            $count = $_SESSION['set_polezni_amount'];
                            $src = $_SESSION['combo1'];
                            echo_block($name, $count, $src, $index);
                            $rez_sum += 20 * $count;
                            $rezmail = $rezmail . "<p>" . $name . "</p>";
                        }

                        if (isset($_SESSION['set_classic'])) {
                            $name = "СЕТ \"КЛАССИЧЕСКИЙ\"";
                            $index = 'set_classic';
                            $count = $_SESSION['set_classic_amount'];
                            $src = $_SESSION['combo2'];
                            echo_block($name, $count, $src, $index);
                            $rez_sum += 20 * $count;
                            $rezmail = $rezmail . "<p>" . $name . "</p>";
                        }

                        if (isset($_SESSION['set_max1'])) {
                            $name = "СЕТ \"МАКСИМАЛЬНЫЙ\"";
                            $index = 'set_max1';
                            $count = $_SESSION['set_max1_amount'];
                            $src = $_SESSION['combo3'];
                            echo_block($name, $count, $src, $index);
                            $rez_sum += 30 * $count;
                            $rezmail = $rezmail . "<p>" . $name . "</p>";
                        }

                        if (isset($_SESSION['set_max2'])) {
                            $name = "СЕТ \"МАКСИМАЛЬНЫЙ\"";
                            $index = 'set_max2';
                            $count = $_SESSION['set_max2_amount'];
                            $src = $_SESSION['combo4'];
                            echo_block($name, $count, $src, $index);
                            $rez_sum += 30 * $count;
                            $rezmail = $rezmail . "<p>" . $name . "</p>";
                        }

                        if (isset($_SESSION['napitok1'])) {
                            $name = "КОЛА";
                            $index = 'napitok1';
                            $count = $_SESSION['napitok1_amount'];
                            $src = $_SESSION['napitok1_src'];
                            echo_block($name, $count, $src, $index);
                            $rez_sum += 3 * $count;
                            $rezmail = $rezmail . "<p>" . $name . "</p>";
                        }

                        if (isset($_SESSION['napitok2'])) {
                            $name = "ФАНТА";
                            $index = 'napitok2';
                            $count = $_SESSION['napitok2_amount'];
                            $src = $_SESSION['napitok2_src'];
                            echo_block($name, $count, $src, $index);
                            $rez_sum += 3 * $count;
                            $rezmail = $rezmail . "<p>" . $name . "</p>";
                        }

                        if (isset($_POST["money"])) {
                            require_once('phpmailer/PHPMailerAutoload.php');
                            $mail = new PHPMailer;
                            $mail->CharSet = 'utf-8';

                            $name = $_SESSION['login'];

                            //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.mail.ru';                                                                                           // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'panodora@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
                            $mail->Password = 'lflflbrdkflbr13698642000'; // Ваш пароль от почты с которой будут отправляться письма
                            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

                            $mail->setFrom('panodora@mail.ru'); // от кого будет уходить письмо?
                            $mail->addAddress('panodora@mail.ru');     // Кому будет уходить письмо 
                            //$mail->addAddress('ellen@example.com');               // Name is optional
                            //$mail->addReplyTo('info@example.com', 'Information');
                            //$mail->addCC('cc@example.com');
                            //$mail->addBCC('bcc@example.com');
                            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                            $mail->isHTML(true);                                  // Set email format to HTML

                            $mail->Subject = 'Заказ';

                            $rezmail = $rezmail . "<h3>Итого: " . $rez_sum . "р. </h3></html></body>";

                            $mail->msgHTML($rezmail);

                            if(!$mail->send()) {
                                echo 'Error';
                            }
                        }
                    ?>
                </div>
                <div class="buttons-pay">   
                    <form action="" method="POST">
                        <button class="clear-but" type="submit" name="clear">Очистить все</button>
                    </form>
                    <div class="result-pay"><?php 
                        if ($rez_sum != 0) echo "Итого: " . $rez_sum . " р.";
                    ?></div>
                    <form action="" method="POST">
                        <button class="oplata btn btn-danger" type="submit" name="money">Подтвердить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="buttons.js"></script>
</body>
</html>