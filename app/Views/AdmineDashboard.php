<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrateur - Youdemy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary: #FF6B6B;
            --primary-dark: #EE5253;
            --secondary: #4ECDC4;
            --accent: #FFD93D;
            --dark: #2D3436;
            --light: #F9F9F9;
            --success: #6BCB77;
            --warning: #FFB302;
            --error: #FF6B6B;
            --gradient-primary: linear-gradient(135deg, #FF6B6B 0%, #4ECDC4 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background: var(--light);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: white;
            border-right: 2px solid rgba(0, 0, 0, 0.05);
            padding: 2rem 0;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: -1px;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            padding: 0 2rem;
            margin-bottom: 2rem;
        }

        .menu-item {
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .menu-item:hover,
        .menu-item.active {
            background: var(--gradient-primary);
            color: white;
        }

        .menu-item i {
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .breadcrumb {
            color: #64748b;
            font-size: 0.9rem;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-title {
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
        }

        .stat-change {
            font-size: 0.9rem;
            color: var(--success);
        }

        /* Tables */
        .table-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .table-header {
            padding: 1.5rem;
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
        }

        .table-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        th {
            font-weight: 600;
            color: #64748b;
            background: #f8fafc;
        }

        td {
            color: var(--dark);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-active {
            background: rgba(107, 203, 119, 0.1);
            color: var(--success);
        }

        .status-pending {
            background: rgba(255, 179, 2, 0.1);
            color: var(--warning);
        }

        .action-btn {
            padding: 0.5rem;
            border-radius: 8px;
            color: #64748b;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background: #f8fafc;
            color: var(--primary);
        }

        @media (max-width: 1024px) {
            .sidebar {
                width: 80px;
                padding: 1rem 0;
            }

            .logo {
                font-size: 1.5rem;
                padding: 0 1rem;
            }

            .menu-item span {
                display: none;
            }

            .menu-item {
                padding: 1rem;
                justify-content: center;
            }

            .main-content {
                margin-left: 80px;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <a href="/" class="logo">Youdemy</a>
        <nav>
            <a href="#" class="menu-item active">
                <i class="fas fa-th-large"></i>
                <span>Tableau de bord</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-users"></i>
                <span>Utilisateurs</span>
            </a>
            <a href="#" class="menu-item">
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

    <main class="main-content">
        <header class="page-header">
            <h1 class="page-title">Tableau de bord</h1>
            <div class="breadcrumb">Accueil > Tableau de bord</div>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: var(--primary);">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="stat-title">Utilisateurs totaux</div>
                <div class="stat-value">1,234</div>
                <div class="stat-change">
                    <i class="fas fa-arrow-up"></i> +12.5%
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: var(--secondary);">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
                <div class="stat-title">Cours actifs</div>
                <div class="stat-value">156</div>
                <div class="stat-change">
                    <i class="fas fa-arrow-up"></i> +8.2%
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: var(--accent);">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>
                <div class="stat-title">Enseignants</div>
                <div class="stat-value">48</div>
                <div class="stat-change">
                    <i class="fas fa-arrow-up"></i> +5.3%
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: var(--success);">
                        <i class="fas fa-euro-sign"></i>
                    </div>
                </div>
                <div class="stat-title">Revenus mensuels</div>
                <div class="stat-value">9,845€</div>
                <div class="stat-change">
                    <i class="fas fa-arrow-up"></i> +15.8%
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h2 class="table-title">Derniers utilisateurs inscrits</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Date d'inscription</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jean Dupont</td>
                        <td>jean.dupont@email.com</td>
                        <td>15 Jan 2024</td>
                        <td><span class="status-badge status-active">Actif</span></td>
                        <td>
                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Marie Martin</td>
                        <td>marie.martin@email.com</td>
                        <td>14 Jan 2024</td>
                        <td><span class="status-badge status-pending">En attente</span></td>
                        <td>
                            <button class="action-btn"><i class="fas fa-edit"></i></button>
                            <button class="action-btn"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>