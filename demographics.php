<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ASDF PALACE DBMS - Demographics</title>
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
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Demographics</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <h1>Select Data to Display:</h1>
                <br/>   
                <br/>
                
                <html>  
<head></head>  
<!-- <title>Static Dropdown List</title>    -->
<form method="get">
Type:
<select  class="btn btn-secondary dropdown-toggle"  name = "Query" id = "Query">  
  <option value="q1">Most Visited Places</option>
  <option value="q2">Most Visited Facilities</option>  
  <option value="q3">Most Used Facilities</option>  
 </select>
 <br><br>
Period: 
<select  class="btn btn-secondary dropdown-toggle"  name = "time_p" id = "periods">  
  <option value="01-00-00">Last Year</option> 
  <option value="00-01-00">Last Month</option>  
 </select>
 <br><br>
Age: 
<select  class="btn btn-secondary dropdown-toggle"  name = "age" id = "Age">  
  <option value="kiddos">20-40</option> 
  <option value="boomers">41-60</option>  
  <option value="geezers">61+</option>  
 </select>
 <br>
 <br>
<!-- Time_Period: <input type="text" name="time_p"><br> -->
<input class="btn btn-primary btn-xl" type="submit"value = "Show Statistics"name = "covid">
</form>
 
</body>  
<html> 

                <?php 
                
                if($_GET){
                $today = date("Y-m-d");
                $cur_date = date_create($today);
                
                $time_period = $_GET['time_p'];
                $temp_p = date_create($time_period);
                $diff_p = date_diff($cur_date,$temp_p); 
                $diff_p_str =  $diff_p->format('%Y-%M-%D');
                $tmpmin;
                $tmpmax;
                if(isset($_GET['covid'])) {
                    if($_GET['age'] == 'kiddos'){                        
                        $tmpmin = date('0020-00-00');
                        $tmpmax = date('0040-00-00');
                    }
                    else if($_GET['age'] == 'boomers'){
                        $tmpmin = date('0041-00-00');
                        $tmpmax = date('0060-00-00');
                    }
                    else if($_GET['age'] == 'geezers'){
                        $tmpmin = date('0061-00-00');
                        $tmpmax = $today;
                        
                    }



                        $targetmin = date_create($tmpmin);
                        $targetmax = date_create($tmpmax);
                        
                        
                        $intervalmin = date_diff($cur_date,$targetmin);
                        $intervalmax = date_diff($cur_date,$targetmax);

                        $diffmin =  $intervalmin->format('%Y-%M-%D');
                        $diffmax =  $intervalmax->format('%Y-%M-%D');
                        
                    
                    


                    // echo "c.Birth_Date > '".$diff."' and c.Birth_Date < '".$today."') as ola";
                        if($_GET['Query'] == 'q1'){
                    // echo '<script>alert("'.  $_POST['name'] . ',  '.$_POST['email'].'")</script>';
                        $q1 = "select  distinct (PLACE_ID) ,COUNT(Entry) OVER (PARTITION BY PLACE_ID)  as entries from
                        (select c.Birth_Date ,v.NFC_ID , PLACE_ID ,Entry 
                        from visit as v 
                        join customer as c
                        on c.NFC_ID = v.NFC_ID 
                        where c.Birth_Date >= '".$diffmax."' and c.Birth_Date <= '".$diffmin."' and Entry >= '".$diff_p_str."') as ola
                        order by entries desc
                        " ;
                        $result = mysqli_query($conn, $q1);

                        echo '<table class="table table-striped table-hover">
                        <thead>
                        <tr>
                         <th scope="col">#</th>
                         <th scope="col">Place</th>
                         <th scope="col">Entries</th>
                        </tr>
                      </thead>';
                            $idx = 1;
                        if (mysqli_num_rows($result) > 0) {
                          // output data of each row
                          while($row = mysqli_fetch_assoc($result)) {
                            // echo " Nfc :". $row["PLACE_ID"]. $row["entries"]. "<br>";
                            echo '
                            <th scope="row">'.$idx.'</th>

                            <td>'. $row["PLACE_ID"].'</td>
                            <td>'. $row["entries"].'</td>
                            </tr>';
                            $idx += 1;
                          }        
                        } else {
                          echo "0 results";
                        }

                        echo "</tbody></table>";
                    }
                    else if($_GET['Query'] == 'q2'){
                    
                    $q2 = "select distinct (host.FACILITY_ID), COUNT(soth.entries) OVER (PARTITION BY host.FACILITY_ID) as entries from
                    (select cont.NFC_ID,PLACE_ID,entries from
                    (SELECT  NFC_ID,PLACE_ID ,COUNT(Entry) OVER (PARTITION BY PLACE_ID)  as entries 
                    FROM visit 
                    where Entry > '".$diff_p_str."' ) as cont
                    join customer  ON customer.NFC_ID = cont.NFC_ID 
                    where (customer.Birth_Date > '".$diffmax."' and customer.Birth_Date < '".$diffmin."')
                    ) as soth
                    join host on soth.PLACE_ID = host.PLACE_ID 
                    order by entries desc
                    ";
                    $result2 = mysqli_query($conn, $q2);
                    
                    echo '<table class="table table-striped table-hover">
                    <thead>
                    <tr>
                     <th scope="col">#</th>
                     <th scope="col">Facility</th>
                     <th scope="col">Entries</th>
                    </tr>
                  </thead>';
                  $idx = 1;
                    if (mysqli_num_rows($result2) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result2)) {
                        //   echo " Facility Id:". $row["FACILITY_ID"]. " Entries: ". $row["entries"]. "<br>";
                        echo '
                        <th scope="row">'.$idx.'</th>
                        <td>'. $row["FACILITY_ID"].'</td>
                        <td>'. $row["entries"].'</td>
                        </tr>';
                        $idx += 1;
                        }        
                      } else {
                        echo "0 results";
                      }
                      echo "</tbody></table>";


                    }



                    else if($_GET['Query'] == 'q3'){
                    
                        $q3 = "select distinct(host.FACILITY_ID ),cntt from
                        (select distinct PLACE_ID , COUNT( NFC_ID ) OVER (PARTITION BY PLACE_ID) as cntt
                        from
                        (select nfcc.NFC_ID,PLACE_ID from
                        (select distinct (NFC_ID),PLACE_ID 
                        FROM visit
                        where Entry > '". $diff_p_str ."') as nfcc
                        join customer on customer.NFC_ID = nfcc.NFC_ID
                        where (customer.Birth_Date >= '". $diffmax  ."' and customer.Birth_Date <= '".$diffmin  ."')) as soth) as neww
                        join host on host.PLACE_ID = neww.PLACE_ID
                        order by cntt desc
                        
                        ";
                        
                        $result3 = mysqli_query($conn, $q3);
                        
                        echo '<table class="table table-striped table-hover">
                        <thead>
                        <tr>
                         <th scope="col">#</th>
                         <th scope="col">Facility</th>
                         <th scope="col">Entries</th>
                        </tr>
                      </thead>';
                      $idx = 1;
                        if (mysqli_num_rows($result3) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result3)) {
                            //   echo " Place Id:". $row["PLACE_ID"]. " Entries: ". $row["cntt"]. "<br>";
                            echo '
                            <th scope="row">'.$idx.'</th>
                            <td>'. $row["FACILITY_ID"].'</td>
                            <td>'. $row["cntt"].'</td>
                            </tr>';
                            $idx +=1;
                            }        
                          } else {
                            echo "0 results";
                          }
                          echo "</tbody></table>";

    
                        }
                }
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