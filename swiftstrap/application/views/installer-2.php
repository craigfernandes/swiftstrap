<div class="row">
    <div class="mainvcontainer" style="background-image:url('<?php echo base_url('img/bg.jpg'); ?>'); min-height:900px;">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <section class="panel" style="margin-top:90px;padding:50px; 
            box-shadow: 4px 12px 85px rgba(0,0,0,.9);
            border: 1px solid #ccc;
            border-radius: 10px;
            ">
                <div class="panel-body">
                    <?php if (isset($success)) {?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
                        </button> <i class="fa fa-check-sign"></i><strong>Well done dude!</strong> 
                        <?php echo $success; ?>
                    </div>
                    <?php } ?>
                    <p class="h2">Installation</p>
                    <?php $atts = array( 'data-validate'=>'parsley'); echo form_open_multipart('installer/create_tables',$atts); ?>
                    <div class="form-group">All right sparky, now let's create the tables? You ready?</div>
                    <button type="submit" class="btn btn-purplet btn-s-xs " id="">Save</button>
                    <?php echo form_close(); ?>
                </div>
            </section>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>