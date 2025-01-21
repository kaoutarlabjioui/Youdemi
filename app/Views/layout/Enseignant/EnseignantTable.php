<div class="table-container">
            <div class="table-header">
                <h2 class="table-title">utilisateurs inscrits</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Status</th>
                        <th>action</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                // var_dump($users);
                foreach ($users as $userModel): ?>
                    <tr>
                        <td><?= $userModel->getNom() ?></td>
                        <td><?= $userModel->getPrenom()?></td>
                        <td><?= $userModel->getStatus()?></td>
                        <td><a href="/user/activate/<?=$userModel->getId()?>" type="button" class="bg-blue-500 p-2 rounded text-white">Active</a></td>
                        
                       
                    </tr>




                    





                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php
        include "../app/Views/Layout/footer.php";
        ?>