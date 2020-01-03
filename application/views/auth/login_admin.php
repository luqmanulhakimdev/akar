<div class="col-md-9 col-lg-10">
  <div class="col-xs-10 col-sm-6 col-md-6 col-lg-5 center-block" style="float: none;">
   
        <h1>Login Admin</h1><br>

        <?php echo form_open('login_admin'); ?>

            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username">
            <?php echo form_error('username'); ?><br>

            <label>Password</label>
            <input type="password" name="password"  class="form-control" placeholder="Password">
            <?php echo form_error('password'); ?><br>


            <input type="submit" name="submit" class="btn btn-primary btn-block " value="Login">
        <?php echo form_close(); ?>
    
    </div>
</div>