<div class="new__password__page__wrapper">
    <h1>Obtenez un noveau mot de passe</h1>
    <p>Saisissez votre email et soumettez le formulaire, vous recevrez un nouveau mot de passe.</p>

    <form action="" method="POST" novalidate>
        <div class="double__input__wrapper">
            <div class="input__wrapper">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
        </div>
            <?php if(isset($_SESSION['new__password__error'])):
                        echo '<div class ="error__info__bulle active">'.$_SESSION["new__password__error"].'</div>'; 
                        unset ($_SESSION['new__password__error']);
            endif; ?>
        <button type="submit" name = "new_password">envoyer</button>
    </form>
</div>