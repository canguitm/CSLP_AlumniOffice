<body>
    <!--Start of Whole wrapper -->
    <div id="wrapper">
        


    <!--Start of Top Navigation-->
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <!--Xavier Logo-->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html"><?php echo $this->Html->image('logo_side.png', array('alt' => 'CakePHP', 'width'=>'160px', 'height'=>'40px')); ?></a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <!--Start of Settings -->
                <li class="dropdown">
                    <?= $this->Html->link('<i class="fa fa-sign-out fa-lg"></i>', ['action' => 'index'], array ('escape' => false) ); ?>

                    <!-- /.dropdown-user -->
                </li>
            </ul>
        </nav>
        <!--End of Top Navigation-->




    <!--Start of Side Navigation  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <?= $this->Html->link('<i class="fa fa-dashboard"></i> Dashboard', ['action' => 'dashboard'], array ('escape' => false) ); ?>
                    </li>
                    <li>
                        <?= $this->Html->link('<i class="fa fa-users"></i> Profile', ['action' => 'profile'], array ('escape' => false) ); ?>
                    <li>
                        <?= $this->Html->link('<i class="fa fa-list-alt"></i> Import Data', ['action' => 'import'], array ('class'=>'active-menu','escape' => false) ); ?>
                    </li>
                </ul>
        </nav>
        <!--End of Side Navigation  -->
        


        <!--Start of Content -->      
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-4">
                        <!--Title and subtitle -->
                        <h1 class="page-header">Import Data</h1>
<?php
//set the connection variables
$hostname = "localhost";
$username = "root";
$password = "";
$database = "xu_alumni_db";

//connect to mysql database
$connection = mysqli_connect($hostname, $username, $password, $database) or die("Error " . mysqli_error($connection));

if($_FILES){
    if ($_FILES['csv_file']['size'] > 0) { 
        $filename  = $_FILES['csv_file']['tmp_name'];
        $handle = fopen($filename, "r");
        $i = 1;
        
        while (($data = fgetcsv($handle,",")) !== FALSE) {
            //skip first row of file for Name,Email,Mobile and Address
            if($i>1) {
                
                $uid = mysqli_insert_id($connection);
                mysqli_query($connection, "INSERT INTO users (username) VALUES  ('".trim($data[0], '"')."' )  ");
                
                
                mysqli_query($connection, "INSERT INTO alumni_profiles (lname, fname, mname, date_of_birth, gender, street_address, city, province, country, zipcode, contact_number, email ) VALUES 
                    ('".trim($data[0], '"')."','".trim($data[1], '"')."','".trim($data[2], '"')."','".trim($data[3], '"')."','".trim($data[4], '"')."','".trim($data[5], '"').trim($data[6], '"')."','".trim($data[7], '"')."','".trim($data[8], '"')."','".trim($data[9], '"')."','".trim($data[10], '"')."','"."','".trim($data[11], '"')."' ) ");
                
                /*
                $uid = mysqli_insert_id($connection);
                //for second table address details
                //, company_province, company_country, company_zipcode, company_contact_number
                mysqli_query($connection, "INSERT INTO company_details (id, company_name, company_street_address, company_city, company_province, company_country, company_zipcode, company_contact_number) VALUES 
                    ('".$uid."','".trim($data[12], '"')."','".trim($data[13], '"')."','".trim($data[14], '"')."','".trim($data[15], '"')."','".trim($data[16], '"')."','".trim($data[17], '"')."','".trim($data[18], '"')."' ) ");
                
                //third
                mysqli_query($connection, "INSERT INTO educational_backgrounds (id, program, year_graduated) VALUES 
                    ('".$uid."','".trim($data[19], '"')."','".trim($data[20], '"')."' ) ");

                */
            }
            $i++;
        }
    }  
    
    else 
        echo "no record";                        
}
?>


<form action="" method="post" enctype="multipart/form-data">

    <tr><td> <input type="file" name="csv_file"></td></tr>   
    <br>
    <tr>  
        <td>
            <input type="submit" value="Submit" id="submit" class="btn btn-info btn" style="background-color:#003B5F; border:0px; color:white;">
        </td>
    </tr>   
</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Content -->
    

    </div>
    <!--End of Whole wrapper -->


</body>
</html>
