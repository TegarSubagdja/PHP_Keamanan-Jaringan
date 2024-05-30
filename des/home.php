<?php
function decrypt_des($data)
{
    $key = '12345678'; // DES key must be 8 bytes
    $cipher = "DES-ECB";
    $options = 0;
    $decrypted_data = openssl_decrypt($data, $cipher, $key, $options);
    return $decrypted_data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key = '12345678'; // DES key must be 8 bytes
    $cipher = "DES-ECB";
    $options = 0;

    // Decrypt keys
    $decrypted_keys = [];
    foreach ($_POST as $encrypted_key => $encrypted_value) {
        $decrypted_key = openssl_decrypt($encrypted_key, $cipher, $key, $options);
        $decrypted_value = openssl_decrypt($encrypted_value, $cipher, $key, $options);
        $decrypted_keys[$decrypted_key] = $decrypted_value;
    }

    $decrypted_username = $decrypted_keys['username'];
    $decrypted_password = $decrypted_keys['password'];

    // Simple authentication check (for demo purposes)
    if ($decrypted_username === 'admin' && $decrypted_password === 'password') {
        // Authentication successful
    } else {
        // Authentication failed, redirect to login
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            background: #1b1b1b;
            color: #FFF;
            font-family: "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            font-size: 12px;
            line-height: 1;
            margin: 0;
            padding: 0;
        }

        .background-wrap {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
        }

        .background {
            background: url('https://myrror.co/etc/419062774_1385132057.jpg');
            background-position: center;
            background-size: cover;
            filter: blur(10px);
            height: 105%;
            position: relative;
            width: 105%;
            right: -2.5%;
            left: -2.5%;
            top: -2.5%;
            bottom: -2.5%;
        }

        #accesspanel {
            background: #111;
            border: 1px solid #191919;
            border-radius: .4em;
            box-shadow: 0 5px 10px 5px rgba(0, 0, 0, 0.2);
            height: auto;
            width: 70%;
            margin: 5% auto;
            padding: 20px;
        }

        #litheader {
            font-family: 'Audiowide', sans-serif;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #FFbb00;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        table,
        th,
        td {
            border: 1px solid #555;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
        }

        tr:nth-child(even) {
            background-color: #2c2c2c;
        }

        tr:nth-child(odd) {
            background-color: #222;
        }

        tr:hover {
            background-color: #444;
        }
    </style>
</head>

<body>
    <div class="background-wrap">
        <div class="background"></div>
    </div>

    <div id="accesspanel">
        <h1 id="litheader">Machine Learning Classification Models</h1>
        <div class="inset">
            <table>
                <thead>
                    <tr>
                        <th>Model</th>
                        <th>Description</th>
                        <th>Accuracy</th>
                        <th>Use Case</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Logistic Regression</td>
                        <td>A statistical model that in its basic form uses a logistic function to model a binary dependent variable.</td>
                        <td>85%</td>
                        <td>Binary classification</td>
                    </tr>
                    <tr>
                        <td>Decision Tree</td>
                        <td>A decision support tool that uses a tree-like model of decisions and their possible consequences.</td>
                        <td>75%</td>
                        <td>Classification and regression</td>
                    </tr>
                    <tr>
                        <td>Random Forest</td>
                        <td>An ensemble learning method for classification, regression and other tasks that operates by constructing a multitude of decision trees at training time.</td>
                        <td>90%</td>
                        <td>Classification and regression</td>
                    </tr>
                    <tr>
                        <td>Support Vector Machine (SVM)</td>
                        <td>A supervised learning model with associated learning algorithms that analyze data used for classification and regression analysis.</td>
                        <td>88%</td>
                        <td>Classification and regression</td>
                    </tr>
                    <tr>
                        <td>Neural Network</td>
                        <td>A series of algorithms that endeavor to recognize underlying relationships in a set of data through a process that mimics the way the human brain operates.</td>
                        <td>92%</td>
                        <td>Complex pattern recognition</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>