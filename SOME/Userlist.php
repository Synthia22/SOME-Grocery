<?php require_once 'Userlist.php' ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> 
            UserList
        </title>
        <link rel="stylesheet" href="Userlist.css">
        <script type = "text/javascript"  src = "Userlist.js" ></script>
        <script src="https://kit.fontawesome.com/fc09e132f7.js" crossorigin="anonymous"></script>
    </head>

    <body onload="alert(' !!!!WARNING!!!!    \nDeletion of an user is irreversible')">
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
       <?php 
           if (file_exists('Accounts.xml')) {
            $xml = simplexml_load_file('Accounts.xml');
            echo "<div id = 'Yaha'>\n";
            echo "<form><p>\n";
            echo "<table id= 'myTable' name ='myTable' style border='border'>\n";
            echo "<caption>User list</caption>\n";
            echo "<tr class='prop'>\n";
            echo "<th>First Name</th>\n";
            echo "<th>Last Name</th>\n";
            echo "<th>Email Address</th>\n";
            echo "<th>Phone Number</th>\n";
            echo "<th>Edition</th>\n";
            echo "</tr>\n";
            $indi = 1;
            foreach ($xml->user as $user) {
                echo "<tr id='row-$indi'>\n";
                echo "<td>".$user->name."</td>\n";
                echo "<td>".$user->lastname."</td>\n";
                echo "<td>".$user->email."</td>\n";
                echo "<td>".$user->number."</td>\n";
                echo "<td style='display:none'>".$user->city."</td>\n";
                echo "<td style='display:none'>".$user->address."</td>\n";
                echo "<td style='display:none'>".$user->code."</td>\n";
                echo "<td style='display:none'>".$user->region."</td>\n";
                echo "<td type='password' style='display:none'>".$user->password."</td>\n";
                echo "<p><td><input type = 'button'  value = 'Edit' onclick=\"change($indi)\"/></td></p>\n";
                echo "</tr>\n";
                $indi++;
             }
             echo "</table>\n</p>\n";
             echo "<p><input type = 'button' value = 'Add' id ='Add' onclick=\"unHideAdd()\"/></p></br>";
             echo "<p><input type = 'button' value = 'Delete' id ='efface' onclick=\"deleteUser()\"/></p></br>";
             echo "</form>\n";
             echo "</div>\n";

        } else {
            exit('Failed to open Accounts.xml.');
        }

        ?>
         <div id = "Editing" style="display: none;">
        <h2>EDIT</h2> <br>
    <div class="personalinfo">
        <h4> Edit User's Information </h4>
        <form action = "Userlist.php">
        <div class="Name">
                <div id="fN">
                    <input type="text" id="voir" name="voir" value="0" style="display: none;" >
                    <input type="password" id="mdp" name="mdp" value="0" style="display: none;">
                    <label for="fname"> First Name </label> <br>
                    <input type="fname" id="fname" name="fname"> 
                </div>
                <div id="lN">
                    <label for="lname"> Last Name </label> <br>
                    <input type="text" id="lname" name="lname"> 
                </div>
        </div> 
    </div><br>

    <div class="contactInfo">
        <h4> Contact Information </h4>
        <p>
            <label for="address"> Address </label> <br>
            <input type="address" id="address" name="address">
        </p>
        
        <div class="top">
            <div id="ct">
                <label for="city"> City  </label> <br>
                <input type="city" id="city" name="city">
            </div>
            <div id="pc">
                <label for="postalCode"> Postal Code </label> <br>
                <input type="postalCode" id="postalCode" name="postalCode">
            </div>
        </div> 

    <div class="middle">
        <div id="pv">
            <p>
                <label for="province"> Province </label> <br>
                <select name="province" id="province">
                    <option value selected="selected">Select your province</option>
                    <option value="ab">Alberta</option>
                    <option value="bc">British Columbia</option>
                    <option value="mb">Manitoba</option>
                    <option value="nb">New Brunswick</option>
                    <option value="nl">Newfoundland and Labrador</option>
                    <option value="nt">Northwest Territories</option>
                    <option value="ns">Nova Scotia</option>
                    <option value="nu">Nunavut </option>
                    <option value="on">Ontario</option>
                    <option value="pe">Prince Edward Island</option>
                    <option value="qc">Quebec</option>                           
                    <option value="sk">Saskatchewan</option>
                    <option value="yt">Yukon</option>
                </select>
            </p>
        </div>
        <div id="pn">
            <label for="pnumber"> Phone Number </label> <br>
            <input type="tel" id="pnumber" name="pnumber">
        </div>
    </div>
    
    <div class="bottomp">
        <div id="em">
            <label for="email"> Current Email </label> <br>
            <input type="text" id="email" name="email">
        </div>
        <div id="cem">
            <label for="cemail"> New Email </label> <br>
            <input type="text" id="cemail" name="cemail">
        </div>
    </div>

    <p>
        <label for="pwd"> Current Password </label> <br>
        <input type="password" id="pwd" name="pwd">
    </p>
    <p>
        <label for="cpwd"> New Password </label> <br>
        <input type="password" id="cpwd" name="cpwd">
    </p>
    
        <p><input type = "submit"  value = "Save" onclick="bringBack()"/></p>
      </form>
      <?php
      $users = simplexml_load_file('Accounts.xml');
      $index =$_REQUEST['voir']-1;
      if(isset($_REQUEST['fname'])){
      $users->user[$index]->name = $_REQUEST['fname'];
      $users->user[$index]->lastname = $_REQUEST['lname'];
      $users->user[$index]->email = $_REQUEST['cemail'];
      $users->user[$index]->number = $_REQUEST['pnumber'];
      $users->user[$index]->city = $_REQUEST['city'];
      $users->user[$index]->address = $_REQUEST['address'];
      $users->user[$index]->code = $_REQUEST['postalCode'];
      $users->user[$index]->password = $_REQUEST['cpwd'];
      $users->asXML('Accounts.xml');}
      ?>
