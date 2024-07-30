<div class="signin__wrapper">
    <h1>Inscription</h1>
    <form action="" method ="POST" id="signin" novalidate>
        <div class="double__input__wrapper">   
            <div class="input__wrapper">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </div>
        </div>
        <div class="double__input__wrapper">     
            <div class="input__wrapper">
                <label for="password1">Mot de passe</label>
                <div class="password__input__wrapper">
                    <input type="password" name="password1" id="password1">
                    <i class="fa-regular fa-eye"></i>
                </div>
            </div>
            <div class="input__wrapper">
                <label for="password">Confirmation du mot de passe</label>
                <div class="password__input__wrapper">
                    <input type="password" name="password2" id="password2">
                    <i class="fa-regular fa-eye"></i>
                </div>
            </div>
        </div>
        <div class ="success__info__bulle"></div>
        <div class ="error__info__bulle"></div>
        <button type="submit" name ="signin">créer mon compte</button>
    </form>
</div>

<script src ="Public/script/signin.js"></script>