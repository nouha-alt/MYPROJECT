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
    <title>SnapStore - Commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <style>

        body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg,#0f172a,#1e3a8a,#3b82f6);
}

.top-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 30px;
    background-color: #131448;
}

.menu-btn {
    font-size: 28px;
    background: none;
    border: none;
    color: white;
    cursor: pointer;
}

.logo {
    font-size: 28px;
    color: white;
    font-weight: bold;
}

.logo span {
    color: rgb(207, 22, 22);
}

.search-box input {
    padding: 8px 120px;
    border-radius: 10px;
    border: none;
    outline: none;
}

.links a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    padding: 8px 14px;
    border-radius: 20px;
    transition: 0.3s;
}

.links a:hover {
    background-color: #f4c430;
    color: #1b1b10;
}

.main-layout {
    display: flex;
}

.side-menu {
    width: 220px;
    background-color: #1a1a34;
    padding: 20px;
    min-height: 100vh;
    display: none;
}

.side-menu.active {
    display: block;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from { transform: translateX(-30px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

.side-menu a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    display: block;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 15px;
    transition: 0.3s;
}

.side-menu a:hover {
    background-color: #f4c430;
    color: #1f2649;
}

.content {
    flex: 1;
    padding: 25px;
}

.hero {
    background: linear-gradient(135deg, #3498db, #2c3e50);
    color: white;
    text-align: center;
    padding: 50px 20px;
    border-radius: 20px;
}



.products {
    margin-top: 40px;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 25px;
}

.product-card {
    background:#fff;
    padding:15px;
    border-radius:15px;
    box-shadow:0 4px 10px rgba(0,0,0,.1);
    text-align:center;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}

.product-card img {
    width: 100%;
    border-radius: 10px;
}

.product-name {
    margin: 12px 0 5px;
    font-size: 18px;
    color: #1f1d42;
}

.price {
    font-size: 18px;
    font-weight: bold;
    color: rgb(207, 22, 22);
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
        <script src="script.js"></script>

<body>

<header class="top-bar">

    <button class="menu-btn" onclick="toggleMenu()">☰</button>

    <div class="logo">Snap<span>Store</span></div>
<nav class="link">
                <a href="commerce2.php"> <span >iscription</span></a>

        <a href="Acheter.php" class="cart-link">Acheter <span class="material-symbols-outlined">shopping_cart</span>
            <span class="cart-count" id="cartCount">0</span>
        </a>
<a href="compte.php" class="account-icon">
  <span class="material-symbols-outlined">account_circle</span>
<?php if($userName!=""){echo htmlspecialchars($userName);} ?>
</a>
</nav>
</header>
<div class="main-layout">
    <aside class="side-menu" id="sideMenu">
        <a href="commerce3.php">Vêtements Femme</a>
        <a href="commercehomme.php">Vêtements Homme</a>
        <a href="Vêtements Enfant.php">Vêtements Enfant</a>
        
    </aside>
<main class="content">

<section class="hero">
    <h1><span style="color:#c91c1c">Remise de 30%</span> sur tous les produits</h1>
<p>Offre pour une durée limitée</p>
</section>
<section class="products">

<div class="products-grid">

<?php
$result = $conn->query("SELECT * FROM products");
while ($p = $result->fetch_assoc()) {
?>
    <div class="product-card">

        <img src="<?php echo htmlspecialchars($p['image']); ?>">

        <h3 class="product-name">
            <?php echo htmlspecialchars($p['name']); ?>
        </h3>

        <div>
            <span class="price">
                <?php echo htmlspecialchars($p['price']); ?> DA
            </span>
        </div>

        <?php
        $colors = [];
        if (!empty($p['colors'])) {
            $colors = explode(',', $p['colors']);
        }
        ?>

        <?php if (count($colors) > 0): ?>
            <div class="colors">
                <?php foreach ($colors as $c): ?>
                    <img src="<?php echo htmlspecialchars(trim($c)); ?>"
                         onclick="this.closest('.product-card').querySelector('img').src=this.src">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

      <button class="add-cart"
            data-name="<?php echo htmlspecialchars($p['name']); ?>"
            data-price="<?php echo htmlspecialchars($p['price']); ?>"
            data-image="<?php echo htmlspecialchars($p['image']); ?>">
            Ajouter au panier
        </button>

        <button class="remove-cart">Retirer</button>

    </div>
<?php } ?>

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
function toggleMenu() {
    document.getElementById("sideMenu").classList.toggle("active");
}
</script>




<script>
function toggleMenu(){
document.getElementById("sideMenu").classList.toggle("active");
}
</script>

<script>
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
</script>

<script>
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

