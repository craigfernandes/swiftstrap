
<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; max-width:1170px;  ">


<div class="row" >

    <div class="col-sm-12">
         <div class="btn-group">
            <button type="submit" class="btn btn-white btn-s-xs " id="add-block">Add Block</button>
       
            <button type="submit" class="btn btn-white btn-s-xs " id="add-image">Add Image</button>
        </div>
        <div class="panel-body">
            <?php echo anchor('shortcodes/preview_page', 'Preview page'); ?>
        </div>
    </div>


    <div id="sortable">

    	<?php echo $content; ?>
 
        
    </div>

<div class="clearfix"></div>
</div>
<div class="row" style="margin-left:30px; margin-right:30px;">
 <button type="submit" class="btn btn-success btn-s-xs " id="save-db">Save to database!</button>
 
</div>
<div class="gap"></div>



</div>

