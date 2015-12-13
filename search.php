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
        #image_preview{
        width: 250px;
        height: 230px;
        text-align:center;
        line-height:100px;
        font-weight: bold;
        color: #C0C0C0;
        background-color: #F0E8E0;
        overflow:auto;
        margin-left: 100px;
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
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
    // $("body").addClass('loaded');
 //        $("#output").hide();

 //        $(window).on('beforeunload', function () {
 //            $('body').removeClass('loaded');
 //        });
 //      });

      $body = $("body");
            
      $(document).on({
          ajaxStart: function() { $body.addClass("loading"); },
          ajaxStop: function() { $body.removeClass("loading"); }    
      });
    $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "process.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
            $("#output").html(data);
            },
            error: function() 
            {
            }           
       });
    }));
    $(function() {
    $("#userImage").change(function() {
    $("#output").empty(); // To remove the previous error message
    var file = this.files[0];
    var imagefile = file.type;
    var match= ["image/jpeg","image/png","image/jpg"];
    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
    {
    $('#previewing').attr('src','noimage.png');
    $("#output").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
    return false;
    }
    else
    {
    var reader = new FileReader();
    reader.onload = imageIsLoaded;
    reader.readAsDataURL(this.files[0]);
    }
    });
    });
    function imageIsLoaded(e) {
    $("#userImage").css("color","green");
    $('#image_preview').css("display", "block");
    $('#previewing').attr('src', e.target.result);
    $('#previewing').attr('width', '250px');
    $('#previewing').attr('height', '230px');
    };
    });
</script>
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
                        <h1>Sistem Pencarian Gambar dengan Fitur Deteksi Objek</h1>
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
                        <h3>Please Choose One Image For Samples Query !</h3>
                    </div>
                    <form id="uploadForm" action="process.php" method="post" enctype="multipart/form-data">
                              <div class="col-md-4 col-sm-3">
                        <div class="center">
                            <div class="form-group">
                                <!-- <div id="targetLayer">No Image</div> -->
                                <div id="image_preview"><img id="previewing" src="images/No_available_image.gif" /></div>
                            <!-- <div class="controls">
                                <label class="radio1">
                                <input type="radio" name="image" value="image/query/20.jpg" checked="checked" />Image 1 </label>
                            </div> -->
                        </div>
                         </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-3">
                        <div class="center">
                            <div class="form-group">
                            <input type="file" name="userImage" id="userImage" class="btn btn-primary btn-lg" required />
                            <!-- <div class="controls">
                                <label class="radio1">
                                <input type="radio" name="image" value="image/query/20.jpg" checked="checked" />Image 1 </label>
                            </div> -->
                        </div>
                         </div>
                    </div><!--/.col-md-4-->
              
                    <div class="col-md-4 col-sm-3">
                        <div class="center">
                            <div class="form-group">
                               <!-- <button type="submit" class="btn btn-danger btn-lg">Search</button> -->
                               <input type="submit" class="btn btn-danger btn-lg" value="Search"/>
                    </div>
                        </div>
                    </div><!--/.col-md-4-->
                   
                            <!-- <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <img src="image/query/720.jpg" width="200px" high="150px">
                            <div class="controls">
                                <label class="radio1">
                                <input type="radio" name="image" value="image/query/720.jpg"   />Image 6 </label>
                            </div>
                        </div>
                    </div> --><!--/.col-md-4-->
                   
                    </form>
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
</body>
</html>