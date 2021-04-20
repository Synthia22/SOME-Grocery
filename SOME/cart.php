<?php
    session_start();

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

    if(isset($_GET['checkOUT'])){
        $myFile=fopen("addtoCart.xml", "w") or die("Unable to find the path/folder for the accounts");
        fwrite($myFile,"");
        fclose($myFile);
        $totsp=$_GET['EnDPRICE'];
        $_SESSION['totalPrice']=(float)$totsp;
        header("Location: http://localhost/SOME/payment.php");
    }
     
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
           <form method="GET" action="cart.php">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Unit Price ($)</th>
                        <th>Quantity</th>
                        <th>Subtotal ($)</th>
                    </tr>

                    <?php foreach($lines as $line): ?>
                    <form method="GET" action="nextpage">
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
                                    <input type="text" name="FIXEDP" value="<?php echo $unitPRICE; ?>" readonly> 
                                </div>
                            </td>
                            <td> <input type="number" id="quantity" class="qty" oninput="modPrice(this.form)" value="<?php echo $quantity;?>" ></td>
                            <td > 
                                <div> 
                                    <input id="price"type="text" name="price" value="<?php echo $unitPRICE*$quantity; ?>" readonly>
                                </div>
                            </td>
                        </tr>
                    </form>
                    <?php endforeach; ?>   
                </table>
            </form>
           
            <div class="total-price" id="output">
            <table> 
                <tr>
                    <td>Subtotal ($)</td>
                    <td> 
                        <div> 
                            <?php
                                global $TOTal;
                                $TOTal=0.0;
                                foreach ($lines as $line){
                                    $uPRICE=(float) $line[1];
                                    $q=(float) $line[2];
                                    $TOTal+=($uPRICE*$q);
                                }
                            ?>
                            <input id="subtotal" value="<?php echo $TOTal; ?>" type="text" name="total" onload="subTotal()" readonly>
                        </div> 
                    </td> 
                </tr>
                <tr>
                    <td>QST</td>
                    <td> 
                        <div>
                            <?php
                                global $TOTal;
                                $TOTal=0.0;
                                global $qst;
                                foreach ($lines as $line){
                                    $uPRICE=(float) $line[1];
                                    $q=(float) $line[2];
                                    $TOTal+=($uPRICE*$q);
                                    $qst= ($TOTal*0.099);
                                    $qst=round($qst,2,PHP_ROUND_HALF_UP);
                                }
                            ?>
                            <input id="QST" value="<?php echo $qst; ?>" type="text" name="total" onload="subTotal()" readonly>
                        </div>
                    </td>
                </tr> 
                <tr>  
                    <td>GST</td>
                    <td>
                        <div>
                            <?php
                                    global $TOTal;
                                    $TOTal=0.0;
                                    global $qst;
                                    foreach ($lines as $line){
                                        $uPRICE=(float) $line[1];
                                        $q=(float) $line[2];
                                        $TOTal+=($uPRICE*$q);
                                        $gst= $TOTal*0.05;
                                        $gst=round($gst,2,PHP_ROUND_HALF_UP);
                                    }
                                ?>
                            <input id="GST" value="<?php echo $gst; ?>" type="text" name="total" onload="subTotal()" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>
                        <div>
                            <?php
                                    global $TOTal;
                                    $TOTal=0.0;
                                    global $qst;
                                    foreach ($lines as $line){
                                        $uPRICE=(float) $line[1];
                                        $q=(float) $line[2];
                                        $TOTal+=($uPRICE*$q);
                                        $gst= ($TOTal*0.05);
                                        $qst= ($TOTal*0.099);
                                        $finalTOTAL=$gst+$qst+$TOTal;
                                        $finalTOTAL=round($finalTOTAL,2,PHP_ROUND_HALF_UP);
                                    }
                                ?>
                            <input id="ENDPRICE" value="<?php echo $finalTOTAL; ?>" type="text" name="EnDPRICE" onload="subTotal()" readonly>
                        </div>
                    </td>
                </tr>
                <tr> <button name="checkOUT"> <i class="fas fa-shopping-cart"></i> CHECK OUT </button> </tr>
            </table>
        </form>
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
