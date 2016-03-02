<!-- File: src/Template/Users/login.ctp -->
<div id="parent">
    <div id="child">
    <br><br><br><br><br><br><br><br><br><br>
    <a class="navbar-brand" href="index.html"><?php echo $this->Html->image('xulogo_side.png', array('alt' => 'CakePHP', 'width'=>'216', 'height'=>'56.7')); ?></a>
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
            <?= $this->Form->input('username', array('label'=>'', 'class'=>  'design', 'placeholder'=>'Username', 'require'=>'true')) ?>
            <?= $this->Form->input('password', array('label'=>'', 'class'=>  'design', 'placeholder'=>'Password')) ?><br>
    <?= $this->Form->button(__('Login'), ["class"=>"input_submit"]); ?>
    <?= $this->Form->end() ?>

    </div>
</div>

<style>
#parent {
    display: table;
    width: 100%;
    height: 100%;
}

#child {
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}

.design{
    width: 200px;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size:12px;
    height:16px;
    border: 1px solid #003b5f;
    padding: 0.5%;
    margin-top:5px;
}

p{
    display: inline-block;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size:13px;
    margin-left: 0;
}
.input_submit{
    margin-left: -9%;  
    width:100px;
    height:32px;
    background-color:#003b5f;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size:14px;
    color:white;
    padding:0px;
    border:none;
}

.checkbox{
margin-left: -6%;  
    width:100px;
    background-color:#003b5f;
    color:white;
    padding:0px;
    border:none;
}

*/

</style>