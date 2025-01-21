

<?php
if ($_SESSION['role']->getId()==2) {
    include 'CoursModal.php';
}
   ?>

<div class="table-container">
            <div class="table-header">
                <h2 class="table-title">Les cours</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>titre</th>
                        <th>description</th>
                        <th>Contenu</th>
                        <th>categorie</th>
                        <th>Enseignant</th>
                        <th>tags</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($cours as $cour): 
                ?>
                    <tr>
                        <td><?= $cour->getTitre() ?></td>
                        <td><?= $cour->getDescription()?></td>
                        <td><?= $cour->getContenu()?></td>
                        <td><?= $cour->catName?></td>
                        <td><?= $cour->nom?></td>
                        <?php if (!empty($cour->getTags())): ?>
                        <?php   foreach ($cour->getTags() as $tag): ?>
                        <td><?= $tag->getName()?></td>
                        <?php endforeach; ?>
                         <?php else: ?>
                            <td>Aucun tag</td>
                        <?php endif;
                        if($_SESSION['role']->getId()==3 ){
                            if($test[2] !='cours'){?>
                          <td>  <a type="button" href="/cours/apply/<?=$cour->getId()?>" class="p-3 bg-blue-500 text-white rounded rounded-md "> apply</a></td>
                        <?php }else{
                            ?>
                          <td>  <a type="button" href="#"<?=$cour->getId()?>" class="p-3 bg-red-500 text-white rounded rounded-md "> quitter</a></td>
                            
                            <?php
                        }}else{?>
                        
                        <td>
                            <a href="/Cours/update/<?=$cour->getId()?>"    class="action-btn"><i class="fas fa-edit"></i></a>
                            <a href="/Cours/delete/<?=$cour->getId()?>"  type class="action-btn"><i class="fas fa-trash"></i></a> 
                        </td> 
                    </tr>
                    <?php }
                 endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
        include "../app/Views/Layout/footer.php";
        ?>