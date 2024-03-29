<?php require_once 'signin.php' ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> 
            Sign In
        </title>
        <link rel="stylesheet" href="Sign In.css">
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
                    <a id="cartB" href="cart.php"><i class="fas fa-shopping-cart"></i>My Cart</a>
                    <a id="SignB" href="Sign In.php"><i class="far fa-user"></i>Sign In</a>
                </nav>

            </div>
        </header> <br>
        <!--End of Navigation Bar-->

        <!--Sign In-->
        <h2>Sign In</h2>

        <h5> In order to access your account and take advantage of all your personalized benefits, please Sign In!</h5> <br>

        <div class="box">
            <form class="form" id="login" method="POST"> 
                <div class="form__message form_message--error">
                    <?php
                        if (isset($_SESSION['erroremail'])){
                            echo $_SESSION['erroremail'];
                        }
                    ?>
                </div>
                <div class="form__input-group">
                    <input type="text"  name="email" class="form__input" autofocus placeholder="Email">
                    <div class=" = " form__inpute-error-message></div>
                </div>
                <div class="form__input-group">
                    <input type="password"  name="password" class="form__input" autofocus placeholder="Password">
                    <div class=" = " form__inpute-error-message></div>
                </div>

                <button class="form_button"  name="signBtn" type="submit"> SIGN IN </button><br> <br>
                <p class="form_text">
                    <a href="#" class="form__link"  id="linkNewPassword">Forgot your password?</a>
                </p>
                <p class="form__text">
                    <a class="form__link" href="./" id="linkCreateAccount">Dont have an account?Create account</a>
                </p>
            </form>
            <form class="form form--hidden" method="POST" id="createAccount">
                <h1 class="form__title">Create Account</h1>
                <div class="form__message form__message--error"></div>
                <div class="form__input-group">
                    <input type="text" name="firstN" id="signupFirstName" class="form__input" autofocus placeholder="First Name">
                    <div class=" form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="text" name="lastN" id="signupLastName" class="form__input" autofocus placeholder="Last Name">
                    <div class=" form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="text" name="A_SU" id="signupAddress" class="form__input" autofocus placeholder="Address">
                    <div class=" form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="text" id="signupCity" class="form__input" autofocus placeholder="City">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <select type="text" id="signupProvince" class="form__input" autofocus placeholder="Province">
                        <option value selected="selected">Province</option>
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
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="text" id="signupPhoneNumber" class="form__input" autofocus placeholder="Phone Number">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="text" name="email" id="signupEmail" class="form__input" autofocus placeholder="Email">
                    <div class="form__input-error-message">
                    </div>
                </div>
                <div class="form__input-group">
                    <input type="text" id="signupConfirmEmail" class="form__input" autofocus placeholder="Confirm Email">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="text" name="passWord" id="signupPassword" class="form__input" autofocus placeholder="Password">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="text" id="signupConfirmPassword" class="form__input" autofocus placeholder="Confirm Password">
                    <div class="form__input-error-message"></div>
                </div>
                <button class="form__button" type="submit" name="createAc" id="button">Create an account </button>
             
                <p class="form__text">
                    <a class="form__link" href="./" id="linkLogin">Already have an account? Sign in</a>
                </p>
            </form> 
            <form class="form--hidden" id="forgotPassword">
                <h1 class="form__title">Forgot Password</h1>
                <div class="form__message form__message--error"></div>
                <div class="form__input-group">
                    <input type="text" id="enterEmail" class="form__input" autofocus placeholder="Email">
                    <div class="form__input-error-message"></div>
                </div>
                <button class="form__button" type="submit" id="forgetButton">Send Confirmation</button>

                <p class="form__text">
                    <a class="form__link" href="Sign In.html" id="linkLogin">Remember Password?Click here</a>
                </p>
                </form>
</div>

                <script type="text/javascript" src="Sign Up.js"></script>
</body>
</html>
