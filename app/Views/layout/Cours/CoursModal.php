<div class="action-buttons">
    <button class="add-button" onclick="openModal('courseModal')">
        <i class="fas fa-graduation-cap"></i>
        Ajouter un cours
    </button>

</div>
<script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'flex';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    // Fermer le modal si on clique en dehors
    window.onclick = function(event) {
        if (event.target.className === 'modal') {
            event.target.style.display = 'none';
        }
    }
</script>

<div id="courseModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Ajouter un nouveau cours</h2>
            <button class="close-modal" onclick="closeModal('courseModal')">&times;</button>
        </div>
        <form action="/Cours/add" method="POST">
            <div class="form-group">
                <label class="form-label">Titre du cours</label>
                <input type="text" name='titre' class="form-input" placeholder="Entrez le titre du cours">
            </div>
            <div class="form-group">
                <label class="form-label">Photo du cours</label>
                <input type="text" name='photo' class="form-input" placeholder="Entrez le titre du cours">
            </div>
            <div class="form-group">
                <label class="form-label">Contenu</label>
                <textarea class="form-input" name="contenu" rows="3" placeholder="Description du cours"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-input" name="description" rows="3" placeholder="Description du cours"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Catégorie</label>
                <select class="form-select" name="categorie">
                    <option value="">Sélectionnez une catégorie</option>
                    <?php foreach ($categories as $categorie) { ?>
                        <option value=<?= $categorie->getId() ?>><?= $categorie->getName() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Tags</label>
                <select class="form-select" name="tags[]" multiple>
                    <option value="">Sélectionnez une catégorie</option>
                    <?php
                    foreach ($tags as $tag) { ?>
                        <option value=<?= $tag->getId() ?>><?= $tag->getName() ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" name="submit" class="form-submit">Ajouter le cours</button>
        </form>
    </div>
</div>