</div>
</div>
<div id="Appending" style="display: none;"><h2>New User</h2> <br>
    <div class="personalinfo">
        <h4> User's Information </h4>
        <form action = "Userlist.php">
        <div class="Name">
                <div id="fN">
                    <label for="fname"> First Name </label> <br>
                    <input type="text" id="fname2" name="fname2"> 
                </div>
                <div id="lN">
                    <label for="lname"> Last Name </label> <br>
                    <input type="text" id="lname2" name="lname2"> 
                </div>
        </div> 
    </div><br>

    <div class="contactInfo">
        <h4> Contact Information </h4>
        <p>
            <label for="address"> Address </label> <br>
            <input type="text" id="address2" name="address2">
        </p>
        
        <div class="top">
            <div id="ct">
                <label for="city"> City  </label> <br>
                <input type="text" id="city2" name="city2">
            </div>
            <div id="pc">
                <label for="postalCode"> Postal Code </label> <br>
                <input type="postalCode" id="postalCode2" name="postalCode2" placeholder="i.e: A2F 9K7">
            </div>
        </div> 

    <div class="middle">
        <div id="pv">
            <p>
                <label for="province"> Province </label> <br>
                <select name="province2" id="province2">
                    <option value selected="selected">Select your province</option>
                    <option value="ab">Alberta</option>
                    <option value="bc">British Columbia</option>
                    <option value="mb">Manitoba</option>
                    <option value="nb">New Brunswick</option>
                    <option value="nl">Newfoundland and Labrador</option>
                    <option value="nt">Northwest Territories</option>
                    <option value="ns">Nova Scotia</option>
                    <option value="nu">Nunavut </option>
                    <option value="on">Ontario</option>
                    <option value="pe">Prince Edward Island</option>
                    <option value="qc">Quebec</option>                           
                    <option value="sk">Saskatchewan</option>
                    <option value="yt">Yukon</option>
                </select>
            </p>
        </div>
        <div id="pn">
            <label for="pnumber"> Phone Number </label> <br>
            <input type="tel" id="pnumber2" name="pnumber2" placeholder="222-222-2222">
        </div>
    </div>
    
    <div class="bottomp">
        <div id="em">
            <label for="email"> Email </label> <br>
            <input type="text" id="email2" name="email2"placeholder="i.e: example@yahoo.com">
        </div>
        <div id="cem">
            <label for="cemail"> Confirm Email </label> <br>
            <input type="text" id="cemail2" name="cemail2">
        </div>
    </div>

    <p>
        <label for="pwd"> Password </label> <br>
        <input type="password" id="pwd2" name="pwd2">
    </p>
    <p>
        <label for="cpwd"> Confirm Password </label> <br>
        <input type="password" id="cpwd2" name="cpwd2">
    </p>
    
        <p><input type="button" value="Add User" onclick="save()"></p>
      </form>
      
</div>
</div>

<div id = "Deleting" style="display: none;">
        <h2>Which user do you want to delete ?(Enter a number)</h2> <br>
    <div class="personalinfo">
        <form action = "Userlist.php">

    <div class="contactInfo">
        <p>
            <label for="del"> Number of user </label> <br>
            <input type="text" id="del" name="del">
        </p>

    
    
        <p><input type = "submit"  value = "Delete" onclick="deleteUser2()"/></p>
      </form>
      <?php
      $u = simplexml_load_file('Accounts.xml');
      if(isset($_REQUEST['del'])){
          if(strcmp ("",$_REQUEST['del'])!=0){
        $doigt =$_REQUEST['del']-1;
        unset($u->user[$doigt]);
      $u->asXML('Accounts.xml');
          }
    }
      ?>
</div>
</div>
</div>
          <br>
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
        </body>
</html>
