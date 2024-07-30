<div class="exercises__page__wrapper">
    <h1>Mes exercices</h1>
    <p>Ici vous pouvez modifier ou supprimer vos exercices</p>
  
    <div class="search__wrapper" id="anchor">
    <i class="fa-solid fa-magnifying-glass search__icon"></i>
        <input type="text" id="search" placeholder="rechercher un exercice">
        <i class="fa-solid fa-arrows-rotate refresh__button"></i>
        <i class="fa-solid fa-xmark exit__icon"></i>
    </div>

    <div class="exercises__list__wrapper">
     
        <?php foreach($data['exercises'] as $exercise):?>
            <div class="exercise__wrapper">
                <a class = "trash__link" href="index.php?action=delete&id=<?= $exercise->id?>">
                    <i class="fa-solid fa-trash-can trash__button"></i>
                </a>
                <a class = "update__link" href="index.php?action=update&id=<?= $exercise->id?>">
                    <i class="fa-solid fa-pencil update__button"></i>
                </a>
                <h2><?= $exercise->name ?></h2>
                <p>Charge : <?= $exercise->weight ?> Kg</p>
                <p>Nombre de répétitions : <?= $exercise->reps ?></p>
                <p>Nombre de séries : <?= $exercise->series ?></p>
            </div>
        <?php endforeach;?>
    </div>
    <div class="pagination">

        <?php if($data['currentPage'] > 1):?>
                <a href="index.php?page=exercises&pagination=<?=$data['currentPage'] -1 ?>#anchor"><i class="fa-solid fa-angle-left"></i></a>
            <?php endif;
            if($data['nbOfPages'] > 1):
                for($i=1; $i<= $data['nbOfPages']; $i++):
            
                if($data['currentPage']!= $i): ?>
                    <a href="index.php?page=exercises&pagination=<?=$i?>#anchor"><?= $i ?></a>
                <?php else : ?>
                        <a class = "active" href="index.php?page=exercises&pagination=<?=$i?>#anchor"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor;
            endif;
            if($data['currentPage'] < $data['nbOfPages']):?>
                <a href="index.php?page=exercises&pagination=<?=$data['currentPage'] + 1 ?>#anchor"><i class="fa-solid fa-angle-right"></i></a>
            <?php endif; ?>
    
    </div>
    
   
</div>

<script src ="Public/script/exercises.js"></script>