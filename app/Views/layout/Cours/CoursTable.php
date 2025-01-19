

<?php include 'CoursModal.php'     ?>

<div class="table-container">
            <div class="table-header">
                <h2 class="table-title">Les cours</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>titre</th>
                        <th>Contenue</th>
                        <th>description</th>
                        <th>categorie</th>
                        <th>Ensegneient</th>
                        <th>tags</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($cours as $cour): 
                ?>
                    <tr>
                        <td><?= $cour->getTitre() ?></td>
                        <td><?= $cour->getContenu()?></td>
                        <td><?= $cour->getDescription()?></td>
                        <td><?= $cour->catName?></td>
                        <td><?= $cour->nom?></td>
                        <?php if (!empty($cour->getTags())): ?>
                        <?php   foreach ($cour->getTags() as $tag): ?>
                        <td><?= $tag->getName()?></td>
                        <?php endforeach; ?>
                         <?php else: ?>
                            <td>Aucun tag</td>
                        <?php endif; ?>
                        <td>
                            <a href="/Cours/update/<?=$cour->getId()?>"    class="action-btn"><i class="fas fa-edit"></i></a>
                            <a href="/Cours/delete/<?=$cour->getId()?>"  type class="action-btn"><i class="fas fa-trash"></i></a> 
                        </td> 
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
        include "../app/Views/Layout/footer.php";
        ?>