<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ASDF PALACE DBMS - Visists Tacker</title>
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
            <nav class="navbar bg-secondary text-uppercase fixed-top" id="mainNav"> <!-- navbar-expand-lg-->>
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
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="visitstracker.php">Visis Tracker</a></li>
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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Visits Tracker</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                     <h2>VIEW VISITS BY :</h2>
                     <br/>   
                     <!-- <h1 >
                         <a style = "text-decoration: underline" href = "visitstracker.php">Date</a>   <a href = "visitstracker2.php">Facility</a>  <a href = "visitstracker3.php">Price</a> 
                        </h1> -->
                     <p id = "p" ></p>
                    
                 

<!-- <form method="post" >
        <input />
        <input type="submit" name="button1" 
                class="button" value="Button1" />
          
    </form> -->
    
    <form method="get">
Start-Date: <input type="date" name="sdate"><br><br>
End-Date: <input type="date" name="edate"><br>

<br>
<label name="facility" for="fac">Facility:</label>

<select class="btn btn-secondary dropdown-toggle" name="fac" id="fac">
    <option value="all">All facilities</option>
  <option value="open">Open facilities</option>
  <option value="reg">Registered facilities</option>

<!-- Facility: <input type="text" name="facility"><br>
Price: <input type="text" name="price"><br> -->

</select> 


<br>
<br>

Minimum Price: <input type="text" name="minp"><br><br>
Maximum Price: <input type="text" name="maxp"><br>
<br>
<br>
<input class="btn btn-secondary btn-xl"  type="submit" name = "button1" value="Load Data"> 
</form>    
                <?php 
                
                if($_GET){
                
                if(isset($_GET['button1'])) {
                    $start_date=  $_GET['sdate'];
                    $end_date=  $_GET['edate'];
                    // if($start_date == ''){

                    //     $start_date = '0000-01-01';
                    // }
                    // if($end_date == ''){
                    //     $end_date = '9999-12-31';
                   // }
                    $fac =  $_GET['fac'];
                    $min = $_GET['minp'];
                    $max = $_GET['maxp'];
                    // if($min == ''){
                    //     $min = '0';
                    // }
                    // if($max == ''){
                    //     $max = '4900000';
                    // }   
                    // echo '<script>alert("'.  $_POST['name'] . ',  '.$_POST['email'].'")</script>';
                    

                    $sql = "
                         select FACILITY_ID,Cost,Entry ,Exitry ,sc.NFC_ID from
                         (select mazi.FACILITY_ID,PLACE_ID ,mazi.NFC_ID, Entry ,Exitry,rs.DATE_TIME  from
                        
                         (select FACILITY_ID ,v.PLACE_ID ,NFC_ID, Entry ,Exitry 
                         from cool_hotel.visit as v 
                         join cool_hotel.host as h 
                         on v.PLACE_ID = h.PLACE_ID
                          ) as mazi 
                        
                         join receive_service as rs
                         on mazi.FACILITY_ID = rs.FACILITY_ID and mazi.NFC_ID = rs.NFC_ID and rs.DATE_TIME = Entry) as n_cost
                         join service_charge as sc
                         on sc.DATE_TIME = n_cost.DATE_TIME and sc.NFC_ID = n_cost.NFC_ID
                      ";

                        if($fac != 'all'){
                            $sql = " \nselect o_f.FACILITY_ID ,Cost,Entry ,Exitry ,NFC_ID from (". $sql;
                                $sql =  $sql . "\n ) as temp join ".$fac."_facilities as o_f on temp.FACILITY_ID = o_f.FACILITY_ID" ;
                               }
                    


                            
                        //where Entry > '2020-04-01 00:00:00' and Entry < '2022-04-01 23:59:59'
                        $where = "where " ;

                        $n = 0;
                        if ($start_date != '' && $end_date != '' ){
                            $where = $where. " Entry > '" .$start_date. "' and Entry < '".$end_date."'";
                            $n += 1;
                        }

                        if ($min != '' && $max != '' ){
                            if ($n == 1){
                                $where =  $where . " and ";
                            }
                            $where = $where. " Cost >= " .$min. " and Cost <= ".$max."";
                            $n +=1;
                        }
                        if($n > 0){
                            $sql = $sql. "\n".$where ;
                        }
                        echo "<script>console.log($sql);</script>";
                        


                        // echo $sql;
                        $result = mysqli_query($conn, $sql);
                        // echo $result;
                        echo '<table class="table table-striped table-hover">
                        <thead>
                        <tr>
                         <th scope="col">#</th>
                          <th scope="col">Facility</th>
                          <th scope="col">Nfc</th>
                          <th scope="col">Entry</th>
                          <th scope="col">Exitry</th>
                          <th scope="col">Cost</th>
                        </tr>
                      </thead>';
                        
                      echo "<tbody>";
                        if (mysqli_num_rows($result) > 0) {
                          // output data of each row    
                          $idx = 1;
                          while($row = mysqli_fetch_assoc($result)) {
                            echo '  <tr>
                                      <th scope="row">'.$idx.'</th>
                                      <td>'.$row["FACILITY_ID"].'</td>
                                      <td>'. $row["NFC_ID"].'</td>
                                      <td>'. $row["Entry"].'</td>
                                      <td>'.$row["Exitry"].'</td>
                                      <td>'.$row["Cost"].'</td>
                                      </tr>';
                            $idx += 1;    
                            // echo "id: " . $row["FACILITY_ID"]." Nfc :". $row["NFC_ID"]. $row["Entry"]. $row["Exitry"]. "<br>";
                          }        
                        } else {
                          echo "0 results";
                        echo'<tr></tr>';
                        }
                        echo "</tbody></table>";
                        
                    }
                    // }
                }
                     ?>






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
                            Iroon Polytechneiou 9
                            <br />
                            15780 Zografou, Athens
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
                    (credit: https://updateyourfooter.com/)
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