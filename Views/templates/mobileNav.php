<div class="mobile__nav__wrapper">
<i class="fa-solid fa-xmark close"></i>
    <ul>
        <?php if(isset($_SESSION['id'])): ?>
        <li>
            <a href="index.php?page=planning">
                <i class="fa-solid fa-calendar-days"></i>
                mon planning
            </a>
        </li>
        <li>
            <a href="index.php?page=createExercise">
                <i class="fa-regular fa-square-plus"></i>
                créer un exercice
            </a>
        </li>
        <li>
            <a href="index.php?page=exercises">
                <img src="Public/medias/images/exercises.png" alt="exercises">
                mes exercices
            </a>
        </li>
        <li>
            <a href="index.php?page=accompt">
                <img src="Public/medias/images/user.jpg" alt="user">
                mon compte
            </a>
        </li>
        <li>
            <a href="index.php?page=logout">
                <i class="fa-solid fa-power-off"></i>
                me déconnecter
            </a>
        </li>
        <?php else: ?>
        <li>
            <a href="index.php?page=login">
                <img src="Public/medias/images/user.jpg" alt="user">
                me connecter
            </a>
        </li>
        <li>
            <a href="index.php?page=signin">
                <i class="fa-solid fa-plus"></i>
                <img src="Public/medias/images/user.jpg" alt="user">
                créer un compte
            </a>
        </li>
        <?php endif; ?>
    </ul>
</div>