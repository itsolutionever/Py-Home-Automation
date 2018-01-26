<?php
ob_start();
session_start();

        if(isset($_GET['page']))
        {
            $page=$_GET['page'];
        }
        else
        {
            $page=null;
        }
?>
<html lang="en">

<head>
    <title>Py Home Automation</title>

    <link rel="shortcut icon" href="img/Icon-homehome.png" />

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- Google icon CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.min.css" rel="stylesheet">

    

</head>

<body id="page-top">

    <?php
        if(isset($_GET['page']))
        {
            $page=$_GET['page'];
            $filename = 'pages/'.$page.'.php';
        }
        else
        {
            $filename = 'index.php';
        }

                if (file_exists($filename)) {
                    
                    
                    
                    
                    if($page!="user" && $page!="seller" && $page!="admin") 
                    { 
                        include('pages/core/nevigation.php');
                        include('pages/core/header.php');
                    }
                    
                    if(isset($_GET['page']))
                    {
                        include('pages/'.$page.'.php');
                    }

                    if($page!="user" && $page!="seller" && $page!="admin") 
                    { 
                        include('pages/core/about.php');
                        include('pages/core/services.php'); 
                        include('pages/core/source.php');
                        include('pages/core/team.php');
                        include('pages/core/contact.php');
                        include('pages/core/footer.php');
                    }
 
                } else {
                    
                    include('pages/error.php');
                }
            
        
        
        
    ?>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>
<?php 
ob_end_flush();
?>
</body>

</html>
