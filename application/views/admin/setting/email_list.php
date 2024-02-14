<style>
.form-control {
    margin-bottom: 15px;
}
</style>
<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">
            <?= $title ?>
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border2">
                    <h3 class="box-title">Email Unsubscribe Lists</h3>
                </div>
                <div class="box-body">
                    <table class="table">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        if (!empty($members)) {
                        $i = 1;
                        foreach ($members as $member) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $member->user_email ?></td>
                            <td><?= date('d M Y', strtotime($member->created_at)); ?></td>
                            <td><?php if($member->status == '1') { echo "Active"; } else { echo "Inactive";} ?></td>
                            <td>
                                <div class="action-button">
                                    <button class="btn btn-xs btn-danger" style="margin-left: 5px;" title="Delete"
                                        data-toggle="tooltip" onclick="deleteUsers(<?= @$member->id ?>)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; } } else {
                            echo "<tr><td colspan='7' class='text-center red'><h3>No record available!</h3></td></tr>";
                        } ?>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <?= $paginate ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function deleteUsers(id) {
        swal({
            title: 'Are You sure want to delete this email id?',
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
                window.location.href = '<?= admin_url('settings/deleteUsers/') ?>' + id
            }
        });
    }
</script>