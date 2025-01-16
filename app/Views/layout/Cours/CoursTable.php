<div class="table-container">
            <div class="table-header">
                <h2 class="table-title">Derniers utilisateurs inscrits</h2>
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
                // var_dump($users);
                foreach ($cours as $cour): ?>
                    <tr>
                        <td><?= $cour->titre ?></td>
                        <td><?= $cour->contenu?></td>
                        <td><?= $cour->description?></td>
                        <td><?= $cour->catName?></td>
                        <td><?= $cour->nom?></td>
                        <td><span class="status-badge status-active">Actif</span></td>
                        <td>
                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                            <button class="action-btn"><i class="fas fa-trash"></i></button>
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