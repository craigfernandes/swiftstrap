          
                    <?php $this->load->view('footer-map'); ?>
                </section>        
            </section> 
        </section>
    </section>
    <!-- /.vbox -->
  </section>
  <!-- jquery -->
  <script src="<?php echo(base_url()."resources") ?>/js/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
  <!-- Bootstrap -->
  <script src="<?php echo(base_url()."resources") ?>/js/bootstrap.js" type="text/javascript"></script>
  <!-- app -->
  <script src="<?php echo(base_url()."resources") ?>/js/app.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/app.plugin.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/app.data.js" type="text/javascript"></script>
  <!-- fuelux -->
  <script src="<?php echo(base_url()."resources") ?>/js/fuelux/fuelux.js" type="text/javascript"></script>
 
  <!-- parsley -->
  <script src="<?php echo(base_url()."resources") ?>/js/parsley/parsley.min.js" type="text/javascript"></script>
  <script src="<?php echo(base_url()."resources") ?>/js/parsley/parsley.extend.js" type="text/javascript"></script>

  <!-- my upload with ajax -->
  <script src="<?php echo(base_url()."resources") ?>/js/my_upload.js" type="text/javascript"></script>


 <script type="text/javascript">
   
    $(document).ready(function (event) {

        $('#sortable').on("click", '.demo1', function (event) {
            var tmp = ($(this).attr('id'));
            var tmp2 = "pic-" + tmp;
            $(".demo1").AjaxFileUpload({


                    onComplete: function(filename, response) {
                        //alert(response.error);
                        $("#" + tmp2).append(
                             response.name
                        );
                        tmp = "";
                        tmp2 = "";
                    }
                });
        });


        /*save to the shorttag div image*/
        $('#sortable').on("click", '.pp-img', function (event) {
            var tmp = $(this).attr("mid");
            var tmp2 = ($('#pic-' + tmp).text());
            
            var tmp3 = ($('#' + tmp).attr('mwidth'));
            var tmp4 = "[col foo='" + tmp3 + "'][img src='"+tmp2+"'][/col]";
            
            $('#shorttag-' + tmp).text(tmp4);
        });

         /*save to the shorttag div text*/
        $('#sortable').on("click", '.pp-text', function (event) {
            var tmp = $(this).attr("mid");
            var tmp2 = ($('#inp-' + tmp).val());
            var tmp3 = ($('#' + tmp).attr('mwidth'));
            var tmp4 = "[col foo='" + tmp3 + "']" + tmp2 + "[/col]";
            $('#shorttag-' + tmp).html(tmp4);
        });

        $('#sortable').on("mousemove", '.move', function (event) {
            $("#sortable").sortable({
                handle: $('.handle'),
                tolerance: 'pointer',
                placeholder: 'placeholder',
                update: function () {
                    var content = $(this).text();
                    //alert(content);
                },
                //the function below dynamically changes the 
                //width of the placeholder depending on which
                //item is being dragged
                start: function (e, ui) {
                    ui.placeholder.width(ui.item.width());
                }
            }).disableSelection();
        });
        $('#sortable').on("click", '.remove', function (event) {
            var id = $(this).parent("header").parent("div").attr("id");
            $('#' + id).remove();
        });
        $('#sortable').on("click", '.shrink', function (event) {
            var id = $(this).parent("header").parent("div").attr("id");
            var my_width = $(this).parent("header").parent("div").attr("mwidth");
            var tmp = parseInt(my_width);
            //check to make sure max columns
            //is not exceeded
            if (tmp > 2) {
                tmp = tmp - 1;
                var f = "col-sm-" + tmp.toString();
                $('#' + id).attr("class", f);
                $('#' + id).attr("mwidth", tmp);
            }
        });
        $('#sortable').on("click", '.grow', function (event) {
            var id = $(this).parent("header").parent("div").attr("id");
            var my_width = $(this).parent("header").parent("div").attr("mwidth");
            var tmp = parseInt(my_width);
            //alert(tmp+1);
            //check to make sure max columns
            //is not exceeded
            if (tmp < 12) {
                tmp = tmp + 1;
                var f = "col-sm-" + tmp.toString();
                $('#' + id).attr("class", f);
                $('#' + id).attr("mwidth", tmp);
            }
        });
        $('#add-block').click(function (event) {
            $.ajax({
                    url: '<?php echo site_url("shortcodes/box"); ?>',
                    type: 'post',
                    data: {},
                    success: function (data) {
                        $('#sortable').append(data);
                    }
                });
        });

        $('#add-image').click(function (event) {
            $.ajax({
                    url: '<?php echo site_url("shortcodes/image"); ?>',
                    type: 'post',
                    data: {},
                    success: function (data) {
                        $('#sortable').append(data);
                    }
                });
        });




        $('#save-db').click(function (event) {
            
            /*loop through all the shorttags and save*/
            var tag = "";
            $(".shorttag").each(function () {
                tag = tag + $(this).html();
            });
            var content = $('#sortable').html();
            var shorttag = tag;
            $.ajax({
                url: '<?php echo site_url("shortcodes/save_to_database"); ?>',
                type: 'post',
                data: {
                    content: content,
                    shorttag: shorttag
                },
                success: function (data) {
                    alert('done');
                }
            });
        });
    });
</script>

