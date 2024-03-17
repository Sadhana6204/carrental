<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
</div>

<!-- Content Row -->
<div class="row">
    
    <div class="col-md-6 col-md-offset-3">
        <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == 'berhasil'){
                echo '<div class="alert alert-success">Password changed successfully!</div>';
            }
        }
        ?>
        <form action="<?php echo base_url().'admin/ganti_password_act'; ?>" method="post">
            <div class="form-group">
                <label>New password</label>
                <input class="form-control" type="password" name="new_password">
                <?php echo form_error('new_password'); ?>
            </div>
            <div class="form-group">
                <label>Repeat New Password</label>
                <input class="form-control" type="password" name="repeat_password">
                <?php echo form_error('repeat_password'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   
</div>