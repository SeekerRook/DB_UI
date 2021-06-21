<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ASDF PALACE DBMS - Views</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="logo.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

   
<!--c0nnection to DB -->
<?php
        $servername = "localhost";
        $username = "danii";
        $password = "dczEKTWPSJRf6z";


        // Create connection
        $conn = mysqli_connect($servername, $username, $password, "cool_hotel");

        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $output = "Connection Successful";
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
        
    ?>

    <!--c0nnection to DB --> 
    <body id="page-top">
        <body id="page-top">
            <!-- Navigation-->
            <nav class="navbar bg-secondary text-uppercase fixed-top" id="mainNav"> <!-- navbar-expand-lg-->
                <div class="container">
                    <a class="navbar-brand js-scroll-trigger" href="#page-top">ASDF Palace DBMS</a>
                    <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">Home</a></li>
                            <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="contact.php">Contact</a></li> -->
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="visitstracker.php">Visits Tracker</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="views.php">Views</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="nfctracker.php">NFC Tracker</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="demographics.php">Demographics</a></li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Masthead-->
 <!-- Contact Section-->
 <br /><br /><br />
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Views</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                 </div>
                 <h1>VIEWS :</h1>
                 <br/>   

                    <form method="get">
                    <h1 >
                     <a  href = "views.php">Sales</a>   <a style = "text-decoration: underline" href = "views2.php">Customers</a> 
                   
                    <input class="btn btn-primary "  type="submit" name = "button1" value="Load Data"> 
                    </h1>
                    </form>
                     <?php 
                
                     if($_GET){
                     
                    //  if(isset($_GET['button1'])) {

     
     
                         // echo '<script>alert("'.  $_POST['name'] . ',  '.$_POST['email'].'")</script>';
                             $sql = "select * from customer_v
                             ";
                             // echo $sql;
                             $result = mysqli_query($conn, $sql);
                             // echo $result;
                             
                             echo '<table class="table table-striped table-hover">
                             <thead>
                             <tr>
                              <th scope="col">#</th>
                               <th scope="col">NFC ID</th>
                               <th scope="col">Name</th>
                               <th scope="col">Surname</th>
                               <th scope="col">Birth Date</th>
                               <th scope="col">Certification</th>
                               <th scope="col">Phone</th>
                               <th scope="col">Email</th>
                             </tr>
                           </thead>';
     
                             $idx = 1;
                             if (mysqli_num_rows($result) > 0) {
                               // output data of each row    
                               while($row = mysqli_fetch_assoc($result)) {
                                //  echo " ID: " . $row["NFC_ID"]." Name :". $row["First_Name"]. " Surname: ".$row["Last_Name"]." Birth Date: ". $row["Birth_Date"]." Certification: ".$row["Certification_ID"]." Phone: ".$row["Telephone"]." Email: ".$row["Email"]. "<br>";
                                 echo '  <tr>
                                 <th scope="row">'.$idx.'</th>
                                 <td>'.$row["NFC_ID"].'</td>
                                 <td>'. $row["First_Name"].'</td>
                                 <td>'. $row["Last_Name"].'</td>
                                 <td>'.$row["Birth_Date"].'</td>
                                 <td>'.$row["Certification_ID"].'</td>
                                 <td>'.$row["Telephone"].'</td>
                                 <td>'.$row["Email"].'</td>
                                 </tr>';
                                 $idx +=1;
                                }        
                             } else {
                               echo "0 results";
                             }
                             echo "</tbody></table>";
                             
                        //  }
                         // }
                     }
                          ?>
                </div>
                </div>
            </div>
        </section>
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            Fransisco la Roche 123
                            <br />
                            38001 Los Hoteles,<br> Santa Cruz de Tenerife, Canarias
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Find Us</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://github.com/SeekerRook/DB_UI"><i class="fab fa-fw fa-github"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Our Team</h4>
                        <p class="lead mb-0">
                            Christoforos Vardakis el18883
                            <br />
                            Stelio Balidis el17893
                            <br />
                            Daniela Stoian el18140
                            
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>
                    Copyright &copy; Your Website
                    <!-- This script automatically adds the current year to your website footer-->
                    <!-- (credit: https://updateyourfooter.com/)-->
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </small>
            </div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
    </html>