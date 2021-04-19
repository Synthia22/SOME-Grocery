<?php
    global $lines; 
    $lines= array();
    $index=0;
    $MyFile=fopen("addtoCart.xml", "r") or die("Unable to find the path/folder for the accounts");

    while (!feof($MyFile)) {
        $item = fgets($MyFile);
        if($item != ""){
            $lines[$index]=$item;
            $infos = explode(" ", $lines[$index]);
            $lines[$index] = $infos;
            $index=$index+1;
        }
    }
    fclose($MyFile);

    /* $myFile=fopen("addtoCart.xml", "w") or die("Unable to find the path/folder for the accounts");
    fwrite($myFile,"");
    fclose($myFile); */ 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SOME Shopping Cart</title>
    <link rel="stylesheet" href="cart.css">
    <script src="https://kit.fontawesome.com/fc09e132f7.js" crossorigin="anonymous"></script>
    <script src="cart.js" async></script>
</head>
 
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
<body>

 
    <!--Cart--> 

       <div class="small-container cart-page">
           <form method="GET" action="cart.php">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Unit Price ($)</th>
                    <th>Quantity</th>
                    <th>Subtotal ($)</th>
                </tr>

                    <?php foreach($lines as $line): ?>
                    <?php 
                        global $unitPRICE;
                        $unitPRICE=(float) $line[1];
                        global $quantity;
                        $quantity=(float) $line[2];    
                    ?>
                    <tr>
                        <td> <?php echo "<p>".$line[0]."</p>"; ?> <br> 
                            <button class="btn" type="button">remove</button> 
                        </td>
                        <td> 
                            <div id="fixedP">
                                <?php echo "<p >".$unitPRICE."</p>"; ?> 
                            </div>
                        </td>
                        <td> <input type="number" id="quantity" class="qty" oninput="modPrice()" value="<?php echo $quantity;?>" ></td>
                        <td > 
                            <div id="price" onload="ModPrice(<?php echo $unitPRICE; ?>)"> 
                                <?php 
                                    $fPrice=$unitPRICE*$quantity;
                                    echo $fPrice;
                                ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </table>
        </form>
           
        <div class="total-price" id="output">
        <table> 
            <tr>
            <td>Subtotal</td>
            <td>$25.00</td> 
            </tr>
            <tr>
            <td>QST</td>
            <td>$3.00</td>
                    </tr> 
            <tr>  <td>GST</td>
                <td>$2.00</td>
            </tr>
        <tr>
            <td>Total</td>
            <td>$30.00</td>
        </tr>
        </table>
        </div>

          </div>
        <!--End of Cart-->
      
        <!--Footer-->
        <div class="bottom">
        <p class="words" style="font-size: larger;">
            Quick Links

            <br>
            <p>
                <a class="contact" href="contact.html"><i class="fas fa-at"></i>Contact Us</a>
            
            <br>
            <a href="index.html"><i class="fas fa-home"></i>Home</a> 
            <a href="about.html"><i class="fas fa-users"></i>Who are we?</a>
            </p> 
        </p>
    </div>
    <!--End of Footer-->
</body>

</html>
