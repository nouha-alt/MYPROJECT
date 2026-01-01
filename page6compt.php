<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mon Compte - SnapStore</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg,#0f172a,#1e3a8a,#3b82f6);
    color: #fff;
    margin: 0;
}

nav {
    background: rgba(0,0,0,0.85);
    padding: 15px 0;
}
nav .container {
    max-width: 1100px;
    margin: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
nav .logo {
    font-size: 28px;
    font-weight: bold;
}
nav .logo span { color: #c91c1c; }
nav a {
    color: white;
    text-decoration: none;
    margin-left: 15px;
    font-weight: bold;
    padding: 8px 14px;
    border-radius: 20px;
    transition: 0.3s;
}
nav a:hover {
    background-color: #f4c430;
    color: #1b1b10;
}

.account-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 50px;
}

.account-card {
    background: rgba(15,15,20,0.95);
    width: 90%;
    max-width: 500px;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,.25);
    text-align: center;
}

.avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: #c91c1c;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    margin-bottom: 15px;
}

.avatar .material-symbols-outlined {
    font-size: 50px;
    color: white;
}

.account-card h2 {
    margin-bottom: 5px;
    font-size: 24px;
}

.account-card p {
    color: #94a3b8;
    font-size: 14px;
    margin-bottom: 20px;
}

.info-box {
    background: #1e293b;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 15px;
    text-align: left;
    display: flex;
    align-items: center;
}
.info-box i {
    color: #c91c1c;
    margin-right: 8px;
}
.info-box span {
    font-weight: bold;
    margin-right: 5px;
}

.btn {
    display: block;
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}
.btn-primary {
    background: #c91c1c;
    color: white;
}
.btn-primary:hover {
    background: white;
    color: #c91c1c;
}
.btn-logout {
    background: #334155;
    color: white;
}
.btn-logout:hover {
    background: #475569;
}
</style>
</head>
<body>

<nav>
    <div class="container">
        <div class="logo">Snap<span>Store</span></div>
        <div>
            <a href="commerce1.php">Accueil</a>
            <a href="logout.php">Déconnexion</a>
        </div>
    </div>
</nav>

<div class="account-wrapper">
    <div class="account-card">
        <div class="avatar">
            <span class="material-symbols-outlined">person</span>
        </div>
        <h2><?php echo htmlspecialchars($name); ?></h2>
        <p>Bienvenue sur votre espace personnel</p>

        <div class="info-box">
            <i class="material-symbols-outlined">person</i>
            <span>Nom :</span> <?php echo htmlspecialchars($name); ?>
        </div>

        <div class="info-box">
            <i class="material-symbols-outlined">email</i>
            <span>Email :</span> <?php echo htmlspecialchars($email); ?>
        </div>
</div>

</body>
</html>
