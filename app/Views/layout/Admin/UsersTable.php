<div class="table-container">
            <div class="table-header">
                <h2 class="table-title">Derniers utilisateurs inscrits</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // var_dump($users);
                foreach ($users as $userModel): ?>
                    <tr>
                        <td><?= $userModel->nom ?></td>
                        <td><?= $userModel->prenom?></td>
                        <td><?= $userModel->email?></td>
                        <td><?= $userModel->role_name?></td>
                        <td><span class="status-badge status-active">Actif</span></td>
                        <td>
                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                            <form  methode = 'Post' action ='./User/delete'>
                            <button class="action-btn" <?= $userModel->id ?>><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- <tr>
                        <td>Marie Martin</td>
                        <td>marie.martin@email.com</td>
                        <td>14 Jan 2024</td>
                        <td><span class="status-badge status-pending">En attente</span></td>
                        <td>
                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>

        <?php
        include "../app/Views/Layout/footer.php";
        ?>