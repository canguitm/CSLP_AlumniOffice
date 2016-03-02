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
                    <div class="col-md-6">
                        <!--Title and subtitle -->
                        <h1 class="page-header">Edit Profile</h1>
                            <div class="row">
                                <div class="panel-body table-responsive">
                                    <!-- Add Function-->

                                    <?= $this->Form->create($user) ?>
                                    <fieldset>
                                        <?php
                                            //users table
                                            echo $this->Form->input('username', array('label' => 'Username', "class"=>"form-control"));
                                            
                                            //alumniprofiles table
                                            echo $this->Form->hidden('alumni_profiles.0.id');
                                            echo $this->Form->input('alumni_profiles.0.fname', array('label' => 'First Name', "class"=>"form-control"));
                                            echo $this->Form->input('alumni_profiles.0.mname', array('label' => 'Middle Name', "class"=>"form-control"));
                                            echo $this->Form->input('alumni_profiles.0.lname', array('label' => 'Last Name', "class"=>"form-control"));
                                            echo $this->Form->input('alumni_profiles.0.date_of_birth', array('label' => 'Date of Birth', "class"=>"form-control"));
                                            echo $this->Form->input('alumni_profiles.0.gender', array('label' => 'Gender', "class"=>"form-control"));
                                            echo $this->Form->input('alumni_profiles.0.contact_number', array('label' => 'Contact Number', "class"=>"form-control"));
                                            echo $this->Form->input('alumni_profiles.0.email', array('label' => 'Email', "class"=>"form-control"));
                                            echo $this->Form->input('alumni_profiles.0.street_address', array('label' => 'Street Address', "class"=>"form-control"));
                                            echo $this->Form->input('alumni_profiles.0.city',array('type'=>'select','options'=>$data,'label' => 'City', "class"=>"form-control"));
                                            echo $this->Form->input('alumni_profiles.0.province', array('label' => 'Province', "class"=>"form-control"));
                                            echo $this->Form->input('alumni_profiles.0.country', array('label' => 'Country', "class"=>"form-control"));
                                            echo $this->Form->input('alumni_profiles.0.zipcode', array('label' => 'Zipcode', "class"=>"form-control"));


                                            //educationalbackgrounds
                                            echo $this->Form->hidden('educational_backgrounds.0.id');
                                            echo $this->Form->input('educational_backgrounds.0.academic_level_id', array('type'=>'select','options'=>$acad,'label' => 'Academic Levels', "class"=>"form-control"));
                                            echo $this->Form->input('educational_backgrounds.0.program', array('label' => 'Program', "class"=>"form-control"));
                                            echo $this->Form->input('educational_backgrounds.0.year_graduated', array('type'=>'year','label' => 'Year Graduated', "class"=>"form-control"));

                                            //companydetails
                                            echo $this->Form->hidden('company_details.0.id');
                                            echo $this->Form->input('company_details.0.company_name', array('label' => 'Company Name', "class"=>"form-control"));
                                            echo $this->Form->input('company_details.0.company_street_address', array('label' => 'Company Street Address', "class"=>"form-control"));
                                            echo $this->Form->input('company_details.0.company_city', array('label' => 'Company City', "class"=>"form-control"));
                                            echo $this->Form->input('company_details.0.company_province', array('label' => 'Company Province', "class"=>"form-control"));
                                            echo $this->Form->input('company_details.0.company_country', array('label' => 'Company Country', "class"=>"form-control"));
                                            echo $this->Form->input('company_details.0.company_zipcode', array('label' => 'Company Zipcode', "class"=>"form-control"));
                                            echo $this->Form->input('company_details.0.company_contact_number', array('label' => 'Company Contact Number', "class"=>"form-control"));

                                        ?>
                                    </fieldset>
                                    <?= $this->Form->button(__('Submit')) ?>
                                    <?= $this->Form->end() ?>


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



