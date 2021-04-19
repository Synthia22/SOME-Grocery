<?php

  $Nname=$Dname=$Wname=$Qname=$Pname=$Tname='';
  $errors = array('N_name'=>'', 'W_name'=>'', 'P_name'=>'', 'T_name'=>'', 'pwds'=>'', 'pwd'=>'');
  $Errors = array('N_name'=>'', 'W_name'=>'', 'P_name'=>'', 'T_name'=>'');
if(isset($_POST['insert']))
{

  $Pass=123;
  $PSWD = $_POST['pwds'];
  $PSWD_ = $_POST['pwd'];


$xml = new DomDocument("1.0" , "UTF-8");
$xml->load('a.xml');

if(empty($_POST['N_name']))
{
$errors['N_name'] = 'A product name is missing';
$Errors['N_name'] = 'bad';
}
else
{
$Nname = $_POST['N_name'];
$Errors['N_name'] = 'good';
}

$Dname = $_POST['D_name'];


if(empty($_POST['W_name']))
{
$errors['W_name'] = 'A product weight is missing';
$Errors['W_name'] = 'bad';
}
else
{
$Wname = $_POST['W_name'];
if(!preg_match('/^[1-9][0-9]*$/',$Wname))
{
$errors['W_name'] ='Weight can only be numbers';
$Errors['W_name'] = 'bad';
}
else {
  $Errors['W_name'] = 'good';
}
}


$Qname = $_POST['Q_name'];


if(empty($_POST['P_name']))
{
$errors['P_name'] = 'A product price is missing';
$Errors['P_name'] = 'bad';
}
else
{
$Pname = $_POST['P_name'];
if(!preg_match('/^[0-9]+(\\.[0-9]+)?$/',$_POST['P_name']))
{
$errors['P_name'] ='Price can only be numbers and a decimal';
$Errors['P_name'] = 'bad';
}
else {
  $Errors['P_name'] = 'good';
}
}

if($_POST['T_name']==="selected")
{
$errors['T_name'] ='A product type is missing';
$Errors['T_name'] = 'bad';
}
else
{
$Tname = $_POST['T_name'];
$Errors['T_name'] = 'good';
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


$rootTag = $xml->getElementsByTagName("root")->item(0);


$infoTag = $xml->createElement("info");




$nameTag = $xml->createElement("name", $Nname);
$DiscountTag = $xml->createElement("discount", $Dname);
$WeightTag = $xml->createElement("Weight", $Wname);
$QuantityTag = $xml->createElement("Quantity", $Qname);
$PriceTag = $xml->createElement("Price", $Pname);
$TypeTag = $xml->createElement("Type", $Tname);



$infoTag->appendChild($nameTag);
$infoTag->appendChild($DiscountTag);
$infoTag->appendChild($WeightTag);
$infoTag->appendChild($QuantityTag);
$infoTag->appendChild($PriceTag);
$infoTag->appendChild($TypeTag);

$rootTag->appendChild($infoTag);




if(($Pass==$PSWD && $Pass==$PSWD_)  && ((strpos($Errors['N_name'],'good'))===0) && ((strpos($Errors['W_name'],'good'))===0) && ((strpos($Errors['P_name'],'good'))===0)
&& ((strpos($Errors['T_name'],'good'))===0))
{
$xml->save('a.xml');
echo "<script> alert('Product was created!')</script>";
}

}



?>


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
            <a id="cartB" href="cart.php"><i class="fas fa-shopping-cart"></i>My Cart</a>

            <a id="SignB" href="Sign In.php"><i class="far fa-user"></i>Sign In</a>
            <a id="emB" href="employee.html"><i class="fas fa-id-card-alt"></i>Employees</a>
        </nav>

    </div>


</header>

<!--End of Navigation Bar-->

<!--New Product Type-->
<form method = "POST" action="AddNewProduce.php">

    <h2>New Product </h2> <br>
    <div class="NewProductInfo">

    <div class="ProductInfo">
        <h4> Product Information </h4>
        <p>
            <label for="Name"> Name </label> <br>
            <input type="Name"  id="address" name="N_name" value="<?php echo $Nname ?>">
            <div style="color:red;"><?php echo $errors["N_name"]; ?></div>
        </p>



        <div class="top">
          <div id="Discount">
              <label for="Discount"> Discount, % </label> <br>
              <input type="number" value="0" min="0" name="D_name">
          </div>
            <div id="Weight">
                <label for="Weight"> Weight </label> <br>
                <input type="Weight" id="Weight_" name="W_name" placeholder="g" value="<?php echo $Wname ?>">
                <div style="color:red;"><?php echo $errors["W_name"]; ?></div>
            </div>
        </div>

    <div class="middle">
        <div id="Qte">
            <p>
                <label for="Qte"> Quantity </label> <br> <input type="number" name="Q_name" value="1" min="1" id=QTEs><br>

            </p>

        </div>
        <div id="Price">
            <label for="Price"> Price/Unit </label> <br>
            <input type="Price"  name="P_name" placeholder="$ CAD" id="Price_" value="<?php echo $Pname ?>">
            <div style="color:red;"><?php echo $errors["P_name"]; ?></div>
        </div>
    </div>


    <br><select name="T_name" id="ProductType">
        <option value="selected">Select Product Type</option>
        <option value="Fruits and Vegeteables">Fruits & Vegetables</option>
        <option value="Dairy and Eggs">Dairy & Eggs</option>
        <option value="Bread and Bakery">Bread & Bakery</option>
        <option value="Fish and Seafood">Fish & Seafood</option>
        <option value="Dessert and Snacks">Dessert & Snacks</option>
        <option value="Meat and Poultry">Meat & Poultry</option>
    </select>
    <div style="color:red;"><?php echo $errors["T_name"]; ?></div>

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

      <p><button type = "submit"  name="insert" value="insert" style="width:25%">ADD</button></p>
    </form>
        <form action = "ProductList.php">
            <p><button type="submit" style="width:25%">Product List</button></p>
        </form>

      </form>
          <form action = "DeleteProduct.php">
              <p><button type="submit" style="width:25%">Delete Product</button></p>
          </form>

          <form action = "EditProduct.php">
              <p><button type="submit" style="width:25%">Edit Product</button></p>
          </form>

<br>

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
