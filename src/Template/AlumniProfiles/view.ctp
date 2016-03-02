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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="href="/users/login" class="fa fa-sign-out fa-lg""></i> 
                    </a>
                    <li><h5><a href="/users/login" class="fa fa-sign-out fa-lg"></a></h5></li>
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
                        <a href="/AlumniProfiles/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="/AlumniProfiles/index"><i class="fa fa-users"></i> Profiles</a>
                    <li>
                        <a href="/AlumniProfiles/import"><i class="fa fa-list-alt"></i> Import Data</a>
                    </li>
                </ul>
        </nav>
        <!--End of Side Navigation  -->
        


        <!--Start of Content -->      
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-6">
                        <!--Title and subtitle -->
                        <h1 class="page-header">View Profiles</h1>
                            <div class="row">
                                <div class="panel-body table-responsive">
                                    <?php
                                        echo $this->Form->create($alumniprofile);
                                        echo $this->Form->input('fname', array('label' => 'First Name', 'disabled' => 'disabled', "class"=>"form-control"));
                                        echo $this->Form->input('mname', array('label' => 'Middle Name', 'disabled' => 'disabled', "class"=>"form-control"));
                                        echo $this->Form->input('lname', array('label' => 'Last Name', 'disabled' => 'disabled', "class"=>"form-control"));
                                        echo '<br>';
                                        echo $this->Form->input('date_of_birth', array('label' => 'Date of Birth', 'disabled' => 'disabled', "class"=>"form-control"));
                                        echo $this->Form->input('gender', array('label' => 'Gender', 'disabled' => 'disabled', "class"=>"form-control"));
                                        echo $this->Form->input('contact_number', array('label' => 'Contact Number', 'disabled' => 'disabled', "class"=>"form-control"));
                                        echo $this->Form->input('email', array('label' => 'Email', 'disabled' => 'disabled', "class"=>"form-control"));
                                        echo $this->Form->input('street_address', array('label' => 'Street Address', 'disabled' => 'disabled', "class"=>"form-control"));
                                        echo $this->Form->input('city', array('label' => 'City', 'disabled' => 'disabled', "class"=>"form-control"));
                                        echo $this->Form->input('province', array('label' => 'Province', 'disabled' => 'disabled', "class"=>"form-control"));
                                        echo $this->Form->input('country', array('label' => 'Country', 'disabled' => 'disabled', "class"=>"form-control"));
                                        echo $this->Form->input('zipcode', array('label' => 'Zip Code', 'disabled' => 'disabled', "class"=>"form-control"));

                                    ?>
                           
                                </div>
                            </div>
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

