<?php
session_start();
$userName = $_SESSION['user_name'] ?? "";
$conn = new mysqli("localhost", "root", "", "inscription");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>SnapStore - Mode Homme</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
<style>
body{
    margin:0;
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#0f172a,#1e3a8a,#3b82f6);
}
.top-bar{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:15px 30px;
    background:#131448;
}
.menu-btn{
    font-size:28px;
    background:none;
    border:none;
    color:#fff;
    cursor:pointer
}
.logo{
    font-size:28px;
    color:#fff;
    font-weight:bold
}
.logo span{
    color:rgb(207,22,22)
}
.search-box input{
    padding:8px 120px;
    border-radius:10px;
    border:none
}
.links a{
    color:#fff;
    text-decoration:none;
    font-weight:bold;
    padding:8px 14px;
    border-radius:20px
}
.links a:hover {
    background-color: #fff700;
    color: #1b1b10;
}
.main-layout{
    display:flex;
}
.side-menu{
    width:220px;
    background:#1a1a34;
    padding:20px;min-height:100vh;display:none}
.side-menu.active{
    display:block;
}
.side-menu a{
    color:#fff;
    text-decoration:none;
    font-weight:bold;
    display:block;
    padding:10px;
    margin-bottom:20px;
    border-radius:15px
}
.side-menu a:hover {
    background-color: #fff700;
    color: #1b1b10;
}
.content{
    flex:1;
    padding:25px
}
.hero{
    background:linear-gradient(135deg,#3498db,#2c3e50);
    color:#fff;
    text-align:center;
    padding:50px 20px;
    border-radius:20px
}
.products{
    margin-top:40px;
}
.products-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(220px,1fr));
    gap:25px;
}
.product-card{
    background:#fff;
    padding:15px;
    border-radius:15px;
    box-shadow:0 4px 10px rgba(0,0,0,.1);
    text-align:center;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}
.product-card img{
    width:100%;
    border-radius:10px;
}
.product-name{
    margin:12px 0 5px;
    font-size:18px;
    color:#1f1d42
}
.price{
    font-size:18px;
    font-weight:bold;
    color:rgb(207,22,22)
}
.add-cart,.remove-cart{
    width:100%;
    padding:10px;
    background:#1f1d42;
    color:#fff;
    border:none;
    border-radius:10px;
    font-weight:bold;
    margin-top:10px;
    cursor:pointer
}
.add-cart:hover,.remove-cart:hover{
    background:rgb(207,22,22);
}
.cart-link{
    position:relative;
}
.cart-count{
    position:absolute;
    top:-6px;right:-10px;
    background:crimson;
    color:#fff;
    font-size:12px;
    width:20px;
    height:20px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
}
footer{
    background:#272749;
    color:#fff;
    text-align:center;
    padding:20px;
}
.colors {
    display:flex;
    gap:8px;
    margin-top:8px;
    justify-content:center;
}
.colors img {
    width:35px;
    height:35px;
    border-radius:50%;
    object-fit:cover;
    cursor:pointer;
    border:2px solid #ddd;
}
.colors img:hover {
    border-color:#c91c1c;
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
<?php if($userName!=""){echo htmlspecialchars($userName);} ?>
</a>
</nav>
</header>
<div class="main-layout">

<main class="content">
<section class="hero">
    <h1><span style="color:#c91c1c">Remise de 30%</span> sur tous les produits</h1>
<p>Offre pour une durée limitée</p>
</section>

<section class="products">
<div class="products-grid">

<?php
$result = $conn->query("SELECT * FROM productshomme");
while ($p = $result->fetch_assoc()):
    $colors = !empty($p['colors']) ? explode(',', $p['colors']) : [];
?>
<div class="product-card">
    <img class="product-image" src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
    <h3 class="product-name"><?= htmlspecialchars($p['name']) ?></h3>
    <span class="price"><?= htmlspecialchars($p['price']) ?> DA</span>

    <?php if(count($colors) > 0): ?>
    <div class="colors">
        <?php foreach($colors as $c): ?>
        <img src="<?= htmlspecialchars(trim($c)) ?>" onclick="this.closest('.product-card').querySelector('img').src=this.src">
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <button class="add-cart"
        data-name="<?= htmlspecialchars($p['name']) ?>"
        data-price="<?= htmlspecialchars($p['price']) ?>"
        data-image="<?= htmlspecialchars($p['image']) ?>">Ajouter au panier</button>

    <button class="remove-cart">Retirer</button>
</div>
<?php endwhile; ?>

</div>
</section>

</main>
</div>

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
function toggleMenu(){
document.getElementById("sideMenu").classList.toggle("active");
}

document.querySelectorAll('.add-cart').forEach(btn=>{
  btn.addEventListener('click',()=>{
    const card = btn.closest('.product-card');
    const product = {
      name: card.querySelector('.product-name').textContent,
      price: card.querySelector('.price').textContent,
      image: card.querySelector('img').src
    };

    fetch('cart_add.php',{
      method:'POST',
      headers:{'Content-Type':'application/json'},
      body:JSON.stringify(product)
    })
    .then(r=>r.json())
    .then(d=>{
      if(d.success){
        document.getElementById('cartCount').textContent = d.count;
      }
    });
  });
});

document.querySelectorAll('.remove-cart').forEach(btn => {
    btn.addEventListener('click', () => {
        const card = btn.closest('.product-card');
        const productName = card.querySelector('.product-name').textContent;
        fetch('cart_remove.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({name: productName})
        })
        .then(r => r.json())
        .then(d => {
            if(d.success){
                document.getElementById('cartCount').textContent = d.count;
            }
        });
    });
});
</script>

</body>
</html>
