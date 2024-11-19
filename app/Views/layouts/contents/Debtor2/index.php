<div class="container-full">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    สอบถามข้อมูลลูกหนี้นิติกร
                </div>
                <div class="card-body">
                    <form class="form-inline">
                        <div class="form-group mb-2">
                            <label class="sr-only">เลขสมาชิก</label>
                            <input type="text" class="form-control" id="mem_id" placeholder="เลขสมาชิก">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label class="sr-only">เลขพนักงาน</label>
                            <input type="text" class="form-control" id="emp_id" placeholder="เลขพนักงาน">
                        </div>
                        <div class="form-group mx-sm-2 mb-2">
                            <label class="sr-only">เลขสัญญา</label>
                            <input type="text" class="form-control" id="lcont_id" placeholder="เลขสัญญา">
                        </div>
                        <div class="form-group mx-sm-2 mb-2">
                            <label class="sr-only">ชื่อ-นามสกุล สมาชิก</label>
                            <input type="text" class="form-control" id="member_name" placeholder="ชื่อสมาชิก">
                        </div>
                        <button type="button" class="btn btn-primary mb-2" onclick="return get_data_debtor()"><i
                                class="fas fa-play"></i> &nbsp;&nbsp;&nbsp;ดึงข้อมูล</button>
                    </form>
                </div>
                <?php 
                        //echo '<br>'; 
                            //echo $test.'<br>'; 
                            //echo $test2.'<br>'; 
                        
                        
                        ?>
            </div>
        </div>
    </div>
</div>

<div id="debtor_card_diskplay">

</div>

<script type="text/javascript">
// $(document).ready(function() {
//     //data_dict()
// });

function get_data_debtor() {
    //alert($('#mem_id').val());
    var p = {};
    p['mem_id'] = $('#mem_id').val();
    p['emp_id'] = $('#emp_id').val();
    p['lcont_id'] = $('#lcont_id').val();
    p['member_name'] = $('#member_name').val();
    //alert(p['options']);

    var $modalDialog = $("#modal_overlay");
    $modalDialog.modal('show');
    //alert();
    $.ajax({
        type: 'post',
        url: "<?php echo site_url('Debtor/get_data_debtor') ?>",
        data: p,
        dataType: 'html',
        success: function(data) {
            $('#debtor_card_diskplay').html(data);
            setTimeout(function() {
                $modalDialog.modal('hide');
            }, 500);
        },
        error: function(data) {
            setTimeout(function() {
                $modalDialog.modal('hide');
            }, 100);
            Swal.fire("Cancelled", "ไม่สามารถดำเนินการได้ โปรดออกจากระบบแล้วลองใหม่!!! ",
                "error"); //  
        }
    });
}
</script>