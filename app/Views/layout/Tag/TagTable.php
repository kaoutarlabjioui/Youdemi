



<?php include 'TagModal.php' ?>

<div class="table-container">
    <div class="table-header">
        <h2 class="table-title">les tags disponibles</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nom de tag</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tags as $tagModel): ?>
                <tr>
                    <td><?= $tagModel->getName() ?></td>
                    <td><?= $tagModel->getDescription() ?></td>
                    <td>
                       
                        <a  type="button" onclick="openModal('tagModal_<?= $tagModel->getId() ?>')" class="action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/Tags/delete/<?= $tagModel->getId() ?>" type="button" class="action-btn">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

              
                <div id="tagModal_<?= $tagModel->getId() ?>" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Editer tag</h2>
                            <button type="button" class="close-modal" onclick="closeModal('tagModal_<?= $tagModel->getId() ?>')">&times;</button>
                        </div>
                        <form action="/Tags/update/<?= $tagModel->getId() ?>" method="POST">
                           <input type="hidden" name="id" value="<?= $tagModel->getId()?>" />
                            <div class="form-group">
                                <label class="form-label">Nom du tag</label>
                                <input type="text" name="name" class="form-input" value="<?= $tagModel->getName() ?>" placeholder="Entrez le nom du tag">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea class="form-input" name="description" rows="3" placeholder="Description du tag"><?= $tagModel->getDescription() ?></textarea>
                            </div>
                            <button type="submit" name="submit" class="form-submit">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include "../app/Views/Layout/footer.php"; ?>