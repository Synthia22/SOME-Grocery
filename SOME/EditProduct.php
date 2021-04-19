<?php

$xml = new DOMDocument('1.0', 'utf-8');
$Aname=$Nname=$Dname=$Wname=$Qname=$Pname=$Tname='';

$errors = array('amanya'=>'','namanya'=>'', 'wamanya'=>'', 'pamanya'=>'', 'tamanya'=>'', 'qamanya'=>'', 'Damanya'=>'', 'pwds'=>'', 'pwd'=>'');
$Errors = array('amanya'=>'','namanya'=>'', 'wamanya'=>'', 'pamanya'=>'', 'tamanya'=>'', 'qamanya'=>'', 'Damanya'=>'');
$xml->formatOutput = true;
$xml->preserveWhiteSpace = false;
$xml->load('a.xml');

if (isset($_POST['edit']))
{
$Pass=123;
$PSWD = $_POST['pwds'];
$PSWD_ = $_POST['pwd'];


//Get item Element

if(empty($_POST['amanya']))
{
$errors['amanya'] = 'A product ID is missing or ID is not postive';
$Errors['amanya'] = 'bad';
}
else
{
$Aname = $_POST['amanya'];
if(!preg_match('/^[1-9][0-9]*$/',$Aname))
{
$errors['amanya'] ='ID can only be postive numbers';
$Errors['amanya'] = 'bad';
}

else {

$element = $xml->getElementsByTagName('info')->item($_POST['amanya']-1);
//Load child elements
$name = $element->getElementsByTagName('name')->item(0);
$discount = $element->getElementsByTagName('discount')->item(0);
$weight = $element->getElementsByTagName('Weight')->item(0);
$quantity = $element->getElementsByTagName('Quantity')->item(0);
$price = $element->getElementsByTagName('Price')->item(0);
$type = $element->getElementsByTagName('Type')->item(0);


//Replace old elements with new
$element->replaceChild($name, $name);
$element->replaceChild($discount, $discount);
$element->replaceChild($quantity, $quantity);
$element->replaceChild($type, $type);
$element->replaceChild($weight, $weight);
$element->replaceChild($price, $price);
$Errors['amanya'] = 'good';


if(empty($_POST['namanya']))
{
$errors['namanya'] = 'A product name is missing';
$Errors['namanya'] = 'bad';
}
else
{
$Nname=$_POST['namanya'];
$name->nodeValue = $Nname;
$Errors['namanya'] = 'good';
}
//$name->nodeValue = $_POST['namanya'];

if(empty($_POST['Damanya']))
{
$errors['Damanya'] = 'A product discount is missing';
$Errors['Damanya'] = 'bad';
}
else
{
$Dname=$_POST['Damanya'];
$discount->nodeValue = $Dname;
$Errors['Damanya'] = 'good';
}

if(empty($_POST['qamanya']))
{
$errors['qamanya'] = 'A product qunatity is missing';
$Errors['qamanya'] = 'bad';
}
else
{
$Qname=$_POST['qamanya'];
$quantity->nodeValue = $Qname;
$Errors['qamanya'] = 'good';
}



if($_POST['tamanya']==="selected")
{
$errors['tamanya'] ='A product type is missing';
$Errors['tamanya'] = 'bad';
}
else
{
$Tname = $_POST['tamanya'];
$type->nodeValue = $Tname;
$Errors['tamanya'] = 'good';
}
//$type->nodeValue = $_POST['tamanya'];

if(empty($_POST['wamanya']))
{
$errors['wamanya'] = 'A product weight is missing';
$Errors['wamanya'] = 'bad';
}
else
{
$Wname = $_POST['wamanya'];
if(!preg_match('/^[1-9][0-9]*$/',$_POST['wamanya']))
{
$errors['wamanya'] ='Weight can only be numbers';
$Errors['wamanya'] = 'bad';
}
else {
$weight->nodeValue = $Wname;
$Errors['wamanya'] = 'good';
}
}
//$weight->nodeValue = $_POST['wamanya'];

if(empty($_POST['pamanya']))
{
$errors['pamanya'] = 'A product price is missing';
$Errors['pamanya'] = 'bad';
}
else
{
$Pname = $_POST['pamanya'];
if(!preg_match('/^[0-9]+(\\.[0-9]+)?$/',$_POST['pamanya']))
{
$errors['pamanya'] ='Price can only be numbers and a decimal';
$Errors['pamanya'] = 'bad';
}
else {
$price->nodeValue = $Pname;
$Errors['pamanya'] = 'good';
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

}
}

if(($Pass==$PSWD && $Pass==$PSWD_)  && ((strpos($Errors['namanya'],'good'))===0) && ((strpos($Errors['wamanya'],'good'))===0) && ((strpos($Errors['tamanya'],'good'))===0)
&& ((strpos($Errors['amanya'],'good'))===0) && ((strpos($Errors['pamanya'],'good'))===0) && ((strpos($Errors['qamanya'],'good'))===0) && ((strpos($Errors['Damanya'],'good'))===0))
{
htmlentities($xml->save('a.xml'));
echo "<script> alert('Product was edited!')</script>";
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
<form method = "POST" action="Edit.php">

    <h2>Edit Product </h2> <br>
    <div class="NewProductInfo">

    <div class="ProductInfo">
        <h4> Product Information </h4>
        <p>
            <label for="ID"> ID </label> <br>
            <input type=ID id="address" name="amanya" value="<?php echo $Aname ?>" placeholder="ID of product you would like to Edit">
            <div style="color:red;"><?php echo $errors["amanya"]; ?></div>

        </p>

        <p>
            <label for="Name"> Name </label> <br>
            <input type="Name" id="address" value="<?php echo $Nname ?>" id="address" name="namanya" placeholder="Edit Name">
            <div style="color:red;"><?php echo $errors["namanya"]; ?></div>

        </p>



        <div class="top">
          <div id="Discount">
              <label for="Discount"> Discount, % </label> <br>
              <input type="number" value="<?php echo $Dname ?>" name="Damanya" placeholder="Edit Discount">
                <div style="color:red;"><?php echo $errors["Damanya"]; ?></div>
          </div>
            <div id="Weight">
                <label for="Weight"> Weight </label> <br>
                <input type="Weight" value="<?php echo $Wname ?>" id="Weight_" name="wamanya" placeholder="Edit Weight">
                <div style="color:red;"><?php echo $errors["wamanya"]; ?></div>
            </div>
        </div>

    <div class="middle">
        <div id="Qte">
            <p>
                <label for="Qte"> Quantity </label> <br>
                <input type="number" value="<?php echo $Qname ?>"  name="qamanya"  id=QTEs placeholder="Edit Quantity">
                  <div style="color:red;"><?php echo $errors["qamanya"]; ?></div>
                <br>


            </p>

        </div>
        <div id="Price">
            <label for="Price"> Price/Unit </label> <br>
            <input type="Price"   value="<?php echo $Pname ?>" name="pamanya" placeholder="Edit Price" id="Price_">
            <div style="color:red;"><?php echo $errors["pamanya"]; ?></div>
        </div>
    </div>


    <br><select name="tamanya" id="ProductType">
        <option value="selected">Select Product Type</option>
        <option value="Fruits and Vegeteables">Fruits & Vegetables</option>
        <option value="Dairy and Eggs">Dairy & Eggs</option>
        <option value="Bread and Bakery">Bread & Bakery</option>
        <option value="Fish and Seafood">Fish & Seafood</option>
        <option value="Dessert and Snacks">Dessert & Snacks</option>
        <option value="Meat and Poultry">Meat & Poultry</option>
    </select>
    <div style="color:red;"><?php echo $errors["tamanya"]; ?></div>

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

      <p><button type = "submit"  id="edit" name="edit"  style="width:25%">EDIT</button></p>

    </form>
        <form action = "ProductList.php">
            <p><button type="submit" style="width:25%">Product List</button></p>
        </form>


          <form action = "AddNewProduce.php">
              <p><button type="submit" style="width:25%">Add New Product</button></p>
          </form>


          <form action = "DeleteProduct.php">
              <p><button type="submit" style="width:25%">Delete Product</button></p>
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
