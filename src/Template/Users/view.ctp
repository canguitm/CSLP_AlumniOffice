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
                        <h1 class="page-header">Add Profiles</h1>
                            <div class="row">
                                <div class="panel-body table-responsive">
                                    <!-- Add Function-->
                                    <?php
                                        echo $this->Form->create($alumniprofile);
                                        echo $this->Form->input('fname', array('label' => 'First Name', "class"=>"form-control"));
                                        echo $this->Form->input('mname', array('label' => 'Middle Name', "class"=>"form-control"));
                                        echo $this->Form->input('lname', array('label' => 'Last Name', "class"=>"form-control"));
                                        echo $this->Form->input('gender', ["class"=>"form-control"]);
                                        echo $this->Form->input('contact_number', ["class"=>"form-control"]);
                                        echo $this->Form->input('email', ["class"=>"form-control"]);
                                        echo $this->Form->input('street_address', ["class"=>"form-control"]);
                                        echo $this->Form->input('city', ["class"=>"form-control"]);
                                        echo $this->Form->input('province', ["class"=>"form-control"]);
                                        echo $this->Form->input('country', ["class"=>"form-control"]);
                                        echo $this->Form->input('zipcode', ["class"=>"form-control"]);
                                        echo "<br>";
                                        echo $this->Form->button(__('Add Profile'), ["class"=>"btn btn-info btn", "style"=> "background-color:#003B5F; border:0px; color:white;"]);
                                        echo $this->Form->end();
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





<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>   
        <tr>
            <th><?= __('Active Status') ?></th>
            <td><?= $this->Number->format($user->active_status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>
