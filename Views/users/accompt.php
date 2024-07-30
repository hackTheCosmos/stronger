<div class="accompt__page__wrapper">
    <h1>Mon compte</h1>

        <div class="update__wrapper">
            <div>
                <p>Email : <?= $_SESSION['email']?></p>
                <a id="update__email__button" href="#">modifier</a>
            </div>
            <form class ="update__email__form" action=""method="POST" novalidate>

                <input type="email" name="email" id="email" placeholder="saisissez votre nouvel email">
                <div class="success__info__bulle email__success"></div>
                <div class="error__info__bulle email__error"></div>
                <button type = "submit" name="update__email"><i class="fa-solid fa-check"></i></button>
            </form>
                
        </div>
        
        <div class="update__wrapper">
            <div>
                <p>Mot de passe : ************</p>
                <a id="update__password__button" href="#">modifier</a>
            </div>
            <form class ="update__password__form" method="POST" novalidate>
                <div class="double__input__wrapper">
                    <div class="input__wrapper">
                        <div class="password__input__wrapper">
                            <input type="password" name="password1" id="password1" placeholder ="Saisissez votre nouveeau mot de passe">
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="input__wrapper">
                        <div class="password__input__wrapper">
                            <input type="password" name="password2" id="password2" placeholder="Confirmez le mot de passe">
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="success__info__bulle pass__success"></div>
                <div class="error__info__bulle pass__error"></div>
                <button type = "submit" name="update__password"><i class="fa-solid fa-check"></i></button>
            </form>
        </div>

        <div class="delete__accompt__wrapper">
            <div>
                <a id="delete__accompt__button" href="#"><i class="fa-solid fa-xmark"></i> supprimer mon compte</a>
            </div>
        </div>


        
    
</div>

<script src="Public/script/updateEmail.js"></script>
<script src="Public/script/updatePassword.js"></script>
<script src="Public/script/deleteAccompt.js"></script>