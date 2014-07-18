<div class="row">
    <div class="mainvcontainer" style="background-image:url(' <?php echo base_url('img/bg.jpg'); ?> '); min-height:980px;">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <section class="panel" style="margin-top:90px;padding:50px; 
            box-shadow: 4px 12px 85px rgba(0,0,0,.9);
            border: 1px solid #ccc;
            border-radius: 10px;
            ">
                <div class="panel-body">
                    <?php if (isset($errors)) {?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
                        </button> <i class="fa fa-ban-circle"></i><strong>Oh Dear!</strong> 
                        <?php echo $errors; ?>
                    </div>
                    <?php } ?>

                    <img src="<?php echo base_url("img/ig.png"); ?>" class="img-responsive my-center" style="position:relative;">
                    <p class="h2">Installation</p>
                    <?php $atts = array( 'data-validate'=>'parsley'); echo form_open_multipart('installer/write_file',$atts); ?>
                    <div class="form-group">All right champ, type your your database details here!</div>
                    <div class="form-group">
                        <label>Server</label>
                        <input name="hostname" type="text" data-required="true" data-maxlength="10" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="Sever Details e.g localhost" value="">
                    </div>
                    <div class="form-group">
                        <label>Root name</label>
                        <input name="username" type="text" data-required="true" data-maxlength="10" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="root name" value="">
                    </div>
                    <div class="form-group">
                        <label>Root Password</label>
                        <input name="password" type="password" data-required="true" data-maxlength="10" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="root password" value="">
                    </div>
                    <div class="form-group">
                        <label>Database Name</label>
                        <input name="database" type="text" data-required="true" data-maxlength="10" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" title="database name" value="">
                    </div>
                    <button type="submit" class="btn btn-purplet btn-s-xs " id="">Save</button>
                    <?php echo form_close(); ?>
                </div>
            </section>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>