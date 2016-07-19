<!--add header -->
<?php include_once __DIR__ . '/../header.php'; ?>

<!-- Left side column. contains the logo and sidebar -->
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
            <li class="active">Insert Info Table</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box">


                        <div class="box-header">
                            <h2>Insert Info</h2>
                        </div>
                        <div class="box-body">
                            <div class="row">
                            <?=$glosary;?>
                            </div>
                            <input type="submit"  value="Save" class="btn btn-primary pull-right"/>
                        </div>

                        

                        
                </div>
            </div>




    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- insert book -->



<?php include_once __DIR__ . '/../footer.php'; ?>
