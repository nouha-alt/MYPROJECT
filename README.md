<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>commerce</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-icons@1.13.12/iconfont/material-icons.min.css">
<link rel="stylesheet" href="commerce2.css">
</head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap');

:root {
    --mainColor: crimson;
    --black: #0f100f;
    --white: #ffffff;
    --whiteSmoke: #c4c3ca;
    --shadow: 0px 4px 8px rgba(21,21,21,.2);
}

/* RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Lato', sans-serif;
    font-size: 16px;
    letter-spacing: 1px;
    background: linear-gradient(135deg, #47526a, #1e293b, #334155);
    height: 100vh;
    overflow: hidden;   
    color: var(--white);
    background: linear-gradient(135deg,#0f172a,#1e3a8a,#3b82f6);
}

/* روابط وقوائم */
a { text-decoration: none; }
ul { list-style: none; padding-left: 0; margin: 0; }

.container {
    max-width: 1080px;
    margin: auto;
    height: 100%;  
}

.row {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

/* NAVBAR */
nav {
    position: fixed;
    width: 100%;
    top: 0;
    background-color: rgba(6, 6, 6, 0.9);
    z-index: 999;
    padding: 20px;
}

nav .row {
    display: flex;
    justify-content: space-between; 
    align-items: center;
}

nav .logo {
    font-size: 32px;
    font-weight: 700;
    text-align: left;   
    flex: 0 0 auto;     
    margin-left: 10px;  
}

nav .logo span {
    color: var(--mainColor);
}

nav ul {
    display: flex;
}

nav ul li {
    margin: 0 10px;
}

nav ul li a {
    color: var(--white);
    padding: 8px 15px;
    border-radius: 5px;
    transition: .3s;
}

nav ul li a:hover,
nav ul li a.active {
    background-color: var(--white);
    color: var(--mainColor);
}

/* MAIN LAYOUT */
.left, .right {
    flex: 0 0 50%;
    max-width: 50%;
    padding: 20px;
}

/* LEFT */
.left .line {
    width: 60px;
    height: 3px;
    background-color: var(--mainColor);
}

.left h2 {
    margin-top: 25px;
    font-size: 48px;
    line-height: 1.2;
}

.left h2 span {
    color: var(--mainColor);
}

.left p {
    margin: 15px 0;
    color: var(--whiteSmoke);
}

/* BUTTON */
.btn {
    height: 44px;
    padding: 0 30px;
    background-color: var(--mainColor);
    border-radius: 5px;
    color: var(--white);
    font-weight: 700;
    border: none;
    cursor: pointer;
    transition: .3s;
}

.btn:hover {
    background-color: var(--white);
    color: var(--mainColor);
}

/* SOCIAL */
.social-media {
    margin-top: 40px;
}

.social-media a {
    color: var(--white);
    font-size: 22px;
    margin-right: 15px;
    transition: .3s;
}

.social-media a:hover {
    color: var(--mainColor);
}

/* FORM */
.form {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.card-3d-wrap {
    width: 400px;    
    height: 400px;   
    margin-top: 80px;
    border: 1px solid var(--whiteSmoke);  
    border-radius: 10px;
    background-color: rgba(27,27,27,0.95);
    box-shadow: var(--shadow);
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-3d-wrapper {
    width: 100%;
    height: 100%;
}

.card-front,
.card-back {
    position: relative; 
    width: 100%;
    height: 100%;
}

.card-back {
    display: none; 
}

.center-wrap {
    width: 100%;
    padding: 0 30px;
    display: flex;
    flex-direction: column;
    justify-content: center; 
    align-items: center;     
    height: 100%;
}

.form-group {
    position: relative;
    margin-bottom: 15px;
    width: 100%;
    display: flex;
    justify-content: center;
}

.form-style {
    width: 100%;
    height: 48px;      
    padding-left: 55px; 
    font-size: 14px;
    border-radius: 5px;
    border: none;
    background-color: #242323;
    color: var(--white);
}

.form-style::placeholder {
    color: var(--whiteSmoke);
}
.input-icon {
    position: absolute;
    top: 12px;
    left: 18px;
    font-size: 22px;
    color: var(--mainColor);
}

.checkbox,
.checkbox + label {
    display: none;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .left, .right {
        flex: 0 0 100%;
        max-width: 100%;
        text-align: center;
    }
}
  </style>
<body>
<nav class="navbar">
<div class="container">
<div class="row justify-content-between align-items-center">
<div class="logo">Snap<span>Store</span></div>
<ul>
<li><a href="commerce1.html" class="active">Home</a></li>
<li><a href="#">About</a></li>
<li><a href="#">Services</a></li>
<li><a href="#">Gallery</a></li>
<li><a href="#">Feedback</a></li>
</ul>
</div>
</div>
</nav>

<section>
<div class="container">
<div class="row full-screen align-items-center">
<div class="left">
<span class="line"></span>
<h2>Bienvenue dans notre boutique<br>a <span>Dècouvrez nos nouveautès</span></h2>
<a href="#" class="btn">Contact</a>
<div class="social-media">
<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
<a href="#"><i class="fa-brands fa-x-twitter"></i></a>
<a href="#"><i class="fa-brands fa-instagram"></i></a>
<a href="#"><i class="fa-brands fa-youtube"></i></a>
<a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
</div>
</div>

<div class="right">
<div class="form">
<div class="text-center">
<input type="checkbox" class="checkbox" id="reg-log">
<label for="reg-log"></label>
<div class="card-3d-wrap">
<div class="card-3d-wrapper">

<div class="card-front">
<div class="center-wrap">
<div class="form-group">
<input type="email" class="form-style" placeholder="Your Email" autocomplete="off">
<i class="input-icon material-icons">alternate_email</i>
</div>
<div class="form-group">
<input type="password" class="form-style" placeholder="Your Password" autocomplete="off">
<i class="input-icon material-icons">lock</i>
</div>
<a href="#" class="btn">Submit</a>
<p class="text-center"><a href="#" class="link">Forgot your password?</a></p>
</div>
</div>

<div class="card-back">
<div class="center-wrap">
<h4 class="heading">Sign Up</h4>
<div class="form-group">
<input type="text" class="form-style" placeholder="Your Name" autocomplete="off">
<i class="input-icon material-icons">perm_identity</i>
</div>
<div class="form-group">
<input type="email" class="form-style" placeholder="Your Email" autocomplete="off">
<i class="input-icon material-icons">alternate_email</i>
</div>
<div class="form-group">
<input type="password" class="form-style" placeholder="Your Password" autocomplete="off">
<i class="input-icon material-icons">lock</i>
</div>
<a href="#" class="btn">Submit</a>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</section>
</body>
</html>
