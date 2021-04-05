function check() {
    const firstName = document.getElementById('signupFirstName');
    var lastName = document.getElementById('signupLastName');
    var address = document.getElementById('signupAddress');
    var city = document.getElementById('signupCity');
    var phoneNumber = document.getElementById('signupPhoneNumber');
    var email = document.getElementById('signupEmail');
    var confirmEmail = document.getElementById('signupConfirmEmail');
    var password = document.getElementById('signupPassword');
    var confirmPassword = document.getElementById('signupConfirmPassword');
    const numbers = /(?=.\d)/
    const lower = /(?=.[a-z])/
    const upper = /(?=.[A-Z])/
    const special = /(?=.[!@#$%^&*])/
    const M_numbers = numbers.test(password.value);
    const M_lower = lower.test(password.value);
    const M_upper = upper.test(password.value);
    const M_special = special.test(password.value);
    var errorPlease = false;

    if (firstName.value === '') {
        alert("Please enter a valid first Name");
        firstName.focus();
        return false;
    }
    else if (lastName.value === '') {
        alert("Please enter a valid last Name");
        lastName.focus();
        return false;
    }
    else if (address.value === '') {
        alert("Please enter a valid address");
        address.focus();
        return false;
    }
    else if (city.value === '') {
        alert("Please enter a valid city");
        city.focus();
        return false;
    }
    else if (phoneNumber.value === '') {
        alert("Please enter a valid phone number")
        province.focus();
        return false;
    }
    else if (phoneNumber.value.match(/^[+][(]{0,1}[0-9]{1,3}[)]{0,1}[-\s./0-9]$/g) == false) {
        alert("Your number look weird try again wrong format")
        phoneNumber.focus();
        return false;
    }
    else if (email.value === '') {
        alert("Please enter a valid email");
        email.focus();
        return false;
    }
    else if (email.value.match(/^[^\s@]+@[^\s@]+$/) == false) {
        alert("You call that a email try again");
        email.focus();
        return false
    }
    else if (confirmEmail.value === '') {
        alert("Please enter the same email");
        confirmEmail.focus();
        return false;
    }
    else if (confirmEmail.value !== email.value) {
        alert("The emails don't match")
        return false;
    }
    else if (password.value === '') {
        alert("Please enter a password");
        password.focus();
        return false;
    }
     
   
    else if (confirmPassword.value === '') {
        alert("Please enter a confirm password");
        confirmPassword.focus();
        return false;
    }
    else if (confirmPassword.value !== password.value) {
        alert("The password dont match")
        return false;
    }

    if (password.value.length < 8) {
        alert('The password must be minimum 8 characters long')
        return false
    }
    else if (password.value.length >= 8) {

        if (M_numbers === false) {
            alert("The password must contains at least 1 number");
            return false
        }
        else if (M_lower === false) {
            alert("The password must contains at least 1 lowercase letter");
            return false
        }
        else if (M_upper === false) {
            alert('The password must contains at least 1 Uppercase letter');
            return false
        }
        else if (M_special === false) {
            alert('The password must contains at least 1 special character');
            return false
        }
    }

    if(errorPlease == false) {
        alert('Account created, bitch!');
        return true;
    }
}



function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector(".form__message");

    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");
    const newPasswordForm = document.querySelector("#forgotPassword");
    const createButton = document.querySelector("#button")
    const forgetButtonMade = document.querySelector("#forgetButton");

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
        newPasswordForm.classList.add("form--hidden");
 
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("form--hidden");
        createAccountForm.classList.add("form--hidden");
        newPasswordForm.classList.add("form--hidden");
    });

    document.querySelector("#linkNewPassword").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.add("form--hidden");
        newPasswordForm.classList.remove("form--hidden");

    });

    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupUsername" && e.target.value.length > 0 && e.target.value.length < 10) {
                setInputError(inputElement, "Username must be at least 10 characters in length");
            }
        });

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    });
    createButton.addEventListener('click', (e) => {

        if (check() === false) {
            alert("Missing input you blind");
        }
    });

    forgetButtonMade.addEventListener('click', e => {

        if (document.querySelector("#enterEmail").value == '') {
            alert("Put something or get out");
            document.querySelector("#enterEmail").focus();
            e.preventDefault();
        }
        else {
            alert("congradulation you can spell");
            e.preventDefault();
        }
    });
 });  
