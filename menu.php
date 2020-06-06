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

        if (isset($_POST['napitok1_amount'])) {
            $_SESSION['napitok1'] = "КОЛА";
            $_SESSION['napitok1_amount'] = $_POST['napitok1_amount'];
            $_SESSION['napitok1_src'] = "dist/img/napitok1.png";
        }
        if (isset($_POST['napitok2_amount'])) {
            $_SESSION['napitok2'] = "ФАНТА";
            $_SESSION['napitok2_amount'] = $_POST['napitok2_amount'];
            $_SESSION['napitok2_src'] = "dist/img/napitok2.png";
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
    <section class="possitions ">
        <h2><span class="h2-span-bordered">Салаты</span></h2>
        <div class="wrapper possitions-block">
            <div class="possition-block__positions">
            <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/zakuska1.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">ЦЕЗЫРЬ С КУРИЦЕЙ</div>
                        <div class="position__text"></div>
                        <div class="position__price"><span class="position__price-text">12 руб</span></div>
                        <form action="" method="POST">
                            <div class="position__buttons-block">
                                <div class="position__amount-wrapper">
                                    <div class="position__amount">
                                        <span class="minus">-</span>
                                        <input class="input_amount" type="number" name="zakuska1_amount" value="1" min="1" max="50">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <button class="position__buy-btn button button_korzina">
                                    <div type="submit">КУПИТЬ</div>
                                    <div class="korzina-icon" name="combo"><img src="dist/img/korzina.png" alt=""></div>
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/zakuska2.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">РУКОЛЛА С КРЕВЕТКАМИ</div>
                        <div class="position__text">Из листьев пекинской капусты с ананасом, свежим огурцом, гранатом и подкопченным айоли</div>
                        <div class="position__price"><span class="position__price-text">18 руб</span></div>
                        <form action="" method="POST">
                            <div class="position__buttons-block">
                                <div class="position__amount-wrapper">
                                    <div class="position__amount">
                                        <span class="minus">-</span>
                                        <input class="input_amount" type="number" name="zakuska2_amount" value="1" min="1" max="50">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <button class="position__buy-btn button button_korzina">
                                    <div type="submit">КУПИТЬ</div>
                                    <div class="korzina-icon"><img src="dist/img/korzina.png" alt=""></div>
                                    <input type="text" name="zakuska3" style="display: none;" name="zakuska2">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/zakuska3.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">НИСУАЗ</div>
                        <div class="position__text">Хрустящий лист салата, чесночные гренки, стручковая фасоль, яйцо и обжаренное в кунжуте филе тунца, заправляется соусом Цезарь</div>
                        <div class="position__price"><span class="position__price-text">15 руб</span></div>
                        <form action="" method="POST">
                            <div class="position__buttons-block">
                                <div class="position__amount-wrapper">
                                    <div class="position__amount">
                                        <span class="minus">-</span>
                                        <input class="input_amount" type="number" name="zakuska3_amount" value="1" min="1" max="50">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <button class="position__buy-btn button button_korzina">
                                    <div type="submit">КУПИТЬ</div>
                                    <div class="korzina-icon"><img src="dist/img/korzina.png" alt=""></div>
                                    <input type="text" name="zakuska3" style="display: none;" name="soup1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        
    </section>

    <section class="menu-positions possitions">
        <h2><span class="h2-span-bordered">Первые блюда</span></h2>
        <div class="wrapper possitions-block">
            <div class="possition-block__positions">
            <div class="possitions__position">
                    <div class="position__img-block position__img-block-bgc"><img src="dist/img/soup1.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">КРЕМ-СУП</div>
                        <div class="position__text">Подается с сухариками</div>
                        <div class="position__price"><span class="position__price-text">15 руб</span></div>
                        <form action="" method="POST">
                            <div class="position__buttons-block">
                                <div class="position__amount-wrapper">
                                    <div class="position__amount">
                                        <span class="minus">-</span>
                                        <input class="input_amount" type="number" name="soup1_amount" value="1" min="1" max="50">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <button class="position__buy-btn button button_korzina">
                                    <div type="submit">КУПИТЬ</div>
                                    <div class="korzina-icon" name="combo"><img src="dist/img/korzina.png" alt=""></div>
                                    <input type="text" style="display: none;" name="soup1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block position__img-block-bgc"><img src="dist/img/soup2.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">УХА ИЗ ЛОСОСЯ</div>
                        <div class="position__text">Подается с домашней булочкой</div>
                        <div class="position__price"><span class="position__price-text">15 руб</span></div>
                        <form action="" method="POST">
                            <div class="position__buttons-block">
                                <div class="position__amount-wrapper">
                                    <div class="position__amount">
                                        <span class="minus">-</span>
                                        <input class="input_amount" type="number" name="soup2_amount" value="1" min="1" max="50">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <button class="position__buy-btn button button_korzina">
                                    <div type="submit">КУПИТЬ</div>
                                    <div class="korzina-icon" name="zakuska2"><img src="dist/img/korzina.png" alt=""></div>
                                    <input type="text" style="display: none;" name="soup1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block position__img-block-bgc"><img src="dist/img/soup3.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">БОРЩ УКРАИНСКИЙ</div>
                        <div class="position__text">Подается со сметаной, ржаной булочкой и домашним салом</div>
                        <div class="position__price"><span class="position__price-text">15 руб</span></div>
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
                                    <div class="korzina-icon" name="zakuska3"><img src="dist/img/korzina.png" alt=""></div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block position__img-block-bgc"><img src="dist/img/soup4.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">СОЛЯНКА</div>
                        <div class="position__text">Сборная мясная, подается с домашней булочкой</div>
                        <div class="position__price"><span class="position__price-text">15 руб</span></div>
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
                                    <div class="korzina-icon" name="zakuska2"><img src="dist/img/korzina.png" alt=""></div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        
    </section>

    <section class="menu-positions possitions">
        <h2><span class="h2-span-bordered">Горячие блюда</span></h2>
        <div class="wrapper possitions-block">
            <div class="possition-block__positions">
                <div class="possitions__position">
                    <div class="position__img-block position__img-block-bgc"><img src="dist/img/vtoroe1.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">ТИГРОВЫЕ КРЕВЕТКИ В БЕКОНЕ</div>
                        <div class="position__text">На гриле с картофельными крокетами, обжаренными цукини, лимоном и подкопченым пикантным соусом</div>
                        <div class="position__price"><span class="position__price-text">25 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block position__img-block-bgc"><img src="dist/img/vtoroe2.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">НИЗКОТЕМПЕРАТУРНЫЙ ЛОСОСЬ</div>
                        <div class="position__text">Запеченный под карамелью мисо и мартини со сливочной брокколи и соусом Блю Чиз</div>
                        <div class="position__price"><span class="position__price-text">25 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block position__img-block-bgc"><img src="dist/img/vtoroe3.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">ТЕЛЯТИНА ПО-ДОМАШНЕМУ</div>
                        <div class="position__text">Телячья вырезка, курага, картофель, детская морковь, перец сладкий, лук</div>
                        <div class="position__price"><span class="position__price-text">25 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block position__img-block-bgc"><img src="dist/img/vtoroe4.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">АТЛАНТИЧЕСКИЙ СИБАС</div>
                        <div class="position__text">С подкопченным овощным жульеном из мексиканских овощей со специями и лимоном , подаётся с картофелем гриль</div>
                        <div class="position__price"><span class="position__price-text">25 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        
    </section>

    <section class="menu-positions possitions">
        <h2><span class="h2-span-bordered">Десерты</span></h2>
        <div class="wrapper possitions-block">
            <div class="possition-block__positions">
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/desert1.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">ПАХЛАВА</div>
                        <div class="position__text">Домашняя с грецким орехом и ароматными пряностями</div>
                        <div class="position__price"><span class="position__price-text">10 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/desert2.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">ШОКОЛАДНЫЙ ФОНДАН</div>
                        <div class="position__text">Подается с мороженым</div>
                        <div class="position__price"><span class="position__price-text">10 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/desert3.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">БЛИНЧИКИ</div>
                        <div class="position__text">На ваш выбор: сметана, мед, джем</div>
                        <div class="position__price"><span class="position__price-text">25 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/desert4.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">БЛИНЧИКИ "КРЕП-СЮЗЕТ"</div>
                        <div class="position__text">Блинчики, обжаренные в апельсиновой карамели, подаются с мороженым</div>
                        <div class="position__price"><span class="position__price-text">25 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        
    </section>

    <section class="menu-positions possitions">
        <h2><span class="h2-span-bordered">Напитки</span></h2>
        <div class="wrapper possitions-block">
            <div class="possition-block__positions">
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/napitok1.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">КОЛА</div>
                        <div class="position__text position__text-napitok">0.5 л.</div>
                        <div class="position__price"><span class="position__price-text">10 руб</span></div>
                        <form action="" method="POST">
                            <div class="position__buttons-block">
                                <div class="position__amount-wrapper">
                                    <div class="position__amount">
                                        <span class="minus">-</span>
                                        <input class="input_amount" type="number" name="napitok1_amount" value="1" min="1" max="50">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <button class="position__buy-btn button button_korzina">
                                    <div type="submit">КУПИТЬ</div>
                                    <div class="korzina-icon" name="combo"><img src="dist/img/korzina.png" alt=""></div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/napitok2.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">ФАНТА</div>
                        <div class="position__text position__text-napitok">0.5 л.</div>
                        <div class="position__price"><span class="position__price-text">3 руб</span></div>
                        <form action="" method="POST">
                            <div class="position__buttons-block">
                                <div class="position__amount-wrapper">
                                    <div class="position__amount">
                                        <span class="minus">-</span>
                                        <input class="input_amount" type="number" name="napitok2_amount" value="1" min="1" max="50">
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <button class="position__buy-btn button button_korzina">
                                    <div type="submit">КУПИТЬ</div>
                                    <div class="korzina-icon" name="combo"><img src="dist/img/korzina.png" alt=""></div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/napitok3.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">СПРАЙТ</div>
                        <div class="position__text position__text-napitok">0.5 л.</div>
                        <div class="position__price"><span class="position__price-text">3 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/napitok4.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">ЛИМОНАД</div>
                        <div class="position__text position__text-napitok">0.5 л.</div>
                        <div class="position__price"><span class="position__price-text">3 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/napitok5.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">МОРС</div>
                        <div class="position__text position__text-napitok">0.5 л.</div>
                        <div class="position__price"><span class="position__price-text">3 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="possitions__position">
                    <div class="position__img-block"><img src="dist/img/napitok6.png" alt="" class="position__img"></div>   
                    <div class="position__description">
                        <div class="position__title">БОРЖОМИ</div>
                        <div class="position__text position__text-napitok">0.5 л.</div>
                        <div class="position__price"><span class="position__price-text">3 руб</span></div>
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
                                    <input type="text" style="display: none;" name="zakuska1">
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