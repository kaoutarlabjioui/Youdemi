<div class="action-buttons">
<button class="add-button" onclick="openModal('categoryModal')">
                <i class="fas fa-folder"></i>
                Ajouter une catégorie

</button>
</div>


<div id="categoryModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Ajouter une nouvelle catégorie</h2>
                    <button class="close-modal" onclick="closeModal('categoryModal')">&times;</button>
                </div>
                <form action="/Categorie/add" method="POST">
                    <div class="form-group">
                        <label class="form-label">Nom de la catégorie</label>
                        <input type="text" class="form-input" name="name" placeholder="Entrez le nom de la catégorie">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-input" rows="3"  name="description" placeholder="Description de la catégorie"></textarea>
                    </div>
                    
                    <button type="submit" name="submit" class="form-submit">Ajouter la catégorie</button>
                </form>
            </div>
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



                function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Fermer le modal si on clique en dehors
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>