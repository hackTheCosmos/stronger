<div class="create__exercise__page__wrapper">
    <div class="header">
        <h1>Déterminé à réussir ?</h1>
        <p>Créez les exercices qui répondent à vos objectifs !</p>
    </div>
    <form action="" method = "POST">
        <div class="double__input__wrapper">
            <div class="input__wrapper">
                <input type="text" name="name" id="name" placeholder="nom de l'exercice">
            </div>
            <div class="input__wrapper">
                <input type="text" name="weight" id="weight" placeholder="charge de travail (Kg)">
            </div>
        </div>
        <div class="double__input__wrapper">
            <div class="input__wrapper">
                <input type="text" name="reps" id="reps" placeholder="nombre de répétitions">
            </div>
            <div class="input__wrapper">
                <input type="text" name="series" id="series" placeholder="nombre de séries">
            </div>
        </div>
        <div class ="success__info__bulle"></div>
        <div class ="error__info__bulle"></div>
        <button type="submit" name ="add__exercise">
            <i class='fa-solid fa-check'></i> 
            créer
        </button>
    </form>

    <div class="exercises__link__wrapper">
        <a href="index.php?page=exercises">
            voir mes exercices
        </a>
    </div>
</div>

<script src = "Public/script/createExercise.js"></script>