<?php include_once 'header.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="min-height: 600px">

      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'footer.php'; ?>

<script type="text/javascript">
    $('.datepicker').datepicker();
    $('#send').hide();
    $('#receive').hide();
    $('#fit_name').change(function () {
        var select = $("#fit_name option:selected").val();
//        alert(select);
        if (select == 0) {
            $('#send').hide();
            $('#receive').hide();
        }
        if (select != 0) {
            $.post("<?php echo base_url(); ?>index.php/supply_info/fit_info", {"id_supply_fit_name": select});
            var id = select;
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/supply_info/fit_info',
                data: {'id_supply_fit_name': id},
                dataType: 'text',
                type: 'POST',
                success: function (data) {
//                    alert(data);
                    var obj = $.parseJSON(data);
                    $.each(obj.supply_fit, function (i, fit) {
                        var fit_id = fit['id_supply_fit_name'];
                        var fit_name = fit['name'];
                        $('#send').show();
                        $('#send label').html(function () {
                            return fit_name + " send date:";
                        });
                        $('#receive').show();
                        $('#receive label').html(function () {
                            return fit_name + " receive date:";
                        });

                    });
                }
            });
        }
    });
</script>

<?php if ($this->uri->segment(3) == 'edit') { ?>
    <script>

        document.forms['form'].elements['id_supply_session'].value = "<?php echo $value->id_supply_session; ?>";
        document.forms['form'].elements['id_department'].value = "<?php echo $value->id_department; ?>";
        document.forms['form'].elements['id_supplyer'].value = "<?php echo $value->id_supplyer; ?>";
        document.forms['form'].elements['sample_result'].value = "<?php echo $value->sample_result; ?>";
        document.forms['form'].elements['approved_by'].value = "<?php echo $value->approved_by; ?>";
        document.forms['form'].elements['lab_test_report'].value = "<?php echo $value->lab_test_report; ?>";
        document.forms['form'].elements['pattern_block'].value = "<?php echo $value->pattern_block; ?>";
        document.forms['form'].elements['id_supply_fit_name'].value = "<?php echo $register->id_supply_fit_name; ?>";



        var select = $("#fit_name option:selected").val();
        var id_supply = $("#id_supply_info").val();
        if (select == 0) {
            $('#send').hide();
            $('#receive').hide();
        }
        if (select != 0) {
            $.post("<?php echo base_url(); ?>index.php/supply_info/register_info", {"id_supply_info": id_supply});

            var id = select;
            $("#id_fit").val(select);
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/supply_info/register_info',
                data: {'id_supply_fit_name': id, "id_supply_info": id_supply},
                dataType: 'text',
                type: 'POST',
                success: function (data) {
                    //                                        alert(data);
                    var obj = $.parseJSON(data);

                    $.each(obj.supply_fit, function (i, fit) {
                        var date_send = new Date(fit['supply_fit_register_date_send']);
                        var date_send_change = formatDate(date_send);
                        
                        var date_receive = new Date(fit['supply_fit_register_date_receive']);
                        var date_receive_change = formatDate(date_receive);
                        function formatDate(value)
                        {
                            return value.getDate()+ "/" + (value.getMonth()+1)+ "/" + value.getFullYear();
                        }
                        var fit_name = fit['name'];
                        $('#send').show();
                        $('#send label').html(function () {
                            var fit_name = fit['name'];
                            return fit_name + " send date:";
                        });
                        $('#send input').val(date_send_change);
                        $('#receive').show();
                        $('#receive label').html(function () {
                            return fit_name + " receive date:";
                        });
                        $('#receive input').val(date_receive_change);
                    });
                }
            });
        }
        $('#fit_name').change(function () {
            var select = $("#fit_name option:selected").val();
            if (select != 0) {
                $.post("<?php echo base_url(); ?>index.php/supply_info/register_info", {"id_supply_info": id_supply});
                var id = select;
                $("#id_fit").val(select);
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/supply_info/register_info',
                    data: {'id_supply_fit_name': id, "id_supply_info": id_supply},
                    dataType: 'text',
                    type: 'POST',
                    success: function (data) {
    //                        alert(data);

                        var obj = $.parseJSON(data);
    //                        alert(obj.supply_fit);
                        if (jQuery.isEmptyObject(obj.supply_fit)) {
                            $('#send input').val('');
                            $('#receive input').val('');
                        } else {
                            $.each(obj.supply_fit, function (i, fit) {

                                var date_send = fit['supply_fit_register_date_send'];
                                var date_receive = fit['supply_fit_register_date_receive'];
                                var fit_name = fit['name'];
                                $('#send').show();
                                $('#send label').html(function () {
                                    var fit_name = fit['name'];
                                    return fit_name + " send date:";
                                });
                                $('#send input').val(date_send);
                                $('#receive').show();
                                $('#receive label').html(function () {
                                    return fit_name + " receive date:";
                                });
                                $('#receive input').val(date_receive);

                            });
                        }
                    }
                });
            }
        });
    </script>
<?php } ?>
