

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Youdemy</title>
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

        /* Form Container */
        .signup-container {
            max-width: 500px;
            margin: 4rem auto;
            padding: 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
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

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header h1 {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .form-header p {
            color: #64748b;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark);
            font-weight: 500;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }

        input {
            width: 100%;
            padding: 1rem;
            padding-left: 2.8rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
        }

        /* Password Requirements */
        .password-requirements {
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: #64748b;
        }

        .requirement {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.3rem;
        }

        .requirement i {
            font-size: 0.8rem;
        }


        select {
            width: 100%;
            padding: 1rem;
            padding-left: 2.8rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: white;
            cursor: pointer;
        }

        select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
        }

        .input-group.select-group::after {
            content: '\f107';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            pointer-events: none;
        }


        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.2);
        }

        /* Alternative Signup */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 2rem 0;
            color: #64748b;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .divider span {
            padding: 0 1rem;
        }

        .social-signup {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.8rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-weight: 600;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            background: #f8fafc;
            transform: translateY(-2px);
        }

        /* Footer Link */
        .login-link {
            text-align: center;
            margin-top: 2rem;
            color: #64748b;
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .signup-container {
                margin: 2rem;
                padding: 1.5rem;
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

    <div class="signup-container">
        <div class="form-header">
            <h1>Créez votre compte</h1>
            <p>Rejoignez notre communauté d'apprenants</p>
        </div>

        <form action="./Signup" method="POST">
            <div class="form-group">
                <label for="name">Nom </label>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="nom" name="nom" placeholder="Entrez votre nom " required>
                </div>
            </div>

            <div class="form-group">
                <label for="name">Prenom</label>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prenom " required>
                </div>
            </div>


            <div class="form-group">
                <label for="email">Adresse email</label>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="role">Rôle</label>
                <div class="input-group select-group">
                    <i class="fas fa-user-graduate"></i>
                    <select id="role" name="role" required>
                        <option value="" disabled selected>Sélectionnez votre rôle</option>
                        <option value="etudiant">Étudiant</option>
                        <option value="enseignant">Enseignant</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="password">Mot de passe</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Créez votre mot de passe" required>
                </div>
                
                <div class="password-requirements">
                    <div class="requirement">
                        <i class="fas fa-check-circle" style="color: var(--success)"></i>
                        <span>Minimum 8 caractères</span>
                    </div>
                    <div class="requirement">
                        <i class="fas fa-check-circle" style="color: var(--success)"></i>
                        <span>Au moins une majuscule</span>
                    </div>
                    <div class="requirement">
                        <i class="fas fa-check-circle" style="color: var(--success)"></i>
                        <span>Au moins un chiffre</span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit" name = "submit" value = "signup">
                <i class="fas fa-user-plus"></i>
                Créer mon compte
            </button>

            <div class="divider">
                <span>ou inscrivez-vous avec</span>
            </div>

            <div class="social-signup">
                <a href="#" class="social-btn">
                    <i class="fab fa-google"></i>
                    Google
                </a>
                <a href="#" class="social-btn">
                    <i class="fab fa-facebook"></i>
                    Facebook
                </a>
            </div>

            <div class="login-link">
                Déjà membre ? <a href="/Login">Connectez-vous</a>
            </div>
        </form>
    </div>
</body>
</html>