<div class="login__wrapper">
    <h1>Connexion</h1>
    <form action="" method ="POST" id ="login" novalidate>
        <div class="double__input__wrapper">   
            <div class="input__wrapper">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="input__wrapper">
                <label for="password">Mot de passe</label>
                <div class="password__input__wrapper">
                    <input type="password" name="password" id="password">
                    <i class="fa-regular fa-eye"></i>
                </div>
            </div>
        </div>
        <div class ="error__info__bulle"></div>
        <button type="submit" name ="login">me connecter</button>
    </form>
</div>

<div class="forgoten__password__link__wrapper">
    <a href="index.php?page=newPassword">Mot de passe oublié</a>
</div>

<div class="signin__link__wrapper">
    <p>Vous n'avez pas encore de compte ?</p>
    <a href="index.php?page=signin">créer mon compte</a>
</div>

<script src = "Public/script/login.js"></script>