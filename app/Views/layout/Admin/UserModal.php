<div class="action-buttons">
<button class="add-button" onclick="openModal('tagModal')">
                <i class="fas fa-tags"></i>
                Ajouter un tag
 </button>
</div>

 <div id="tagModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Editer status d'utilisateur</h2>
                    <button class="close-modal" onclick="closeModal('tagModal')">&times;</button>
                </div>
                <form  action="/Tags/add" method="POST" >
                    <div class="form-group">
                        <label class="form-label">Nom du tag</label>
                        <input type="text"  name="name" class="form-input" placeholder="Entrez le nom du tag">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-input" name="description" rows="3" placeholder="Description du tag"></textarea>
                    </div>
                    <button type="submit" name="submit" class="form-submit">Ajouter le tag</button>
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