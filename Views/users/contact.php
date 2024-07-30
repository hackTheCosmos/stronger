<div class="contact__page__wrapper">
    <div class="header">
        <h1>Contact</h1>
        <p>Vous avez des questions, ou des remarques ? Remplissez ce formulaire, vous recevrez une réponse rapidement</p>
    </div>

    <form method ="POST" novalidate>
        <div class="double__input__wrapper">
            <div class="input__wrapper">
                <label for="emai">Votre email</label>
                <input type="email" name="email" id="email" value = <?= $data['email']; ?>>

                <?php if(isset($_SESSION['email__error'])) : ?>
  
                <div class="error__info__bulle active">
                    <?= $_SESSION['email__error'] ?>
                    <?php unset($_SESSION['email__error']); ?>
                </div>

                <?php endif; ?>
            </div>
            <div class="input__wrapper">
                <label for="message">Votre message (1000 caractères max)</label>
                <textarea name="message" id="message" maxlength="1000"><?= $data['message'];?></textarea>
  
                <?php if(isset($_SESSION['message__error'])) : ?>
  
                <div class="error__info__bulle active">
                    <?= $_SESSION['message__error'] ?>
                    <?php unset($_SESSION['message__error']); ?>
                </div>

                <?php endif; ?>
            </div>
        </div>
        <button type="submit" name="contact">envoyer</button>
    </form>
</div>