<section class="content-header">
    <h1><?= $title ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= admin_url('course/mode_list') ?>"> Mode List</a></li>
        <li class="active"><?= $title ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Course Mode Lists</h3>
                    <a href="<?= admin_url('course/mode_add') ?>" class="pull-right btn btn-primary"><span class="fa fa-plus"></span> Add New</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                        <?php
                        if (is_array($mode) && count($mode) > 0) {
                        $i = 1;
                        foreach ($mode as $mode_v) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $mode_v->mode_title ?></td>
                            <td style="width: 10%;">
                                <a href="<?= admin_url('course/mode_add/' . $mode_v->id) ?>" class="btn btn-xs btn-info"><span class="fa fa-pencil"></span></a>
                                <!-- <a href="<?= admin_url('course/delete_mode/' . $mode_v->id) ?>" class="btn btn-xs btn-danger delete"><span class="fa fa-trash"></span></a> -->
                                <button class="btn btn-xs btn-danger" style="margin-left: 5px;" title="Delete" data-toggle="tooltip" onclick="deleteMode(<?= @$mode_v->id ?>)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php $i++; } } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
function deleteMode(id) {
    swal({
        title: 'Are you sure want to delete this mode?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#36A1EA',
        cancelButtonColor: '#e50914',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        closeOnConfirm: true,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location.href = '<?= admin_url('course/delete_mode/') ?>' + id
        }
    });
}
</script>