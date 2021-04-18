
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Product List
        </title>
        <link rel="stylesheet" href="ProductList.css">
        <script src="https://kit.fontawesome.com/fc09e132f7.js" crossorigin="anonymous"></script>


    </head>
    <style>
    .btn-group button {
      background-color: #4CAF50; /* Green background */
      border: 1px solid green; /* Green border */
      color: white; /* White text */
      padding: 10px 24px; /* Some padding */
      cursor: pointer; /* Pointer/hand icon */
      float: left; /* Float the buttons side by side */
    }

    /* Clear floats (clearfix hack) */
    .btn-group:after {
      content: "";
      clear: both;
      display: table;
    }

    .btn-group button:not(:last-child) {
      border-right: none; /* Prevent double borders */
    }

    /* Add a background color on hover */
    .btn-group button:hover {
      background-color: #3e8e41;
    }
    </style>


    <body>
    <form  method="POST" action="ProductList.php">
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
                    <a id="SignB" href="Sign In.html"><i class="far fa-user"></i>Sign In</a>
                    <a id="emB" href="employee.html"><i class="fas fa-id-card-alt"></i>Employees</a>
                </nav>

            </div>
        </header>
        <!--End of Navigation Bar-->

        <!--Product List-->



      <table  style border="border">
      <caption>Product List</caption>
      <tr class="prop">
          <th>ID</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Product Type</th>
          <th>Weight, lbs</th>
          <th>Price/Unit</th>
          <th>Discount, %</th>
      </tr>


 <?php
  $xml_=simplexml_load_file("a.xml");
  ?>

<?php  for($i=0;$i<$xml_->info->count();$i++){?>

        <tr>
          <th><?php echo  $xml_->info->count()-($xml_->info->count()-$i)+1?></th>
          <th><?php echo $xml_->info[$i]->name[0]; ?></th>
          <th><?php echo $xml_->info[$i]->Quantity[0]; ?></th>
          <th><?php echo $xml_->info[$i]->Type[0]; ?></th>
          <th><?php echo $xml_->info[$i]->Weight[0]; ?></th>
          <th><?php echo $xml_->info[$i]->Price[0]; ?></th>
          <th><?php echo $xml_->info[$i]->discount[0]; ?></th>
        </tr>
<?php } ?>




</table>

</form>


        <!--End of Product List-->

         <!--Footer-->

    <div class="bottom">

   <div class="btn-group" style="width:100%">



  <form action = "AddNewProduce.php">
      <p><button type="submit" style="width:33.33333%">Add New Product</button></p>
  </form>

  <form action = "DeleteProduct.php">
      <p><button type="submit" style="width:33.33333%">Delete Product</button></p>
  </form>

  <form action = "EditProduct.php">
      <p><button type="submit" style="width:33.33333%">Edit Product</button></p>
  </form>
      </div>

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
