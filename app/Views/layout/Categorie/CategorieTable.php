
<?php include 'CategorieModal.php' ?>


<div class="table-container">
    <div class="table-header">
        <h2 class="table-title">Les categories</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nom de catégorie</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $categorieModel): ?>
                <tr>
                    <td><?= $categorieModel->getName() ?></td>
                    <td><?= $categorieModel->getDescription() ?></td>
                    <td>
                        <a onclick="openModal('categorieModal_<?= $categorieModel->getId() ?>')"  type="button" class="action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/Categorie/delete/<?= $categorieModel->getId() ?>" class="action-btn">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

                <div id="categorieModal_<?= $categorieModel->getId() ?>" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Éditer catégorie</h2>
                            <button type="button" class="close-modal" onclick="closeModal('categorieModal_<?= $categorieModel->getId() ?>')">&times;</button>
                        </div>
                        <form action="/Categorie/update/<?= $categorieModel->getId() ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $categorieModel->getId() ?>" />
                            <div class="form-group">
                                <label class="form-label">Nom de catégorie</label>
                                <input type="text" name="name" class="form-input" value="<?= $categorieModel->getName() ?>" placeholder="Entrez le nom de la catégorie">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea class="form-input" name="description" rows="3" placeholder="Description de la catégorie"><?= $categorieModel->getDescription() ?></textarea>
                            </div>
                            <button type="submit" name="submit" class="form-submit">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
