<html>
<head>
    <title> Delegate edit form</title>
</head>
<body>
    Delegate update form  </p>

    <meta name="viewport" content="width=device-width; initial-scale=1.0">

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />


    <link href='http://fonts.googleapis.com/css?family=Droid+Serif|Ubuntu' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="js/flexslider/flexslider.css" />
    <link rel="stylesheet" href="css/basic-style.css">




    <script src="js/libs/modernizr-2.6.2.min.js"></script>

    </head>

    <body id="home">

        <header class="wrapper clearfix">



            <nav id="topnav" role="navigation">
                <div class="menu-toggle">Menu</div>
                <ul class="srt-menu" id="menu-main-navigation">
                    <li><a href="Swift_Landing.html">Home page</a></li>

        </header>
        </section>

        <style>
            form label {
                display: inline-block;
                width: 100px;
                font-weight: bold;
            }
        </style>
        </ul>

        <?php
        session_start();
        $usernm="root";
        $passwd="";
        $host="localhost";
        $database="swift";

        $Username=$_SESSION['myssession'];



        mysql_connect($host,$usernm,$passwd);

        mysql_select_db($database);

        $sql = "SELECT * FROM usermaster WHERE User_name='$Username'";
        $result = mysql_query ($sql) or die (mysql_error ());
        while ($row = mysql_fetch_array ($result)){

        ?>

        <form action="delegate_update.php" method="post">
            Name
            <input type="text" name="Namex" value="<?php echo $row ['Name']; ?> " size=10>
            Username
            <input type="text" name="Username" value="<?php echo $row ['User_name']; ?> " size=10>
            Password
            <input type="text" name="Password" value="<?php echo $row ['User_password']; ?>" size=17>
            <input type="submit" name="submit" value="Update">
        </form>
        <?php
        }
        ?>
        </p>
    </body>
</html>