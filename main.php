<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <link rel="stylesheet" href="dist/style.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
    <title>Buisness Lunch</title>
</head>
<body>  
    <?php 
        session_start();

        if (isset($_POST['set_polezni_amount'])) {
            $_SESSION['set_polezni'] = $_POST['set_polezni'];
            $_SESSION['set_polezni_amount'] = $_POST['set_polezni_amount'];
            $_SESSION['combo1'] = "dist/img/1combo.png";
        }

        if (isset($_POST['set_classic_amount'])) {
            $_SESSION['set_classic'] = $_POST['set_classic'];
            $_SESSION['set_classic_amount'] = $_POST['set_classic_amount'];
            $_SESSION['combo2'] = "dist/img/2combo.png";
        }

        if (isset($_POST['set_max1_amount'])) {
            $_SESSION['set_max1'] = $_POST['set_max1'];
            $_SESSION['set_max1_amount'] = $_POST['set_max1_amount'];
            $_SESSION['combo3'] = "dist/img/3combo.png";
        }

        if (isset($_POST['set_max2_amount'])) {
            $_SESSION['set_max2'] = $_POST['set_max2'];
            $_SESSION['set_max2_amount'] = $_POST['set_max2_amount'];
            $_SESSION['combo4'] = "dist/img/4combo.png";
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
    <section class="banner">
        <div class="wrapper banner__image">
            <img src="dist/img/banner.jpg" alt="">
        </div>
    </section>
    <section class="possitions">
        <h2><span class="h2-span-bordered">Популярные сеты</span></h2>
        <div class="wrapper possitions-block">
            <div class="possition-block__positions">
            <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/1combo.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">СЕТ "ПОЛЕЗНЫЙ"</div>
                        <div class="position__text">Хлеб, салат "Сельдь под шубой", бульйон куриный с лапшой</div>
                        <div class="position__price"><span class="position__price-text">20 руб</span></div>
                        <form action="" method="POST">
                            <div class="position__buttons-block">
                                <div class="position__amount-wrapper">
                                    <div class="position__amount">
                                        <span class="minus">-</span>
                                        <input class="input_amount" type="number" name="set_polezni_amount" value="1" min="1" max="50">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <button class="position__buy-btn button button_korzina" name="set_polezni">
                                    <div type="submit">КУПИТЬ</div>
                                    <div class="korzina-icon" name="combo"><img src="dist/img/korzina.png" alt=""></div>
                                    <input type="text" style="display: none;" name="combo1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/2combo.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">СЕТ "КЛАССИЧЕСКИЙ"</div>
                        <div class="position__text">Хлеб, салат "Винегрет", куриная котлета, плов овощной</div>
                        <div class="position__price"><span class="position__price-text">20 руб</span></div>
                        <form action="" method="POST">
                            <div class="position__buttons-block">
                                <div class="position__amount-wrapper">
                                    <div class="position__amount">
                                        <span class="minus">-</span>
                                        <input class="input_amount" type="number" name="set_classic_amount" value="1" min="1" max="50">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <button class="position__buy-btn button button_korzina" name="set_classic">
                                    <div type="submit">КУПИТЬ</div>
                                    <div class="korzina-icon" name="combo2"><img src="dist/img/korzina.png" alt=""></div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/3combo.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">СЕТ "МАКСИМАЛЬНЫЙ"</div>
                        <div class="position__text">Хлеб, салат "Сельдь под шубой", шницель, картофель жареный, куриный бульон с лапшой</div>
                        <div class="position__price"><span class="position__price-text">30 руб</span></div>
                        <form action="" method="POST">
                            <div class="position__buttons-block">
                                <div class="position__amount-wrapper">
                                    <div class="position__amount">
                                        <span class="minus">-</span>
                                        <input class="input_amount" type="number" name="set_max1_amount" value="1" min="1" max="50">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <button class="position__buy-btn button button_korzina" name="set_max1">
                                    <div type="submit">КУПИТЬ</div>
                                    <div class="korzina-icon" name="combo3"><img src="dist/img/korzina.png" alt=""></div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/4combo.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">СЕТ "МАКСИМАЛЬНЫЙ"</div>
                        <div class="position__text">Хлеб, салат "Витаминный", мясная колета, гречневая каша, борщ</div>
                        <div class="position__price"><span class="position__price-text">30 руб</span></div>
                        <form action="" method="POST">
                            <div class="position__buttons-block">
                                <div class="position__amount-wrapper">
                                    <div class="position__amount">
                                        <span class="minus">-</span>
                                        <input class="input_amount" type="number" name="set_max2_amount" value="1" min="1" max="50">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <button class="position__buy-btn button button_korzina" name="set_max2">
                                    <div type="submit">КУПИТЬ</div>
                                    <div class="korzina-icon" name="combo4"><img src="dist/img/korzina.png" alt=""></div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="menuend"><img src="dist/img/menuend.png" alt=""></div>
        </div> 
        
    </section>
    <footer class="footer">
        <div class="wrapper">© Copyright 2020</div>
    </footer>
    <script src="buttons.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>