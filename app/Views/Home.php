<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Plateforme d'apprentissage innovante</title>
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
                --gradient-dark: linear-gradient(135deg, #2D3436 0%, #636E72 100%);
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Montserrat', sans-serif;
            }

            /* Animations */
            @keyframes float {
                0%, 100% { transform: translateY(0) rotate(-1deg); }
                50% { transform: translateY(-15px) rotate(1deg); }
            }

            @keyframes pulse {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.05); }
            }

            @keyframes slide-up {
                from { 
                    opacity: 0;
                    transform: translateY(50px);
                }
                to { 
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-float { animation: float 5s ease-in-out infinite; }
            .animate-pulse { animation: pulse 3s infinite ease-in-out; }
            .animate-slide-up { animation: slide-up 0.8s ease-out; }

            /* Navigation */
            nav {
                background: rgba(255, 255, 255, 0.98);
                position: fixed;
                width: 100%;
                z-index: 1000;
                padding: 1rem 0;
                border-bottom: 2px solid rgba(0, 0, 0, 0.05);
            }

            .nav-container {
                max-width: 1400px;
                margin: 0 auto;
                padding: 0 2rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo {
                font-size: 1.8rem;
                font-weight: 800;
                letter-spacing: -1px;
                background: var(--gradient-primary);
                background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .nav-links {
                display: flex;
                gap: 2.5rem;
                align-items: center;
            }

            .nav-link {
                color: var(--dark);
                text-decoration: none;
                font-weight: 600;
                text-transform: uppercase;
                font-size: 0.9rem;
                letter-spacing: 1px;
                padding: 0.5rem 1rem;
                border-radius: 25px;
                transition: all 0.3s ease;
            }

            .nav-link:hover {
                background: rgba(255, 107, 107, 0.1);
                color: var(--primary);
            }

            /* Buttons */
            .btn {
                display: inline-flex;
                align-items: center;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-size: 0.9rem;
                padding: 0.8rem 1.8rem;
                border-radius: 25px;
                font-weight: 600;
                transition: all 0.3s ease;
                text-decoration: none;
                gap: 0.5rem;
            }

            .btn-primary {
                background: var(--gradient-primary);
                color: white;
                border: none;
                box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
            }

            .btn-outline {
                border: 2px solid var(--primary);
                color: var(--primary);
                background: transparent;
            }

            .btn-outline:hover {
                background: rgba(255, 107, 107, 0.1);
                transform: translateY(-2px);
            }

            /* Hero Section */
            .hero {
                min-height: 100vh;
                background: var(--gradient-primary);
                position: relative;
                overflow: hidden;
                padding: 8rem 2rem 4rem;
            }

            .hero::before {
                content: '';
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                opacity: 0.1;
                background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            }

            .hero-content {
                max-width: 1400px;
                margin: 0 auto;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 4rem;
                align-items: center;
                position: relative;
            }

            .hero-text {
                color: white;
                animation: slide-up 1s ease-out;
            }

            .hero-text h1 {
                font-size: 3.5rem;
                font-weight: 800;
                letter-spacing: -1px;
                line-height: 1.1;
                margin-bottom: 1.5rem;
            }

            .hero-text p {
                font-size: 1.25rem;
                line-height: 1.8;
                margin-bottom: 2.5rem;
                opacity: 0.9;
            }



            /* Courses Section */
            .courses {
                padding: 8rem 2rem;
                background: var(--light);
            }

            .courses-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
                max-width: 1400px;
                margin: 0 auto;
            }

            .course-card {
                background: white;
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                display: flex;
                flex-direction: column;
            }

            .course-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 40px rgba(255, 107, 107, 0.2);
            }

            .course-content {
                padding: 2rem;
                flex-grow: 1;
            }

            .course-title {
                font-size: 1.5rem;
                font-weight: 700;
                margin-bottom: 1rem;
                color: var(--dark);
            }

            .course-description {
                color: #64748b;
                line-height: 1.6;
                margin-bottom: 1.5rem;
            }

            .course-details {
                display: flex;
                gap: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .course-detail {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: #64748b;
                font-size: 0.9rem;
            }

            .course-tags {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
                margin-bottom: 1.5rem;
            }

            .tag {
                background: var(--primary);
                color: white;
                padding: 0.3rem 0.8rem;
                border-radius: 20px;
                font-size: 0.8rem;
                font-weight: 500;
            }

            .course-link {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 1rem;
                background: var(--gradient-primary);
                color: white;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .course-link:hover {
                background: var(--gradient-dark);
            }

            .course-link i {
                font-size: 1.2rem;
            }

            /* Features Section */
            .features {
                padding: 8rem 2rem;
                background: white;
            }

            .section-title {
                text-align: center;
                margin-bottom: 4rem;
            }

            .section-title h2 {
                font-size: 2.5rem;
                color: var(--dark);
                margin-bottom: 1rem;
                letter-spacing: -0.5px;
            }

            .section-title p {
                color: #64748b;
                font-size: 1.2rem;
                max-width: 600px;
                margin: 0 auto;
            }

            .features-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
                max-width: 1400px;
                margin: 0 auto;
            }

            .feature-card {
                background: linear-gradient(145deg, #ffffff, #f5f5f5);
                padding: 2rem;
                border-radius: 15px;
                border: 1px solid rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .feature-card:hover {
                background: var(--gradient-primary);
                transform: translateY(-5px);
                box-shadow: 0 15px 40px rgba(255, 107, 107, 0.2);
            }

            .feature-icon {
                background: var(--gradient-primary);
                background-clip: text;
                -webkit-text-fill-color: transparent;
                font-size: 2rem;
                margin-bottom: 1.5rem;
            }

            .feature-card:hover .feature-icon {
                background: white;
                background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .feature-card h3 {
                font-size: 1.3rem;
                font-weight: 700;
                letter-spacing: -0.5px;
                margin-bottom: 1rem;
                color: var(--dark);
            }

            .feature-card p {
                color: #64748b;
                line-height: 1.7;
            }

            .feature-card:hover h3,
            .feature-card:hover p {
                color: white;
            }

            .stats {
            background: var(--gradient-primary);
            padding: 6rem 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
        }

        .stat-item {
            padding: 2rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 8rem 2rem;
            background: var(--light);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .testimonial-content {
            font-size: 1.1rem;
            line-height: 1.7;
            color: var(--dark);
            margin-bottom: 1.5rem;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .author-info h4 {
            font-weight: 600;
            color: var(--dark);
        }

        .author-info p {
            color: #64748b;
            font-size: 0.9rem;
        }

        /* CTA Section */
        .cta {
            background: var(--gradient-dark);
            padding: 8rem 2rem;
            color: white;
            text-align: center;
        }

        .cta-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .cta h2 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
        }

        .cta p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 4rem 2rem 2rem;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 4rem;
        }

        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            color: var(--accent);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        .footer-bottom {
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: white;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            color: var(--accent);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 3rem;
            }

            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="#" class="logo">Youdemy</a>
            <div class="nav-links">
                <a href="#features" class="nav-link">Fonctionnalités</a>
                <a href="#" class="nav-link">Cours</a>
                <a href="#pricing" class="nav-link">Tarifs</a>
                <a href="#contact" class="nav-link">Contact</a>
                <a href="/auth/login" class="btn btn-outline">Connexion</a>
                <a href="/auth/signup" class="btn btn-primary">S'inscrire</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Transformez votre avenir avec l'apprentissage en ligne</h1>
                <p>Développez vos compétences avec des cours de qualité, des experts reconnus et une communauté dynamique. Commencez votre voyage d'apprentissage aujourd'hui.</p>
                <div class="cta-buttons">
                    <a href="/auth/signup" class="btn btn-primary">
                        <i class="fas fa-rocket"></i>
                        Commencer gratuitement
                    </a>
                    <a href="/Cours" class="btn btn-outline">
                        <i class="fas fa-play"></i>
                        Découvrir les cours
                    </a>
                </div>
            </div>
            <div class="hero-image animate-float">
                <img src="https://www.scnsoft.com/education-industry/elearning-development/elearning-development-cover-picture.svg"  alt="Plateforme d'apprentissage en ligne" />
            </div>
        </div>
    </section>




    <section class="courses" id =" cours">
    <div class="section-title">
        <h2>Nos cours disponibles</h2>
        <p>Découvrez notre sélection de cours de qualité pour développer vos compétences</p>
    </div>
    <div class="courses-grid" >
        <?php foreach ($cours as $cour): ?>
            <div class="course-card animate-slide-up">
                <div class="course-content">
                    <h3 class="course-title"><?= $cour->getTitre() ?></h3>
                    <p class="course-description"><?= $cour->getDescription() ?></p>
                    <div class="course-details">
                        <div class="course-detail">
                            <i class="fas fa-folder"></i>
                            <span><?= $cour->catName ?></span>
                        </div>
                        <div class="course-detail">
                            <i class="fas fa-user"></i>
                            <span><?= $cour->nom ?></span>
                        </div>
                    </div>
                    <div class="course-tags">
                        <?php if (!empty($cour->getTags())): ?>
                            <?php foreach ($cour->getTags() as $tag): ?>
                                <span class="tag"><?= $tag->getName() ?></span>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="tag">Aucun tag</span>
                        <?php endif; ?>
                    </div>
                </div>
                <a href="/cours/details/<?= $cour->getId() ?>" class="course-link">
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

    <section class="features" id="features">
        <div class="section-title">
            <h2>Pourquoi choisir Youdemy ?</h2>
            <p>Découvrez les fonctionnalités qui font de notre plateforme le meilleur choix pour votre apprentissage</p>
        </div>
        <div class="features-grid">
        <div class="feature-card animate-slide-up">
                <div class="feature-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3>Apprentissage personnalisé</h3>
                <p>Progressez à votre rythme avec des parcours adaptés à vos objectifs et votre niveau. Nos algorithmes s'adaptent à votre style d'apprentissage.</p>
            </div>
            <div class="feature-card animate-slide-up">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Experts reconnus</h3>
                <p>Apprenez avec les meilleurs experts dans leur domaine, sélectionnés pour leur expertise et leur capacité à transmettre leur savoir.</p>
            </div>
            <div class="feature-card animate-slide-up">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3>Certifications reconnues</h3>
                <p>Obtenez des certifications valorisantes pour votre carrière, reconnues par les entreprises et les professionnels du secteur.</p>
            </div>
            <div class="feature-card animate-slide-up">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Apprentissage mobile</h3>
                <p>Accédez à vos cours partout et à tout moment grâce à notre application mobile performante et intuitive.</p>
            </div>
            <div class="feature-card animate-slide-up">
                <div class="feature-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h3>Communauté active</h3>
                <p>Échangez avec une communauté passionnée d'apprenants et d'experts. Participez à des forums et des groupes d'étude.</p>
            </div>
            <div class="feature-card animate-slide-up">
                <div class="feature-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <h3>Projets pratiques</h3>
                <p>Mettez en pratique vos connaissances avec des projets réels et construisez un portfolio impressionnant.</p>
            </div>
        </div>
    </section>

    <section class="stats">
    <div class="stats-grid">
        <div class="stat-item animate-slide-up">
            <div class="stat-number">100K+</div>
            <div class="stat-label">Étudiants actifs</div>
        </div>
        <div class="stat-item animate-slide-up">
            <div class="stat-number">500+</div>
            <div class="stat-label">Cours disponibles</div>
        </div>
        <div class="stat-item animate-slide-up">
            <div class="stat-number">50+</div>
            <div class="stat-label">Experts certifiés</div>
        </div>
        <div class="stat-item animate-slide-up">
            <div class="stat-number">95%</div>
            <div class="stat-label">Taux de satisfaction</div>
        </div>
    </div>
</section>

<section class="testimonials">
    <div class="section-title">
        <h2>Ce que disent nos étudiants</h2>
        <p>Découvrez les expériences de ceux qui ont déjà transformé leur carrière avec Youdemy</p>
    </div>
    <div class="testimonials-grid">
        <div class="testimonial-card animate-slide-up">
            <div class="testimonial-content">
                "Grâce à Youdemy, j'ai pu acquérir de nouvelles compétences en développement web et décrocher le poste de mes rêves. La qualité des cours est exceptionnelle !"
            </div>
            <div class="testimonial-author">
                <div class="author-avatar">ML</div>
                <div class="author-info">
                    <h4>Marie Lambert</h4>
                    <p>Développeuse Web</p>
                </div>
            </div>
        </div>
        <div class="testimonial-card animate-slide-up">
            <div class="testimonial-content">
                "La flexibilité de la plateforme m'a permis de me former à mon rythme tout en conservant mon emploi. Les projets pratiques sont particulièrement enrichissants."
            </div>
            <div class="testimonial-author">
                <div class="author-avatar">TD</div>
                <div class="author-info">
                    <h4>Thomas Dubois</h4>
                    <p>Data Analyst</p>
                </div>
            </div>
        </div>
        <div class="testimonial-card animate-slide-up">
            <div class="testimonial-content">
                "L'accompagnement personnalisé et la communauté active font toute la différence. Je recommande vivement Youdemy pour toute personne souhaitant évoluer professionnellement."
            </div>
            <div class="testimonial-author">
                <div class="author-avatar">SB</div>
                <div class="author-info">
                    <h4>Sarah Benali</h4>
                    <p>UX Designer</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta">
    <div class="cta-content">
        <h2>Prêt à commencer votre voyage ?</h2>
        <p>Rejoignez notre communauté de plus de 100 000 apprenants et transformez votre carrière dès aujourd'hui.</p>
        <div class="cta-buttons">
            <a href="#" class="btn btn-primary">
                <i class="fas fa-rocket"></i>
                Commencer gratuitement
            </a>
            <a href="#" class="btn btn-outline">
                <i class="fas fa-paper-plane"></i>
                Contactez-nous
            </a>
        </div>
    </div>
</section>

<footer>
    <div class="footer-content">
        <div class="footer-column">
            <h3>À propos</h3>
            <ul class="footer-links">
                <li><a href="#">Notre histoire</a></li>
                <li><a href="#">Notre équipe</a></li>
                <li><a href="#">Carrières</a></li>
                <li><a href="#">Presse</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Ressources</h3>
            <ul class="footer-links">
                <li><a href="#">Blog</a></li>
                <li><a href="#">Guide des formations</a></li>
                <li><a href="#">Catalogue des cours</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Support</h3>
            <ul class="footer-links">
                <li><a href="#">Centre d'aide</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Communauté</a></li>
                <li><a href="#">Signaler un problème</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Légal</h3>
            <ul class="footer-links">
                <li><a href="#">Conditions d'utilisation</a></li>
                <li><a href="#">Politique de confidentialité</a></li>
                <li><a href="#">Cookies</a></li>
                <li><a href="#">Mentions légales</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 Youdemy. Tous droits réservés.</p>
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</footer>





</body>
</html>