<div class="container-full">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    สอบถามข้อมูลการบันทึกการเบิก
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="form-group mb-2 col-md-2">
                                <label class="form-label">IOC Number</label>
                                <input type="text" class="form-control" id="ioc_number" name="ioc_number"
                                    placeholder="ioc number">
                            </div>
                            <div class="form-group col-md-2 mb-0 align-self-end">
                                <button type="button" class="btn btn-primary mb-2"
                                    onclick="return get_data_expense()"><i class="fas fa-play"></i>
                                    &nbsp;&nbsp;&nbsp;ดึงข้อมูล</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="debtor_card_diskplay">
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
function get_data_expense() {
    //var options = $('input[name=options]:checked').val();
    var res = false
    if ($('#ioc_number').val() != '') {
        res = true
    }

    if (res) {
        var p = {};
        p['ioc_number'] = $('#ioc_number').val();
        // p['lcont_id'] = $('#lcont_id').val();
        // p['member_name'] = $('#member_name').val();
        //alert(p['options']);
        var $modalDialog = $("#modal_overlay");
        $modalDialog.modal('show');
        $.ajax({
            type: 'post',
            url: "<?php echo site_url('/Expenseinspec/get_data_expense') ?>",
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
                }, 500);
                Swal.fire("Cancelled", "ไม่สามารถดำเนินการได้ โปรดออกจากระบบแล้วลองใหม่!!! ",
                    "error"); // "ไม่สามารถ 
            }
        });

    } else {
        Swal.fire("แจ้งเตือน", "ไม่สามารถดำเนินการได้ โปรดระบุข้อมูลที่ต้องการค้นหา ", "error");
    }

}
</script>

<div class="modal fade" id="modal_xl" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">บันทึกเพิ่ม Comment</h4>
            </div>
            <div class="modal-body">
                <div id="add_data_dict"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->