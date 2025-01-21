<?php
include "../app/Views/layout/stats.php";

?>
<?php include 'UserModal.php' ?>
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
                        <td><?= $userModel->getNom() ?></td>
                        <td><?= $userModel->getPrenom()?></td>
                        <td><?= $userModel->getEmail()?></td>
                        <td><?= $userModel->role_name?></td>
                        <td><span class="status-badge  <?= $userModel->getStatus() === 'active' ? 'status-active' : 'status-inactive' ?>"><?= $userModel->getStatus()?></span></td>
                        <td>
                             <a   type="button" onclick="openModal('tagModal_<?= $userModel->getId() ?>')"  class="action-btn"><i class="fas fa-edit"></i></a> 
                            <a href="/User/delete/<?= $userModel->getId() ?>" type="button" class="action-btn" ><i class="fas fa-trash"></i></a>

                        </td>
                    </tr>




                    <div id="tagModal_<?= $userModel->getId()  ?>" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Editer status</h2>
                            <button type="button" class="close-modal" onclick="closeModal('tagModal_<?= $userModel->getId()  ?>')">&times;</button>
                        </div>
                        <form action="/User/update/<?= $userModel->getId()  ?>" method="POST">
                           <input type="hidden" name="id" value="<?= $userModel->getId()  ?>" />
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <input type="text" name="status" class="form-input" value="<?= $userModel->getStatus() ?>" >
                            </div>
                            <!-- <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea class="form-input" name="description" rows="3" placeholder="Description du tag"><?= $tagModel->description ?></textarea>
                            </div> -->
                            <button type="submit" name="submit" class="form-submit">Mettre à jour</button>
                        </form>
                    </div>
                </div>





                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php
        include "../app/Views/Layout/footer.php";
        ?>