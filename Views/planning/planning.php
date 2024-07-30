<div class="planning__page__wrapper">
    <div class="header__wrapper">
        <h1>Mon planning</h1>
        <p>Ici vous pouvez gérer votre planning hebdomadaire</p>
    </div>
    <div class="days__list__wrapper">
        <?php if(isset($data['days'])):
            foreach($data['days'] as $day): ?>
        
            <div class="day__item__wrapper">
                <div class="header">
                    <h2><?= $day->name ?></h2>
                    <div class="add__link__wrapper">
                        <a href="index.php?page=addPlanning&day=<?= $day->id?>">
                            <i class="fa-regular fa-square-plus"></i>
                            ajouter un exercice
                        </a>
                    </div>
                </div>
        
                <div class="exercises__wrapper">
                    <?php
                    if(isset($data["exercises$day->id"])):  
                        foreach($data["exercises$day->id"] as $exercise): ?>
                        <div class="exercise__wrapper">
                            <h3><?= $exercise->exercise_name ?></h3>
                            <a class ="delete__link" href="index.php?action=delete&day=<?=$day->id?>&id=<?=$exercise->id?>">
                                <i class="fa-solid fa-trash-can trash__button"></i>
                            </a>
                        </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
            <?php endforeach; 
        endif; ?>
    </div>
</div>

<script src ="Public/script/deletePlanningExercise.js"></script>
   