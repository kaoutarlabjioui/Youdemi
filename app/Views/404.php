<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Non Trouvée - Youdemy</title>
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
            flex-direction: column;
        }

        /* Navigation styles */
        nav {
            background: rgba(255, 255, 255, 0.98);
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
            text-decoration: none;
        }

        /* 404 Container */
        .error-container {
            max-width: 600px;
            margin: 4rem auto;
            padding: 3rem 2rem;
            text-align: center;
            animation: slide-up 0.8s ease-out;
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

        .error-code {
            font-size: 8rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-text-fill-color: transparent;
            line-height: 1;
            margin-bottom: 1rem;
        }

        .error-title {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .error-message {
            color: #64748b;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .error-illustration {
            margin: 2rem 0;
            font-size: 5rem;
            color: var(--primary);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Buttons */
        .buttons-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
        }

        .btn-outline {
            border: 2px solid #e2e8f0;
            color: var(--dark);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.2);
        }

        @media (max-width: 768px) {
            .error-container {
                margin: 2rem;
                padding: 2rem 1rem;
            }

            .error-code {
                font-size: 6rem;
            }

            .error-title {
                font-size: 1.5rem;
            }

            .buttons-container {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-container">
            <a href="/" class="logo">Youdemy</a>
        </div>
    </nav>

    <div class="error-container">
        <div class="error-code">404</div>
        <h1 class="error-title">Page Non Trouvée</h1>
        <p class="error-message">
            Oups ! La page que vous recherchez semble avoir disparu dans le cyberespace.
        </p>

        <div class="error-illustration">
            <i class="fas fa-ghost"></i>
        </div>

        <div class="buttons-container">
            <a href="./User" class="btn btn-primary">
                <i class="fas fa-home"></i>
                Retour à l'accueil
            </a>
            <a href="/contact" class="btn btn-outline">
                <i class="fas fa-envelope"></i>
                Nous contacter
            </a>
        </div>
    </div>
</body>

</html>