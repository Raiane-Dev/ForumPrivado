<!DOCTYPE html>
<html>
<head>
    <title>Private Forum</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div class="header">
        <div class="menu-area">
            <img src="<?php echo INCLUDE_PATH ?>images/logo.png" />
        </div>
        <div class="menu-area-two">
            <nav>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH ?>topics">Topics</a></li>
                    <li><a href="<?php echo INCLUDE_PATH ?>posts">Docs</a></li>
                    <li><a href="<?php echo INCLUDE_PATH ?>profile?general">Profile</a></li>
                    <li><a href="<?php echo INCLUDE_PATH ?>access?cadastrar">Register</a></li>
                </ul>
            </nav>
        </div>
        <div class="menu-area-three">
            <a href="<?php echo INCLUDE_PATH ?>access?login" class="button" href="">Fazer Login</a>
            <a href="<?php echo INCLUDE_PATH ?>profile?general"><span class="background-icon"><i data-feather="user"></i></span></a>
        </div>
    </div>
</header>