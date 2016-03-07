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
                    <div class="col-md-12">
                        <!--Title and subtitle -->
                        <h1 class="page-header">Alumni Profiles <small>Summary of your Tables</small></h1>
                        <div class="row">    
                          

    <div class="col-lg-4">
        <?php echo $this->Form->create();?>
        <div class="input-group">
            <?php  echo $this->Form->input('all', array('label'=>'', 'type'=>  'text', 'class'=>'form-control', 'placeholder'=>'Search for lastname..'));?>
            <span class="input-group-btn">
            <?php   echo $this->Form->button('<i class="fa fa-search"></i>',  array('label' => 'First Name', "class"=>"btn btn-default", 'type'=>'submit'));?>echo $this->Form->end();?>
      </span>
  </div>



  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
                            <div class="row">
                                <div class="panel-body table-responsive">
                                    
    <table class="table table-hover">
    <div align="right"><?= $this->Html->link('<i class="fa fa-plus"></i>', ['action' => 'add'], array ('escape' => false)) ?></div>
                                        <thead>
                                        <tr>
                                            <th><strong>First Name</strong></th>
                                            <th><strong>Middle Name</strong></th>
                                            <th><strong>Last Name</strong></th>
                                            <th><strong>Contact Number</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Program</strong></th>
                                            <th><strong>Year Graduated</strong></th>
                                            <th><strong><?= __('Action') ?></strong></th>
                                            
                                        </tr>
                                    </thead>

            <?php foreach ($users as $user): ?>
            <tr>
               

                <?php foreach ($user->alumni_profiles as $alumni_profiles): ?>  
                    <td><?= h($alumni_profiles->fname) ?></td>
                    <td><?= h($alumni_profiles->mname) ?></td>
                    <td><?= h($alumni_profiles->lname) ?></td>
                    <td><?= h($alumni_profiles->contact_number) ?></td>
                    <td><?= h($alumni_profiles->email) ?></td>
                    <?php foreach ($user->educational_backgrounds as $educational_backgrounds): ?>  
                    <td><?= h($educational_backgrounds->program) ?></td>
                    <td><?= h($educational_backgrounds->year_graduated) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fa fa-search-plus"></i>', ['action' => 'view', $user->id], array ('escape' => false) ); ?>&nbsp;&nbsp;
                        <?= $this->Html->link('<i class="fa fa-pencil-square-o"></i>', ['action' => 'edit', $user->id], array ('escape' => false)) ?>&nbsp;&nbsp; 
                    </td>
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>



    <?php  //echo $userdata->alumni_profiles[0]->fname; ?> 
    <?php  //echo $userdata->educational_backgrounds[0]->year_graduated; ?> 



    <div align ="right", class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>

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
    


