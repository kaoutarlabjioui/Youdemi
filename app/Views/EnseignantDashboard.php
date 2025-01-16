<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Enseignant - Youdemy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary: #6366F1;
            --primary-dark: #5B5EE2;
            --secondary: #FF6B6B;
            --accent: #FFD93D;
            --dark: #2D3436;
            --light: #F9F9F9;
            --success: #6BCB77;
            --warning: #FFB302;
            --error: #FF6B6B;
            --gradient-primary: linear-gradient(135deg, #6366F1 0%, #818CF8 100%);
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

        /* Sidebar styles */
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
            background-clip: text;
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

        /* Main content styles */
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

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1rem;
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
            margin-bottom: 0.5rem;
        }

        .stat-change {
            font-size: 0.9rem;
            color: var(--success);
        }

        /* Course Grid */
        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .course-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .course-image {
            height: 160px;
            background: var(--gradient-primary);
            padding: 1.5rem;
            display: flex;
            align-items: flex-end;
        }

        .course-category {
            background: rgba(255, 255, 255, 0.9);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--primary);
        }

        .course-content {
            padding: 1.5rem;
        }

        .course-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .course-stats {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1rem;
            color: #64748b;
            font-size: 0.9rem;
        }

        .table-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .table-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .table-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
        }

        .btn-submit {
            background: var(--gradient-primary);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.3s ease;
            width: 100%;
        }

        .btn-submit:hover {
            opacity: 0.9;
        }

        .message-list {
            display: flex;
            flex-direction: column;
        }

        .message-item {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            background: #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--primary);
            margin-right: 1rem;
        }

        .message-content {
            flex: 1;
        }

        .message-student {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .message-text {
            color: #64748b;
            font-size: 0.9rem;
        }

        .message-time {
            color: #64748b;
            font-size: 0.85rem;
        }

        @media (max-width: 1024px) {
            .sidebar {
                width: 80px;
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
                <i class="fas fa-book"></i>
                <span>Mes cours</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-users"></i>
                <span>Étudiants</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-comments"></i>
                <span>Messages</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-chart-line"></i>
                <span>Statistiques</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-wallet"></i>
                <span>Revenus</span>
            </a>
        </nav>
    </aside>

    <main class="main-content">
        <header class="page-header">
            <h1 class="page-title">Tableau de bord enseignant</h1>
            <div class="breadcrumb">Accueil > Tableau de bord</div>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: var(--primary);">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-title">Étudiants actifs</div>
                <div class="stat-value">328</div>
                <div class="stat-change">
                    <i class="fas fa-arrow-up"></i> +5.2%
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: var(--secondary);">
                    <i class="fas fa-book"></i>
                </div>
                <div class="stat-title">Cours publiés</div>
                <div class="stat-value">12</div>
                <div class="stat-change">
                    <i class="fas fa-arrow-up"></i> +1 ce mois</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: var(--success);">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-title">Note moyenne</div>
                <div class="stat-value">4.8/5</div>
                <div class="stat-change">
                    <i class="fas fa-arrow-up"></i> +0.2</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: var(--accent);">
                    <i class="fas fa-euro-sign"></i>
                </div>
                <div class="stat-title">Revenus du mois</div>
                <div class="stat-value">2,845€</div>
                <div class="stat-change">
                    <i class="fas fa-arrow-up"></i> +12.3%</div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h2 class="table-title">Mes cours</h2>
            </div>
            <div class="course-grid">
                <div class="course-card">
                    <div class="course-image">
                        <span class="course-category">Développement Web</span>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Introduction à HTML/CSS</h3>
                        <div class="course-stats">
                            <span><i class="fas fa-users"></i> 45 étudiants</span>
                            <span><i class="fas fa-star"></i> 4.9</span>
                        </div>
                        <button class="btn-submit">Gérer le cours</button>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-image">
                        <span class="course-category">JavaScript</span>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">JavaScript Avancé</h3>
                        <div class="course-stats">
                            <span><i class="fas fa-users"></i> 38 étudiants</span>
                            <span><i class="fas fa-star"></i> 4.7</span>
                        </div>
                        <button class="btn-submit">Gérer le cours</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h2 class="table-title">Messages récents</h2>
            </div>
            <div class="message-list">
                <div class="message-item">
                    <div class="student-avatar">JD</div>
                    <div class="message-content">
                        <div class="message-student">Jean Dupont</div>
                        <div class="message-text">Question sur le module 3 du cours HTML...</div>
                    </div>
                    <div class="message-time">Il y a 2h</div>
                </div>
                <div class="message-item">
                    <div class="student-avatar">MM</div>
                    <div class="message-content">
                        <div class="message-student">Marie Martin</div>
                        <div class="message-text">Merci pour votre dernier feedback...</div>
                    </div>
                    <div class="message-time">Il y a 5h</div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>