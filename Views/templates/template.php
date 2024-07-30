<!doctype html>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title><?= $data ["pageTitle"] ?></title>

        <link rel="icon" type="image/png" href="Public/medias/images/logoStronger.png">
        
        <!--lien pour les icones-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
        
        <!--liens pour le fichier css-->
        <link rel="stylesheet" href="Public/style/style.css" type="text/css" >
        <!--script ajax/jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!--lien javascript global-->
        <script src="Public/script/main.js" defer></script>
        
    </head>
    <body>
        
        <?php require_once "smallHeader.php"; ?>
        <?php require_once "bigHeader.php"; ?>
        <?php require_once "mobileNav.php"; ?>
        
        <main>
        <?php if(!empty($_GET['page'])): ?>
                <a class ="previous__page__link" href="<?= $_SERVER['HTTP_REFERER'] ?>">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
            <?php endif; 

                if (isset($view)) {
                    require_once $view;
                }
            ?>
        </main>
        <?php require_once "footer.php"; ?>
    </body>
</html>