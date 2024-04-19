<?php
include 'header.php';
?>
</head>
<body class="text-center">
<form class="form-signin" action="../controllers/auth.php" method="POST">
    <img class="mb-4" src="../../public/assets/images/logo_ksd_2.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="user[email]" class="form-control" placeholder="Email address" required
           autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="user[password]" class="form-control" placeholder="Password"
           required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
</form>
</body>
</html>