<div class="card">
    <div class="card-body">
        <div id="examplesearch"></div>
        <table id="example1" class="table table-bordered table-striped" hight="800px">
            <thead>
                <tr>
                    <th width="50px">#</th>
                    <th width="200px">Table Nmae</th>
                    <th width="200px">Collumns Name</th>
                    <th>Coment</th>
                    <th width="100px">หมายเหตุ</th>
                    <th width="100px">เมนู</th>
                </tr>
            </thead>
            <tbody>
                <?php 
    $i= 0;
    //var_dump($data_dict);
    foreach ($data_dict as $name=>$rows): 
    $i++;
    //$id = $encrypt->encode($rows['tnam'].','.$rows['cnam'].','.$rows['cmnt']);
    
    //$id = $encrypt->encode($rows['id']);
    $id = bin2hex($encrypter->encrypt($rows['id']));
    


    ?>
                <tr>
                    <td><?php echo  number_format($i); ?></td>
                    <td><?php echo $rows['tnam']; ?></td>
                    <td><?php echo $rows['cnam']; ?></td>
                    <td><?php echo $rows['cmnt']; ?></td>
                    <td></td>
                    <td>
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">...</button> -->
                        <?php
        echo "<a href='javascript:void(0);' onclick=\"edit_data_dict('$id');\" type='button' class='btnt'><i class='fa fa-edit'></i></a>";
      ?>

                        <!-- <button id="btn_get_report" onclick="return edit_data_dict()" type="button" class="btnt"><i
        class="fas fa-bars"></i>
      </button> -->

                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">บันทึก/แก้ไข ข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="detail"></div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable({
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "autoWidth": false,
        "responsive": true
    });
});





function edit_data_dict(id) {
    var p = {};
    alert(id);
    p['id'] = id;
    var $modalDialog = $("#modal_overlay");
    $modalDialog.modal('show');
    $.ajax({
        type: 'post',
        data: p,
        url: "<?php echo site_url('Mainpage/edit_data_dict') ?>",
        dataType: 'html',
        success: function(data) {
            $('#detail').html(data);
            setTimeout(function() {
                $modalDialog.modal('hide');
            }, 500);
            $("#exampleModal").modal('show');
        },
        error: function(data) {
            setTimeout(function() {
                $modalDialog.modal('hide');
            }, 500);
            Swal.fire("Cancelled", "ไม่สามารถดำเนินการได้ โปรดออกจากระบบแล้วลองใหม่!!! ",
                "error"); // "ไม่สามารถ 
        }
    });
}
</script>