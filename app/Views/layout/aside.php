<aside class="sidebar">
        <a href="/" class="logo">Youdemy</a>
        <nav>
            <a href="#" class="menu-item active">
                <i class="fas fa-th-large"></i>
                <span>Tableau de bord</span>
            </a>
            <?php

            if ($role->getRoleNAme() == "superadmin") : ?>
                <a href="/user/display" class="menu-item">
                    <i class="fas fa-users"></i>
                    <span>Utilisateurs</span>
                </a>
            <?php endif; ?>
            <a href="/cours/" class="menu-item">
                <i class="fas fa-graduation-cap"></i>
                <span>Cours</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Enseignants</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-chart-bar"></i>
                <span>Statistiques</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
        </nav>
    </aside>