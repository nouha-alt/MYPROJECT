
<?php
session_start();
$userName = $_SESSION['user_name'] ?? "";
$conn = new mysqli("localhost", "root", "", "inscription");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?>

<!DOCTYPE html><html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SnapStore - Enfants</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
<style>
body{
    margin:0;
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#e0f7ff,#fff6cc);
}
.top-bar{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:15px 30px;
    background-color:#4fc3f7;
}
.logo{
    font-size:28px;
    font-weight:bold;
    color:white;
}
.logo span{
    color:#ffeb3b;
}
.links a{
    color:white;
    text-decoration:none;
    font-weight:bold;
    margin-left:15px;
    padding:8px 14px;
    border-radius:20px;
    transition:0.3s;
}
.links a:hover{
    background-color:#ffeb3b;
    color:#333;
}
.section-intro{
    text-align:center;
    font-size:2rem;
    color:#ff6f00;
    margin:30px 0;
}
.products-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(220px,1fr));
    gap:25px;
    padding:0 25px 40px;
}
.product-card{
    background:white;
    padding:15px;
    border-radius:15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    text-align:center;
}
.product-card img{
    width:100%;
    border-radius:15px;
}
.product-name{
    margin:12px 0 5px;
    font-size:18px;
    color:#0288d1;
}
.price{
    font-size:18px;
    font-weight:bold;
    color:#ff6f00;
    margin-bottom:10px;
}
.add-cart{
    width:100%;
    padding:10px;
    background-color:#ff8f00;
    color:white;
    border:none;
    border-radius:12px;
    cursor:pointer;
    font-weight:bold;
    transition:0.3s;
}
.add-cart:hover{
    background-color:#ff6f00;
}
.product-colors{
    margin:10px 0;
    display:flex;
    justify-content:center;
    gap:8px;
}
.product-colors .color{
    width:20px;
    height:20px;
    border-radius:50%;
    border:2px solid #ddd;
    cursor:pointer;
    transition:transform 0.2s, border 0.2s;
}
.product-colors .color:hover{
    transform:scale(1.2);
    border-color:#51a3bc;
}
footer{
    background-color:#4fc3f7;
    color:white;
    text-align:center;
    padding:15px;
    margin-top:30px;
}
footer a{
    color:var(--white);
    transition:0.3s;
}
footer a:hover{
    color:var(--mainColor);
}
.cart-link{
    position:relative;
}
.cart-count{
    position:absolute;
    top:-6px;
    right:-10px;
    background:crimson;
    color:white;
    font-size:12px;
    width:20px;
    height:20px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
}
.remove-cart{
    width:100%;
    padding:10px;
    background-color:#bf3985;
    color:white;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-weight:bold;
    transition:0.3s;
    margin-top:10px;
}
.remove-cart:hover{
    background-color:#ff1a3c;
}
</style>
</head>
<body>
<header class="top-bar">
    <div class="logo">Snap<span>Store</span></div>
    <nav class="links">
<a href="commerce1.php" >home</a>
<a href="Acheter.php" class="cart-link">
Acheter <span class="material-symbols-outlined">shopping_cart</span>
<span class="cart-count" id="cartCount"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>
</a>
<a href="compt.php">
    <span class="material-symbols-outlined">account_circle</span>
    <?php if(!empty($userName)){ echo htmlspecialchars($userName); } ?>
</a>
</nav>
</header>
<h1 class="section-intro">Découvrez notre collection adorable pour enfants</h1>
<section class="products-grid">
<?php
$result = $conn->query("SELECT * FROM productsenfants");
while($p = $result->fetch_assoc()):
    $colors = !empty($p['colors']) ? explode(',', $p['colors']) : [];
?>
<div class="product-card">
    <img class="product-image" src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">

<h3 class="product-name"><?= htmlspecialchars($p['name']) ?></h3>
    <div class="price"><?= htmlspecialchars($p['price']) ?> DA</div>
    <?php if(count($colors) > 0): ?>
    <div class="product-colors">
        <?php foreach($colors as $c): ?>
            <span class="color" data-image="<?= htmlspecialchars(trim($c)) ?>" style="background-image:url('<?= htmlspecialchars(trim($c)) ?>'); background-size:cover;"></span>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <button class="add-cart">Ajouter au panier</button>
    <button class="remove-cart">Retirer</button>
</div>
<?php endwhile; ?>
</section>
<footer>
    <div class="footer-content">
        <p>© 2025 SnapStore. Tous droits réservés.</p>
        <p>Téléphone : 0550 123 456 | Email : <a href="mailto:info@snapstore.com">info@snapstore.com</a></p>
        <p>
            <a href="#">Politique de confidentialité</a> |
            <a href="#">Conditions d'utilisation</a>
        </p>
        <div class="social-media">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
    </div>

</footer>

<script>
document.addEventListener("click", e=>{
    if(e.target.classList.contains("color")){
        const card = e.target.closest(".product-card");
        card.querySelector(".product-image").src = e.target.dataset.image;
    }
    if(e.target.classList.contains("add-cart")){
        const card = e.target.closest(".product-card");
        fetch("cart_add.php",{
            method:"POST",
            headers:{'Content-Type':'application/json'},
            body:JSON.stringify({
                name: card.querySelector(".product-name").textContent,
                price: card.querySelector(".price").textContent,
                image: card.querySelector(".product-image").src
            })
        }).then(r=>r.json()).then(d=>{
            document.getElementById("cartCount").textContent = d.count;
        });
    }
    if(e.target.classList.contains("remove-cart")){
        const name = e.target.closest(".product-card").querySelector(".product-name").textContent;
        fetch("cart_remove.php",{
            method:"POST",
            headers:{'Content-Type':'application/json'},
            body:JSON.stringify({name})
        }).then(r=>r.json()).then(d=>{
            document.getElementById("cartCount").textContent = d.count;
        });
    }
});
</script>
</body>
</html>
