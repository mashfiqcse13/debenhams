<?php include_once __DIR__ . '/../header.php'; ?>



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
            <li class="active"><?= $Title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box-body">
            <?php
                echo $glosary->output;
            ?>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once __DIR__ . '/../footer.php'; ?>
<?php if($this->uri->segment(3) == 'add'){?>
<script type="text/javascript">
    $('#form-button-save').val('Save and go back to insert page');
</script>
<?php }if($this->uri->segment(3) == 'edit'){?>
<script type="text/javascript">
    $('#form-button-save').val('Update and go back to insert page');
</script>
<?php }?>