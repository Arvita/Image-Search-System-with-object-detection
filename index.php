<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IMAGE | Search System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
   <!--  <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> -->
    
    <style>
        #output {
            padding: 43px 99px;
            width: 990px;
            margin: 0 auto;
            background-color: transparent;
            border-radius: 6px;
            padding: 24px 23px 20px;
            position: relative;
            display: block;
        }
        
        /* Start by setting display:none to make this hidden.
           Then we position it in relation to the viewport window
           with position:fixed. Width, height, top and left speak
           for themselves. Background we set to 80% white with
           our animation centered, and no-repeating */
        .modal {
            display:    none;
            position:   fixed;
            z-index:    1000;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: rgba( 255, 255, 255, .8 ) 
                        url('assets/img/gears(1).gif') 
                        50% 50% 
                        no-repeat;
        }
        
        /* When the body has the loading class, we turn
           the scrollbar off with overflow:hidden */
        body.loading {
            overflow: hidden;   
        }
        
        /* Anytime the body has the loading class, our
           modal element will be visible */
        body.loading .modal {
            display: block;
        }
        
    </style>

</head>

<body class="glossed">
    <header id="header" role="banner">
        <div class="container">
            <div id="navbar" class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!-- <li class="active"><a href="#main-slider"><i class="icon-home"></i></a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#about-us">About Us</a></li>
                        <li><a href="#contact">Contact</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </header><!--/#header-->

    <section id="main-slider" class="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <div class="carousel-content">
                        <h1>Image Search System with Object Detection Mechanism</h1>
                        <!-- <p class="lead">Please Select One Image For Samples Query ! free</p> -->
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item">
                <div class="container">
                    <div class="carousel-content">
                        <h1>Sistem Pencarian Gambar  dengan Fitur Deteksi Objek</h1>
                       <!--  <p class="lead">Please Select One Image For Samples Query !</p> -->
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
        <a class="prev" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
        <a class="next" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
    </section><!--/#main-slider-->

    <section id="services">
        <div class="container">
            <div class="box first">
                <div class="row">
                    <div class="center">
                        <table cellpadding="20px" align="center" >
                            <tr>
                            <td>Search Image</td>
                            <td>Input for Query</td>
                            </tr>
                            <tr >
                            <td><a href="search.php"><img src="images/ico/search.png" width="200px" high="150px"></a></td>
                            <td><a href="query.php"><img src="images/ico/Database-Search.ico" width="200px" high="150px"></a></td>
                            </tr>

                        </table><!--/#portfolio-filter-->
                    </div>
                    <!-- <form method="post" action="process.php">  -->
                   
                    <!-- </form> -->
                </div><!--/.row-->
                <div id="output"></div>
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->

    
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 <a target="_blank" href="index.php" title="Image Search System with Object Detection Mechanism">Arvita Agus Kurniasari</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <img class="pull-right" src="images/shapebootstrap.png" alt="ShapeBootstrap" title="ShapeBootstrap">
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    <div class="modal"><!-- Place at bottom of page --></div>
    <script src="assets/js/jquery-2.1.1.min.js"></script>
    <script src="assets/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    <script src="assets/flatui/js/flat-ui.js"></script>
       
    <script type="text/javascript">
        $(document).ready(function() {
        $("body").addClass('loaded');
        $("#output").hide();

        $(window).on('beforeunload', function () {
            $('body').removeClass('loaded');
        });
      });

      $body = $("body");
            
      $(document).on({
          ajaxStart: function() { $body.addClass("loading"); },
          ajaxStop: function() { $body.removeClass("loading"); }    
      });
      
      $(".img-button").click(function() {
          $.ajax({
              url : "process.php",
              data: { 'img': $(this).data("img") },
              // dataType: html,
              type : "post"
          }).done(function(data){
              $("#output").html(data);
              $("#output").show();
          });
          return false;
      });
    </script>
</body>
</html>