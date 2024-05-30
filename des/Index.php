<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.js"></script>
    <title>Web Test</title>
    <script>
        function encryptData() {
            var key = CryptoJS.enc.Utf8.parse('12345678'); // DES key must be 8 bytes

            // Encrypt form data
            var usernameField = document.getElementById("username");
            var passwordField = document.getElementById("password");
            var encryptedUsername = CryptoJS.DES.encrypt(usernameField.value, key, {
                mode: CryptoJS.mode.ECB,
                padding: CryptoJS.pad.Pkcs7
            }).toString();
            var encryptedPassword = CryptoJS.DES.encrypt(passwordField.value, key, {
                mode: CryptoJS.mode.ECB,
                padding: CryptoJS.pad.Pkcs7
            }).toString();

            // Encrypt keys
            var encryptedUsernameKey = CryptoJS.DES.encrypt("username", key, {
                mode: CryptoJS.mode.ECB,
                padding: CryptoJS.pad.Pkcs7
            }).toString();
            var encryptedPasswordKey = CryptoJS.DES.encrypt("password", key, {
                mode: CryptoJS.mode.ECB,
                padding: CryptoJS.pad.Pkcs7
            }).toString();

            // Create new hidden fields with encrypted keys and values
            var form = document.getElementById("accesspanel");
            var encryptedUsernameInput = document.createElement("input");
            encryptedUsernameInput.type = "hidden";
            encryptedUsernameInput.name = encryptedUsernameKey;
            encryptedUsernameInput.value = encryptedUsername;

            var encryptedPasswordInput = document.createElement("input");
            encryptedPasswordInput.type = "hidden";
            encryptedPasswordInput.name = encryptedPasswordKey;
            encryptedPasswordInput.value = encryptedPassword;

            // Remove the original fields
            usernameField.remove();
            passwordField.remove();

            // Append new hidden fields to the form
            form.appendChild(encryptedUsernameInput);
            form.appendChild(encryptedPasswordInput);

            return true; // Allow form submission
        }
    </script>
</head>

<body>
    <div class="background-wrap">
        <div class="background"></div>
    </div>

    <form id="accesspanel" action="home.php" method="post" onsubmit="return encryptData()">
        <h1 id="litheader">Login</h1>
        <div class="inset">
            <p>
                <input type="text" name="username" id="username" placeholder="Username">
            </p>
            <p>
                <input type="password" name="password" id="password" placeholder="Password">
            </p>
            <div style="text-align: center;">
                <div class="checkboxouter">
                    <input type="checkbox" name="rememberme" id="remember" value="Remember">
                    <label class="checkbox"></label>
                </div>
                <label for="remember">Remember me for 14 days</label>
            </div>
            <input class="loginLoginValue" type="hidden" name="service" value="login" />
        </div>
        <p class="p-container">
            <input type="submit" name="Login" id="go" value="Authorize">
        </p>
    </form>
</body>

</html>