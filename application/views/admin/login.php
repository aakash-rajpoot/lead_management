<style>
    .fields{
        margin:20px;
    }
    .main{
        margin:200px 300px;
        border:1px solid grey;
    }
    .error{
        color:red;
        font-size:18px;
    }
    .error_validation{
        color:red;
        font-size:16px;
    }
</style>

<?php echo form_open('',array('method' => 'post','novalidate'=>'novalidate')); ?>
<div class="main"> 
    <div class="error_validation">
        <?= validation_errors(); ?> 
    </div> 
    <div class="fields">
        <h1>Admin Login</h1>
    </div> 
    <div class="fields">
        <label for="email">Email ID:</label>
        <input type="text" name="email" id="email"><sup class='error'>*</sup>
    </div>
    <div class="fields">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><sup class='error'>*</sup>
    </div>
    <div class="fields">
        <button type="submit" name="admin-login">Login</button>
    </div>
</div>
<?php echo form_close(); ?>
