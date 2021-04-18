

<html>
    <head>
        <title>Add User</title>
        <link rel="stylesheet" href="AddProduct.css">
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

<?php
$errors = array('N_name'=>'','pwds'=>'', 'pwd'=>'');
$Errors = array('N_name'=>'');
if(isset($_POST['insert']))
{

$Pass=123;
$PSWD = $_POST['pwds'];
$PSWD_ = $_POST['pwd'];


$j=1;
$xml = new DomDocument("1.0" , "UTF-8");

$xml->load('a.xml');
$Nname = $_POST['N_name'];

if(empty($Nname))
{
$errors['N_name'] = 'A product name is missing';
$Errors['N_name'] = 'bad';
}
else
{
$Errors['N_name'] = 'good';
$xpath = new DOMXPATH($xml);

foreach($xpath->query("/root/info[name='$Nname']") as $node)
{

   $node->parentNode->removeChild($node);

}
}
if(empty($_POST['pwds']))
{
$errors['pwds'] = 'A password is missing';
}
else if($Pass!=$PSWD) {
  $errors['pwds'] = 'Password is incorrect';
}


if(empty($_POST['pwd']))
{
$errors['pwd'] = 'A password is missing';
}
else if($Pass!=$PSWD_) {
  $errors['pwd'] = 'Password is incorrect';
}

$xml->formatoutput = true;

if(($Pass==$PSWD && $Pass==$PSWD_)  && ((strpos($Errors['N_name'],'good'))===0))
{
$xml->save('a.xml');
echo "<script> alert('Product was deleted')</script>";
}



}

?>




<!--New Product Type-->
<form method = "POST" action="index.php">

    <h2>Delete Product </h2> <br>
    <div class="NewProductInfo">

    <div class="ProductInfo">
        <h4> Product Information </h4>
        <p>

        </p>

        <p>
            <label for="Name"> Name </label> <br>
            <input type="Name" id="address" value="<?php echo $Nname ?>" id="address" name="N_name"   placeholder="Name of product you would like to delete">
            <div style="color:red;"><?php echo $errors["N_name"]; ?></div>
        </p>

                <!--End of Product List-->

                 <!--Footer-->


    <p>
        <label for="pwd"> Admin Password </label> <br>
        <input type="password"  id="pwd_" name="pwds">
        <div style="color:red;"><?php echo $errors["pwds"]; ?></div>
    </p>
    <p>
        <label for="pwd"> Confirm Admin Password </label> <br>
        <input type="password" id="pwd_" name="pwd">
        <div style="color:red;"><?php echo $errors["pwd"]; ?></div>
    </p>


</div>
    <br>



<!--End of New Product Type-->

         <!--Footer-->

    <div class="bottom">

  <div class="btn-group" style="width:100%">

      <p><button type = "submit"  id="insert" name="insert"  style="width:25%">DELETE</button></p>

    </form>
        <form action = "ProductList.php">
            <p><button type="submit" style="width:25%">Product List</button></p>
        </form>

        <form action = "AddNewProduce.php">
            <p><button type="submit" style="width:25%">Add New Product</button></p>
        </form>


        <form action = "EditProduct.php">
            <p><button type="submit" style="width:25%">Edit Product</button></p>
        </form>



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
