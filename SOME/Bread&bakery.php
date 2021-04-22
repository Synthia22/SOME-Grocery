<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Bread and Bakery
        </title>
        <link rel="stylesheet" href="ShowAisles.css">
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

                    <a href="aisle.php">Aisles</a>
                    <a href="about.html">About Us</a>
                    <a href="service.html">Services</a>
                    <a id="cartB" href="cart.php"><i class="fas fa-shopping-cart"></i>My Cart</a>
                    <a id="SignB" href="signin.php"><i class="far fa-user"></i>Sign In</a>
                    <a id="emB" href="employee.html"><i class="fas fa-id-card-alt"></i>Employees</a>
                </nav>

            </div>
        </header>
        <!--End of Navigation Bar-->

        <!--Bread & Bakery-->
        <div class="aisle">
            <div class="row">

                <div class="column border-light">
                    <a href="naan.php">
                        <div>
                            <img src="pics/naan.jpg" alt="background-image" weight="150" height="120">
                            <h4>Naan</h4> <br>
                            <p>4.29$/unit</p>
                            <h6>One bunch weights approx. 80g </h6>
                        </div>
                    </a> <br>
                </div>
                <?php
                 $xml_=simplexml_load_file("a.xml");
                 ?>

               <?php  for($i=0;$i<$xml_->info->count();$i++){?>
                 <?php if($xml_->info[$i]->Type[0] == "Bread and Bakery")

                 {?>
                <div class="column border-light">





                             <div>
                               <?php $results=$xml_->info[$i]->Image[0];
                               echo '<img src="'.$results.'"height="100" width="100"/>'; ?>
                               <h4><?php echo $xml_->info[$i]->name[0]; ?></h4> <br>
                               <p  style="font-weight:bold ; color:yellowgreen"><?php echo $xml_->info[$i]->Price[0] . "$/unit"; ?></p>
                               <h6><?php echo "The weight is approx. " . $xml_->info[$i]->Weight[0]; ?></h6>

                               <div class="column1">
                                   <br>



                                     <details>
                                     <summary>More Info</summary>
                                       <h6>Description:  <?php echo $xml_->info[$i]->Description[0]; ?></h6>
                                       <h6>Quantity: <?php echo $xml_->info[$i]->Quantity[0]; ?></h6>

                                       <h6>Storage: Pantry</h6>
                                       <h6>Product #: <?php echo  $xml_->info->count()-($xml_->info->count()-$i)+1?></h6>
                                     </details><br>



                                   <button id="additem" onclick="addItem()"> <i class="fas fa-shopping-cart"></i> ADD TO CART </button>

                               </div>

                             </div>

                  <br>
                </div>      <?php } ?>
                   <?php } ?>
            </div>

        </div><br>
        <!--End of Bread & Bakery-->

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
