<?php
    $pName;
    $pUnitPrice;
    
    $myfile=fopen("addtoCart.xml", "a") or die("Unable to find the path/folder for the accounts");
    
    if (isset($_GET["additem"])){
        $pName="Original Chips";
        $pUnitPrice=1.75;
        $pQuantity=$_GET["pquantity"];
        
        $data=$pName . ' ' . $pUnitPrice . ' ' . $pQuantity .  "\n";

        fwrite($myfile, $data);
    } 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Chips
        </title>
        <link rel="stylesheet" href="ShowProduct.css">
        <script type="text/javascript" src="moreDes.js"></script>
        <script src="https://kit.fontawesome.com/fc09e132f7.js" crossorigin="anonymous"></script>
    </head>

    <body>
         <!--Navigation Bar-->
         <header>
            <div class="wrapper">
                <div class="logo">
                    <a href="index.html"><i class="fas fa-seedling"></i>SOME BRAND</a>
                </div>
                <nav>
                    
                    <a href="aisle.html">Aisles</a>
                    <a href="about.html">About Us</a>
                    <a href="service.html">Services</a>
                    <a id="cartB" href="cart.php"><i class="fas fa-shopping-cart"></i>My Cart</a>
                    <a id="SignB" href="Sign In.php"><i class="far fa-user"></i>Sign In</a> 
                </nav>

            </div>   
        </header>
        <!--End of Navigation Bar-->

        
        <!--Chips-->
        <div class="row">
            <form method="GET">
            <div class="column"> <br>
                <img src="pics/chips.jpg" alt="background-image" weight="300" height="300">
            </div>                
            <div class="column1"> <br> 
                <h2>Original Chips</h2>
                    <h5>The weight is approx. 235 g </h5> <br>

                <div id="fixedP">1.75</div><div id="price">1.75</div>
                    <button onclick="readDescription()" id="minfo">More Description</button> <br>
                    <div id="moreinfo">
                        <h6>Description: SOME BRAND Original Chips</h6>
                        <h6>Storage: Shelf</h6>
                        <h6>Product #: 987-062</h6>
                    </div><br>

                    <label for="quantity">Quantity:</label>
                   <input type="number" id="quantity" value="quantity" onclick="modPrice()" min="0" name="pquantity"> 
                    <button id="additem"  name="additem" onclick="addItem()"> <i class="fas fa-shopping-cart"></i> ADD TO CART </button>
            </div>
            </form>
        </div><br>
        <!--End of Chips-->
        <!--Footer-->
        <div class="bottom">
            <p class="words" style="font-size: larger;">
                Quick Links
    
                <br>
                <p>
                    <a class="contact" href="contact.html"><i class="fas fa-at"></i>Contact Us</a><br>
                    <a href="menu.html"><i class="fas fa-home"></i>Home</a>
                    <a href="about.html"><i class="fas fa-users"></i>Who are we?</a>
                </p>
            </p>
        </div>
        <!--End of Footer-->
    </body>
</html>
