function validateUsername() {
  document.getElementById("usernameError").innerHTML = "";
  var username = document.getElementById("username").value;
  var usernameRegex = /^[a-zA-Z0-9]{3,}$/;
  if (!usernameRegex.test(username)) {
    document.getElementById("usernameError").innerHTML = `
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Username must be at least 3 characters
      </div>
    `;
    document.getElementById("submitButton").disabled = true;
  } else {
    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("submitButton").disabled = false;
  }
}
function validateLastname() {
  document.getElementById("lastnameError").innerHTML = "";
  var lastname = document.getElementById("lastname").value;
  var lastnameRegex =
    /^[a-zA-Z0-9\sàáảãạăắằẳẵặâấầẩẫậèéẻẽẹêềếểễệìíỉĩịòóỏõọôốồổỗộơớờởỡợùúủũụưứừửữựỳýỷỹỵđ]{3,}$/;

  if (!lastnameRegex.test(lastname)) {
    document.getElementById("lastnameError").innerHTML = `
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Last name must be at least 3 characters
      </div>
    `;
    document.getElementById("submitButton").disabled = true;
  } else {
    document.getElementById("lastnameError").innerHTML = "";
    document.getElementById("submitButton").disabled = false;
  }
}

function validateAddress() {
  document.getElementById("addressError").innerHTML = "";
  var address = document.getElementById("address").value;

  if (!address.trim()) {
    document.getElementById("addressError").innerHTML = `
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">×</button>
              Address is required
          </div>
      `;
    document.getElementById("submitButton").disabled = true;
  } else {
    document.getElementById("addressError").innerHTML = "";
    document.getElementById("submitButton").disabled = false;
  }
}

function validatePassword() {
  document.getElementById("passwordError").innerHTML = "";
  var password = document.getElementById("password").value;
  var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
  if (password.length < 6 || !passwordRegex.test(password)) {
    document.getElementById("passwordError").innerHTML = `
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Password must be at least 6 characters
      </div>
    `;
    document.getElementById("submitButton").disabled = true;
  } else {
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("submitButton").disabled = false;
  }
}

function validateConfirmPassword() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmPassword").value;
  var confirmPasswordError = document.getElementById("confirmPasswordError");
  if (password !== confirmPassword) {
    confirmPasswordError.innerHTML = `
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Re-enter the password does not match
      </div>
    `;
    document.getElementById("submitButton").disabled = true;
  } else {
    confirmPasswordError.innerHTML = "";
    document.getElementById("submitButton").disabled = false;
  }
}

function validateEmail() {
  document.getElementById("emailError").innerHTML = "";
  var email = document.getElementById("email").value;
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (email === "" || !emailRegex.test(email)) {
    document.getElementById("emailError").innerHTML = `
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">×</button>
      Enter a valid email address
    </div>
  `;
    document.getElementById("submitButton").disabled = true;
  } else {
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("submitButton").disabled = false;
  }
}

function validatePhone() {
  var phone = document.getElementById("phone").value;
  var phoneRegex = /^0[0-9]{9}$/;
  var phoneError = document.getElementById("phoneError");
  if (!phoneRegex.test(phone)) {
    phoneError.innerHTML = `
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Invalid phone number!
      </div>
    `;
    document.getElementById("submitButton").disabled = true;
  } else {
    phoneError.innerHTML = "";
    document.getElementById("submitButton").disabled = false;
  }
}
function validateCheckbox() {
  var agreeCheckbox = document.getElementById("agree-term");
  var submitButton = document.getElementById("submitButton");

  if (agreeCheckbox.checked) {
    submitButton.disabled = false;
  } else {
    alert("Bạn phải đồng ý với các điều khoản dịch vụ trước khi đăng ký.");
    submitButton.disabled = true;
  }
  return agreeCheckbox.checked;
}

function validateForm() {
  validateUsername();
  validatePassword();
  validateConfirmPassword();
  validateEmail();
  validatePhone();
  validateCheckbox();
  return document.getElementById("submitButton").disabled === false;
}
