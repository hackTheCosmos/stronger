<div class="add__planning__page__wrapper">
  
    <div class="header__wrapper">
        <h1>Ajoutez vos exercices préférés à votre planning !</h1>
    </div>
    <div class="search__wrapper" id="anchor">
        <i class="fa-solid fa-magnifying-glass search__icon"></i>
        <input type="text" id="search" placeholder="rechercher un exercice">
        <i class="fa-solid fa-arrows-rotate refresh__button"></i>
        <i class="fa-solid fa-xmark exit__icon"></i>
    </div>
    <div class="add__planning__exercises__wrapper" >

        

    <?php foreach($data['exercises'] as $exercise):
        $exist = $data['planningsModel']->checkIfExercise($data['day'], $exercise->id, $_SESSION['id']);
            if($exist) {
                $checkIcon = "<i class='fa-solid fa-check'></i>";
                
            } else {
                $checkIcon = "";
            }?>
            <div class="exercise__wrapper">
            <?= $checkIcon ?>
                <h2><?=$exercise->name ?></h2>
                <button class ="add__exercise__button" data-name ="<?=$exercise->name?>"id="<?=$exercise->id?>">
                    ajouter à mon planning
                </button>
        </div>
        <?php endforeach; ?>

    </div>
        <div class="pagination">

            <?php if($data['currentPage'] > 1):?>
                    <a href="index.php?page=addPlanning&pagination=<?=$data['currentPage'] -1 ?>&day=<?=$data['day']?>#anchor"><i class="fa-solid fa-angle-left"></i></a>
                <?php endif;
                if($data['nbOfPages'] > 1):
                    for($i=1; $i<= $data['nbOfPages']; $i++):
                
                    if($data['currentPage']!= $i): ?>
                        <a href="index.php?page=addPlanning&pagination=<?=$i?>&day=<?=$data['day']?>#anchor"><?= $i ?></a>
                    <?php else : ?>
                            <a class = "active" href="index.php?page=addPlanning&pagination=<?=$i?>&day=<?=$data['day']?>#anchor"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor;
                endif;
                if($data['currentPage'] < $data['nbOfPages']):?>
                    <a href="index.php?page=addPlanning&pagination=<?=$data['currentPage'] + 1 ?>&day=<?=$data['day']?>#anchor"><i class="fa-solid fa-angle-right"></i></a>
                <?php endif; ?>
        </div>

    
</div>

<script src ="Public/script/addPlanning.js"></script>