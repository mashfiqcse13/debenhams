<?php include_once 'header.php'; ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $Title ?>
            <small><?= $Title ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Department</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box-body">
            <?php echo $glosary->output;
            ;
            ?>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'footer.php'; ?>
<script type="text/javascript">
    $('#save-and-go-back-button').click(function (event) {
        event.preventDefault();
        var name = $('#field-name').val();
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/department/checkdatabase',
            data: {'name_department': name},
            dataType: 'text',
            type: 'POST',
            success: function (data) {
                if (data == '') {
                    alert('This Data Is Already Exist');
                }else{
                    $('#save-and-go-back-button').submit();
                }
            }
        });
    $('#form-button-save').click(function (event) {
        event.preventDefault();
        var name = $('#field-name').val();
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/department/checkdatabase',
            data: {'name_department': name},
            dataType: 'text',
            type: 'POST',
            success: function (data) {
                if (data == '') {
                    alert('This Data Is Already Exist');
                }else{
                    $('#form-button-save').submit();
                }
            }
        });

//        alert(name);
    });
</script>