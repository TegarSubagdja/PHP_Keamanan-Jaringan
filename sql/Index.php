<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="script.js"></script>
    <title>Web Test</title>
</head>

<body>
    <div class="background-wrap">
        <div class="background"></div>
    </div>

    <form id="accesspanel" action="aman.php" method="post">
        <h1 id="litheader">Login</h1>
        <div class="inset">
            <p>
                <input type="text" name="username" id="email" placeholder="Username">
            </p>
            <p>
                <input type="password" name="password" id="password" placeholder="Password">
            </p>
            <p>
                <input type="text" name="email" id="gmail" placeholder="E-mail">
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