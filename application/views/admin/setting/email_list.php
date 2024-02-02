<style>
  .form-control {
    margin-bottom: 15px;
  }
</style>
<!-- Main content -->
<section class="content-header">
  <h1>
    <?= $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?= $title ?></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border2">
          <h3 class="box-title">Email Unsubscribe Lists</h3>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table">
            <tr>
              <th style="width: 10px">#</th>
              <!-- <th>Image</th> -->
              <th>Email</th>
              <th>Date</th>
             
              <th>Actions</th>
              <!-- <th>Reply</th> -->

            </tr>
            <?php
            if (!empty($members)) {
              $i = 1;
              foreach ($members as $member) {
            ?>
                <tr>
                  <td><?= $i ?></td>
                  <td><?= $member->email_id?></td>
                  <td><?= date('d M Y', strtotime($member->created_at)); ?></td>

                 
               

                

                  <td>
                      <div class="action-button">
                        <button class="btn btn-xs btn-danger" style="margin-left: 5px;" title="Delete" data-toggle="tooltip" onclick="deleteUsers(<?= @$member->id ?>)">
                          <i class="fa fa-trash"></i>
                        </button>
                      </div>
                    </td>
                </tr>
                <!--start Modal for reply content-->
                <div class="modal fade" id="myModal<?= $i ?>" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Contact To <?= $member->fname ?></h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-8 col-md-offset-2">
                            <form action="<?= admin_url('members/member_reply/' . $member->id) ?>" method="post">
                              <input class="form-control" type="email" value="<?= $member->email ?>" name="email" readonly>
                              <textarea class="form-control" name="cmnts" rows="4"></textarea>
                              <input type="submit" value="Send" class="btn btn-primary">
                            </form>
                          </div>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
            <?php $i++; } } else { echo"<tr><td colspan='7' class='text-center red'><h3>No record available!</h3></td></tr>";} ?>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <?= $paginate ?>
        </div>
      </div>
    </div>
  </div>

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
        }, function(isConfirm) {
            if (isConfirm) {
                window.location.href = '<?= admin_url('settings/deleteUsers/') ?>' + id
            }
        });
    }
  </script>