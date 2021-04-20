<?php

session_start();
global $totalPrice;
$totalPrice="";
if(isset($_SESSION['totalPrice'])){
    $totalPrice=$_SESSION['totalPrice'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Payment
        </title>
        <link rel="stylesheet" href="payment.css">
        <script src="https://kit.fontawesome.com/fc09e132f7.js" crossorigin="anonymous"></script>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> 
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
                    <a id="SignB" href="Sign In.html"><i class="far fa-user"></i>Sign In</a> 
                    
                </nav>

            </div>   
        </header> <br>
        <!--End of Navigation Bar-->


        <!--Payment info-->
            <div class="row">
                <div class="col-75">
                    <div class="container">
                        <form method="POST" action="sent.php" > <!--action="mailer/mailerTemplate.php"-->
                            
                            <div class="row">
                                <div class="col-50">
                                    <h3>Billing Address</h3>
                                    <label for="username"><i class="fas fa-user"></i>Full Name</label>
                                    <input type="text" required="required" id="username" name="name" placeholder="First and Last Name">
                                    <label for="email"><i class="far fa-envelope"></i>Email Address</label>
                                    <input type="email" required="required" id="email" name="email" placeholder="hello@example.com">
                                    <label for="address"><i class="fas fa-home"></i>Home Address</label>
                                    <input type="text" required="required" id="address" name="address" placeholder="123 Example Street">
                                    <label for="City"><i class="fas fa-city"></i>City</label>
                                    <input type="text" required="required" id="city" name="city" placeholder="Montreal">
                                    
                                    <div class="row">
                                        <div class="col-50">
                                            <label for="province">Province</label>
                                            <input type="text" required="required" id="province" name="province" placeholder="QC">
                                        </div>
                                        <div class="col-50">
                                            <label for="ZIP">Postal Code</label>
                                            <input type="text" required="required" id="zip" name="zip" placeholder="A1B 2C4">
                                        </div>
                                    </div>   
                                </div>

                                <div class="col-50">
                                    <h3>Payment</h3>
                                    <label for="cards">Accepted Payments</label>
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fab fa-cc-apple-pay" style="color:black;"></i>
                                    </div>

                                    <label for="cname">Name on Card</label>
                                    <input type="text" required="required" id="cname" name="cname" placeholder="First and Last Name">
                                    <label for="cnum">Credit Card Number</label>
                                    <input type="text" required="required" id="cnum" name="cnum" placeholder="1111 2222 3333 4444">
                                    
                                    <div class="row">
                                        <div class="col-50">
                                            <label for="expDate">Expiry Date</label>
                                            <input type="text" required="required" id="exp" name="exp" placeholder="MM/YY">
                                        </div>
                                        <div class="col-50">
                                            <label for="cvv">CVV</label>
                                            <input type="text" required="required" id="cvv" name="cvv" placeholder="123">
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <label>
                                <input type="checkbox" checked="checked" name="addressbtn"> Shipping address is same as billing address
                            </label>
                            <input type="submit" value="Confirm Order" class="btn">
                        </form>
                        
                    </div>
                </div>


                <div class="col=25">
                    <div class="container">
                        <h4>
                            Price
                        </h4>
                        <p><?php 
                        echo $totalPrice;
                        ?></p>
                    </div>

                </div>
            </div>
        <!--End of Payment-->


        <!--Footer-->
        <div class="bottom">
            <p class="words" style="font-size: larger;">
                Quick Links

                <br>
                <p>
                    <a class="contact" href="contact.html"><i class="fas fa-at"></i>Contact Us</a><br>
                    <a href="index.html"><i class="fas fa-home"></i>Home</a>
                    <a href="about.html"><i class="fas fa-users"></i>Who are we?</a>
                </p>
            </p>
        </div>
        <!--End of Footer-->
    </body>
</html>