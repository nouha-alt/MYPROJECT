<?php
session_start();
$conn = new mysqli("localhost","root","", "inscription");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$cart      = $_SESSION['cart'] ?? [];
$userName  = $_SESSION['user_name'] ?? "";
$userEmail = $_SESSION['user_email'] ?? "";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone     = $_POST['phone'] ?? '';
    $address   = $_POST['address'] ?? '';
    $payment   = $_POST['paymentMethod'] ?? '';
    $card      = $_POST['cardNumber'] ?? '';
    $transaction = $_POST['transaction'] ?? '';
    $products  = json_encode($cart);

    $stmt = $conn->prepare("INSERT INTO commandes (user_name, user_email, phone, address, products, payment_method, card_number, transaction_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $userName, $userEmail, $phone, $address, $products, $payment, $card, $transaction);
    if($stmt->execute()) {
        $message = "Commande enregistrée avec succès!";
        $_SESSION['cart'] = [];
        $cart = [];
    } else {
        $message = "Erreur lors de l'enregistrement de la commande!";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page d'achat - SnapStore</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
<style>
body { 
    font-family: Arial, sans-serif; 
    background: #f5f5f5;
     margin:0; 
    }
header {
     background: #131448;
      color:white;
       padding:15px 30px; 
    }
header .header-container {
     display:flex; 
     justify-content:space-between;
      align-items:center; 
    }
header .logo {
     font-size: 28px; 
     color: white;
      font-weight: bold; 
    }
header .logo span { 
    color: #b53340ff; 
}
header nav a { 
    color: white;
     text-decoration: none;
      font-weight: bold; 
      margin-left:20px;
       padding: 8px 14px; 
       border-radius:20px;
        transition:0.3s;
     }
header nav a:hover {
     background-color:#fff700; 
     color:#1b1b10; 
    }
main {
     padding:20px;
      max-width:900px;
       margin:auto;
     }
h2 {
     color:#131448; 
     margin-top:30px;
     }
.cart-item { 
    background:white;
     padding:15px;
      border-radius:10px; 
      margin-bottom:15px; 
      box-shadow:0 2px 8px rgba(0,0,0,0.1);
       display:flex;
        align-items:center; 
        gap:15px;
     }
.cart-item img {
     width:80px;
      height:80px;
       object-fit:cover;
        border-radius:10px;
     }
.cart-item select { 
    padding:5px;
     margin-top:5px; 
    }
form {
     background:white;
      padding:20px;
       border-radius:15px;
        box-shadow:0 2px 10px rgba(0,0,0,0.1);
         margin-top:20px;
         }
input, textarea, select { 
    width:100%; 
    padding:10px;
     margin:8px 0;
      border-radius:5px; 
      border:1px solid #ccc; 
    }
button {
     background:#1f1d42;
      color:white;
       padding:12px;
        border:none; 
        border-radius:8px;
         cursor:pointer;
          width:100%;
           font-size:16px;
         }
button:hover {
     background:#c91c1c; 
    }
.section-title {
     margin-bottom:15px; 
    }
.remove-btn { 
    color:red; 
    cursor:pointer;
     font-weight:bold; 
     margin-left:10px;
     }
.remove-btn:hover { 
    color:darkred; 
}
footer {
     text-align:center; 
     padding:20px;
      background:#131448;
       color:white; 
       margin-top:30px; 
    }
.message { 
    text-align:center;
     color:green; 
     font-weight:bold; 
     margin-top:10px;
      }
</style>
</head>
<body>
<header>
    <div class="header-container">
        <div class="logo">Snap<span>Store</span></div>
        <nav>
            <a href="commerce1.php">Home</a>
            <a href="compt.php">
                <span class="material-symbols-outlined">account_circle</span>
<?php echo htmlspecialchars($userName); ?>
            </a>
        </nav>
    </div>
</header>

<main>
<?php if($message) echo "<div class='message'>$message</div>"; ?>

<div id="cartContainer">
<?php if(empty($cart)): ?>
    <p>Vous n'avez sélectionné aucun produit.</p>
<?php else: ?>
    <?php foreach($cart as $index => $item): ?>
        <div class="cart-item" data-index="<?php echo $index; ?>">
            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
            <div>
                <p><?php echo htmlspecialchars($item['name']); ?>
                    <span class="remove-btn" onclick="removeFromCart(<?php echo $index; ?>)">&times;</span>
                </p>
                <p>Prix: <?php echo htmlspecialchars($item['price']); ?> DA</p>
                <?php if(isset($item['type']) && $item['type']=='shoes'): ?>
                    <label>Taille:</label>
                    <select onchange="updateOption(<?php echo $index; ?>, this.value)">
                        <option value="">Sélectionnez la taille</option>
                        <?php for($i=36;$i<=42;$i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                <?php else: ?>
                    <label>Âge:</label>
                    <select onchange="updateOption(<?php echo $index; ?>, this.value)">
                        <option value="">Sélectionnez l'âge</option>
                        <option>2-3</option>
                        <option>4-5</option>
                        <option>6-7</option>
                        <option>8-9</option>
                    </select>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>

<h2 class="section-title">Informations personnelles</h2>
<form id="checkoutForm" method="POST" action="">
    <input type="text" name="fullName" placeholder="Nom complet" value="<?php echo htmlspecialchars($userName); ?>" readonly>
    <input type="tel" name="phone" placeholder="Numéro de téléphone" required>
    <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($userEmail); ?>" readonly>
    <input type="text" name="address" placeholder="Adresse complète" required>
    <textarea name="notes" placeholder="Notes supplémentaires (facultatif)" rows="3"></textarea>

    <h2 class="section-title">Informations de paiement</h2>
    <select name="paymentMethod" required>
        <option value="">Choisir le mode de paiement</option>
        <option value="cash">Paiement à la livraison</option>
        <option value="card">Carte bancaire</option>
    </select>
    <input type="text" name="cardNumber" placeholder="Numéro de carte (si applicable)">
    <input type="text" name="transaction" placeholder="Numéro de transaction / reçu (si applicable)">
    <button type="submit">Confirmer la commande</button>
</form>

</main>

<footer>
    © 2024 SnapStore. Tous droits réservés.
</footer>

<script>
let cart = <?php echo json_encode($cart); ?>;

function renderCart(){
    const container = document.getElementById('cartContainer');
    container.innerHTML = '';
    if(cart.length === 0){
        container.innerHTML = "<p>Vous n'avez sélectionné aucun produit.</p>";
        return;
    }
    cart.forEach((item,index)=>{
        const div = document.createElement('div');
        div.classList.add('cart-item');
        div.innerHTML = 
            <img src="${item.image}" alt="${item.name}">
            <div>
                <p>${item.name} <span class="remove-btn" onclick="removeFromCart(${index})">&times;</span></p>
                <p>Prix: ${item.price} DA</p>
            </div>;
        container.appendChild(div);
    });
}

function removeFromCart(index){
    cart.splice(index,1);
    renderCart();
}

function updateOption(index,value){
    cart[index].option = value;
}

renderCart();
</script>
</body>
</html>
