<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/style.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body> 
    <header class="header">
        <div class="wrapper header__wrapper">
            <a href="index.php" class="logo"><img src="dist/img/logo.png" alt="Productly LCC"></a>
            <h1 class="header__title">BUISSNES LUNCH</h1>
            <nav class="header__navigation">
                <ul class="navigation">
                    <li class="navigation__link"><a href="index.php">ГЛАВНАЯ</a></li>
                    <li class="navigation__link"><a href="">МЕНЮ</a></li>
                    <li class="navigation__link"><a href="">КОНТАКТЫ</a></li>  
                </ul>
            </nav>
            <div class="header__buttons">
                <form action="signin.php" class="sign-but">
                    <button class="button button_bordered" type="submit">Вход</button>
                </form>
                <form action="signup.php" class="sign-but">
                    <button class="button button_colored" type="submit">Регистрация</button>                    
                </form>
            </div>
        </div>
    </header>
    <section class="banner">
        <div class="wrapper banner__image">
            <img src="dist/img/banner.jpg" alt="">
        </div>
    </section>
</body>
</html>