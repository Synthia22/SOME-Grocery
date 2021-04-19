<?php
    $pName;
    $pUnitPrice;
    
    $myfile=fopen("addtoCart.xml", "a") or die("Unable to find the path/folder for the accounts");
    
    if (isset($_GET["additem"])){
        $pName="Chicken Thighs";
        $pUnitPrice=2.99;
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
        Chicken Thighs
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
                <a id="cartB" href="cart.html"><i class="fas fa-shopping-cart"></i>My Cart</a>
                <a id="SignB" href="Sign In.php"><i class="far fa-user"></i>Sign In</a>
            </nav>

        </div>
    </header>
    <!--End of Navigation Bar-->
    <!--Chicken Thighs-->
    <div class="row">
        <div class="column">
            <br>
            <img src="photos/Chicken-Thighs.jpg" alt="background-image" weight="300" height="300">
        </div>
        <div class="column1">
            <br>
            <h2>Back Attached Fresh Chicken Thighs</h2>
            <h5>The weight is approx. 300g </h5> <br>

            <div id="fixedP">2.99</div> <div id="price">2.99</div>
            <button onclick="readDescription()" id="minfo">More Description</button> <br>
            <div id="moreinfo">
                <h6>Description: Cook time is 30 minutes in conventional oven and 10 minutes on Barbeque.</h6>
                <h6>Storage: Freezer</h6>
                <h6>Product #: 987-056</h6>
            </div><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" value="quantity" min="0" onclick="modPrice()" name="pquantity">
            <button id="additem" name="additem" onclick="addItem()"> <i class="fas fa-shopping-cart"></i> ADD TO CART </button>
        </div>

    </div><br>
    <!--End of Chicken Thighs-->
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
