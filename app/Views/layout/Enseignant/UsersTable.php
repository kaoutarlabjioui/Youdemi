<?php
include "../app/Views/layout/stats.php";

?>
<div class="table-container">
            <div class="table-header">
                <h2 class="table-title">utilisateurs inscrits</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Cours</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                // var_dump($users);
                foreach ($users as $userModel): ?>
                    <tr>
                        <td><?= $userModel->getNom() ?></td>
                        <td><?= $userModel->getPrenom()?></td>
                        <td><?= $userModel->getEmail()?></td>
                        <td><?= $userModel->titre ?></td>
                        
                       
                    </tr>




                    





                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php
        include "../app/Views/Layout/footer.php";
        ?>