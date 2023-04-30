<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indieabode</title>
</head>

<style>
    <?php
    include 'public/css/cart.css';
    ?>
</style>

<body>

    <?php
    include 'includes/navbar.php';
    ?>
    

    <div class="page-topic">
        <h1>-Cart-</h1>
    </div>

    



<?php if ($this->IsCartempty) { ?>
  <div class="column">
  <?php $total=0; ?> 
  <?php foreach ($this->cart as $cartdet) { ?>
  <a href="/indieabode/game?id=<?= $cartdet['gameID'] ?>" style="text-decoration: none">
            <div class="game1">
                <div class="logo1"> 
                    <img src="/indieabode/public/uploads/games/cover/<?= $cartdet['gameCoverImg'] ?>" alt="" width="90px" height="90px" style="border-radius:10px";>      
                </div>
                <div class="g1name">
                  <h3><?= $cartdet['gameName'] ?></h3>    
                </div>
    </a>            
                <div class="g1price">
                  <h3>$ <?= $cartdet['gamePrice'] ?></h3>
                </div>
                     
            </div>   
        
        <div class="remove1">
                  <form action="/indieabode/cart/remove?id=<?= $cartdet['gameID'] ?>" method="POST" id="form">
                  <button type="submit" name="submit" id="rem-btn">Remove</button><br><br>
                  </form>
                </div>  
        <?php $total+=$cartdet['gamePrice'] ?>  
    <?php } ?>

</div>
  
  
  
  <div class="column2">
  <div class="summary">
    <h2><label for="summary">Order Summary</label></h2>


    <div class="price">
      <label for="price">Price</label>
      <div class="pricev">
        <label for="pricev">$<?php echo $total ?></label>
      </div>
      <label for="dis">Sale Discount</label>
      <div class="disv">
        <label for="disv">&nbsp;&nbsp;&nbsp;&nbsp;$0</label>
      </div>
      <hr style="width:130%;text-align:left;margin-top:5px;margin-bottom:10px">
      <label for="total"><b>Total</label>
      <div class="pricev">
        <label for="total">$<?php echo $total ?></label></b>
      </div>
    </div>
    <a href="/indieabode/checkout">
      <div class="checkout">
        <button class="checkout1">Checkout</button>
      </div>
    </a>
  </div>
</div>
                
                <?php } else { ?>
                
                  <div class="emptycart">
  <div class="emptyTitle"><h2>My Cart</h2>
    <hr width="65%" style="border-top: 2px solid black">
  </div>
  <div class="EmptyImage">
    <img src="/indieabode/public/images/cart/empty2.png" width="650px" height="650px">
  </div>
</div>
                <?php } ?>




   

    <script src="<?php echo BASE_URL; ?>public/js/sidefilter.js"></script>
    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbar.js"></script>
    <?php } else { ?>
        <script src="<?php echo BASE_URL; ?>public/js/navbarcopy.js"></script>
    <?php } ?>
    
</body>

</html>