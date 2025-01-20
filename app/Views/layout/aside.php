<aside class="sidebar">
        <a href="/" class="logo">Youdemy</a>
        <nav>
            <a href="/" class="menu-item active">
                <i class="fas fa-th-large"></i>
                <span>Tableau de bord</span>
            </a>
        
            <?php 
            if($_SESSION["role"]->getId()!=3){
            ?>
         
                <a href="/User" class="menu-item">
                    <i class="fas fa-users"></i>
                    <span>Utilisateurs</span>
                </a>
            <?php }?>
            <a href="/cours" class="menu-item">
                <i class="fas fa-graduation-cap"></i>
                <span>Cours</span>
            </a>
            
            <?php 
            if($_SESSION["role"]->getId()==1){
            ?>
            <a href="/User/activateEnseignant" class="menu-item">
                <i class="fas fa-chart-bar"></i>
                <span>Enseignant</span>
            </a>
            <a href="/Tags/display" class="menu-item">
                <i class="fas fa-tags"></i>
                <span>Tags</span>
            </a>
            
            <a href="/Categorie/display" class="menu-item">
                <i class="fas fa-bookmark"></i>
                <span>Categories</span>
            </a>
            <?php }?>
            <a href="#" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>

            <a href="/Auth/logout" class="logout-button">
            <i class="fas fa-sign-out-alt"></i>
            <span>Déconnexion</span>
        </a>

        </nav>
    </aside>