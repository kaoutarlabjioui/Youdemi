<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Étudiant - Youdemy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary: #4ECDC4;
            --primary-dark: #45B7AE;
            --secondary: #FF6B6B;
            --accent: #FFD93D;
            --dark: #2D3436;
            --light: #F9F9F9;
            --success: #6BCB77;
            --warning: #FFB302;
            --error: #FF6B6B;
            --gradient-primary: linear-gradient(135deg, #4ECDC4 0%, #45B7AE 100%);
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

        /* Progress cards */
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
        }

        .stat-title {
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 1rem;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
        }

        /* Course grid */
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

        .course-progress {
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
            margin-bottom: 0.5rem;
        }

        .course-instructor {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .progress-bar {
            height: 6px;
            background: #e2e8f0;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .progress-fill {
            height: 100%;
            background: var(--gradient-primary);
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
                <i class="fas fa-calendar"></i>
                <span>Planning</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-certificate"></i>
                <span>Certifications</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-chart-line"></i>
                <span>Progression</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
        </nav>
    </aside>

    <main class="main-content">
        <header class="page-header">
            <h1 class="page-title">Mon apprentissage</h1>
            <div class="breadcrumb">Accueil > Tableau de bord</div>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: var(--primary);">
                    <i class="fas fa-book"></i>
                </div>
                <div class="stat-title">Cours en cours</div>
                <div class="stat-value">4</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: var(--secondary);">
                    <i class="fas fa-certificate"></i>
                </div>
                <div class="stat-title">Certifications</div>
                <div class="stat-value">2</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: var(--success);">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-title">Heures d'apprentissage</div>
                <div class="stat-value">46h</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: var(--accent);">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="stat-title">Points XP</div>
                <div class="stat-value">1,250</div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h2 class="table-title">Mes cours en cours</h2>
            </div>
            <div class="course-grid">
                <div class="course-card">
                    <div class="course-image">
                        <div class="course-progress">65% complété</div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Introduction au JavaScript</h3>
                        <div class="course-instructor">Par John Doe</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 65%"></div>
                        </div>
                        <button class="btn-submit">Continuer le cours</button>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-image">
                        <div class="course-progress">30% complété</div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">React pour débutants</h3>
                        <div class="course-instructor">Par Jane Smith</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 30%"></div>
                        </div>
                        <button class="btn-submit">Continuer le cours</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>