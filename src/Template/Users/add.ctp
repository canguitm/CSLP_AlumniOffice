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
                        <?= $this->Html->link('<i class="fa fa-users"></i> Profile', ['action' => 'profile'], array ('class'=>'active-menu', 'escape' => false) ); ?>
                    <li>
                        <?= $this->Html->link('<i class="fa fa-list-alt"></i> Import Data', ['action' => 'import'], array ('escape' => false) ); ?>
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
                        <h1 class="page-header">Add Profile</h1>
                            <div class="row">
                                <div class="panel-body table-responsive">
                                    <!-- Add Function-->

                                    <?= $this->Form->create($user) ?>
                                    <fieldset>
                                        <?php

                                            //users table
                                            echo '<h3 style="display:inline;">Basic Information</h3><br><br>';
                                            echo $this->Form->input('username', array('required' => true,'label' => 'Username', "class"=>"form-control")). '<br>';
                                            
                                            //alumniprofiles table
                                            echo $this->Form->hidden('alumni_profiles.0.id');
                                            echo $this->Form->input('alumni_profiles.0.fname', array('required' => true,'label' => 'First Name', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('alumni_profiles.0.mname', array('required' => true,'label' => 'Middle Name', "class"=>"form-control")). '<br>';
                                            echo '</table>';
                                            echo $this->Form->input('alumni_profiles.0.lname', array('required' => true,'label' => 'Last Name', "class"=>"form-control")). '<br>';
                                            echo "<h5><strong>Date of Birth</strong></h5>";
                                            echo $this->Form->date('alumni_profiles.0.date_of_birth', array('required' => true,'label' => 'Date of Birth', "class"=>"form-control", 'dateFormat' => 'DMY', 'minYear' => date('Y') - 110, 'maxYear' => date('Y') - 0)). '<br><br>';
                                            echo $this->Form->input('alumni_profiles.0.gender', array('required' => true, 'label' => 'Gender', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('alumni_profiles.0.contact_number', array('required' => true,'label' => 'Contact Number', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('alumni_profiles.0.email', array('required' => true,'label' => 'Email', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('alumni_profiles.0.street_address', array('required' => true,'label' => 'Street Address', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('alumni_profiles.0.city',array('required' => true,'label' => 'City', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('alumni_profiles.0.province', array('required' => true,'label' => 'Province', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('alumni_profiles.0.country', array('required' => true,'label' => 'Country', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('alumni_profiles.0.zipcode', array('required' => true,'label' => 'Zipcode', "class"=>"form-control")). '<br><br><br>';


                                            //educationalbackgrounds
                                            echo '<h3 style="display:inline;">Educational Background</h3><br><br>';
                                            echo $this->Form->hidden('educational_backgrounds.0.id');
                                            echo "GS: 1, HS: 2, College: 3, Post Graduate: 4";
                                            echo $this->Form->input('educational_backgrounds.0.academic_level_id', array('required' => true,'type'=>'select','options'=>$acad,'label' => 'Academic Levels', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('educational_backgrounds.0.program', array('required' => true,'label' => 'Program', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('educational_backgrounds.0.year_graduated', array('required' => true,'label' => 'Year Graduated', 'style'=>'width:317px; height:34px;', "class"=>"form-control")). '<br><br><br>';

                                            //companydetails
                                            echo '<h3 style="display:inline;">Company Details</h3><br><br>';
                                            echo $this->Form->hidden('company_details.0.id');
                                            echo $this->Form->input('company_details.0.company_name', array('required' => true,'label' => 'Company Name', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('company_details.0.company_street_address', array('required' => true,'label' => 'Company Street Address', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('company_details.0.company_city', array('required' => true,'label' => 'Company City', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('company_details.0.company_province', array('required' => true,'label' => 'Company Province', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('company_details.0.company_country', array('required' => true,'label' => 'Company Country', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('company_details.0.company_zipcode', array('required' => true,'label' => 'Company Zipcode', "class"=>"form-control")). '<br>';
                                            echo $this->Form->input('company_details.0.company_contact_number', array('required' => true,'label' => 'Company Contact Number', "class"=>"form-control")). '<br><br>';

                                        ?>
                                    </fieldset>
                                    <?= $this->Form->button('Submit', array("class"=>"btn btn-info btn", "style"=>"background-color:#003B5F; border:0px; color:white;"));?>
                                    <?= $this->Form->end() ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Content -->
        

    
    <!--End of Whole wrapper -->



