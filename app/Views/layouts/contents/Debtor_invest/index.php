<div class="container-full">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    สอบถามข้อมูลสืบทรัพย์
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="form-group mb-2 col-md-2">
                                <label class="form-label">เลขสมาชิก</label>
                                <input type="text" class="form-control" id="mem_id" placeholder="เลขสมาชิก">
                            </div>
                            <div class="form-group col-md-2 mb-2">
                                <label class="form-label">เลขพนักงาน</label>
                                <input type="text" class="form-control" id="emp_id" placeholder="เลขพนักงาน">
                            </div>
                            <div class="form-group col-md-2 mb-2">
                                <label class="form-label">ชื่อ-นามสกุล สมาชิก</label>
                                <input type="text" class="form-control " id="member_name" placeholder="ชื่อ-นามสกุล">
                            </div>
                            <!-- <div class="form-group col-md-2 mb-0 align-self-end">
                                <button type="button" class="btn btn-primary mb-2" onclick="return get_data_debtor()"><i
                                        class="fas fa-play"></i> &nbsp;&nbsp;&nbsp;ดึงข้อมูล</button>
                            </div> -->

                        </div>
                    </form>
                </div>
            </div>
            <div id="debtor_card_diskplay"></div>
        </div>
    </div>
</div>




<script type="text/javascript">
$(document).ready(function() {
    const inputs = document.querySelectorAll('input');
    $(inputs).on('click', function() {
        inputs.forEach(input => input.value = '');
    });


    $("#member_name").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url('General/auto_get_member'); ?>",
                type: 'post',
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // ทำอะไรบางอย่างเมื่อเลือกค่า
            //console.log(ui.item.value); // id ของผู้ใช้ที่เลือก
            $('#mem_id').val(ui.item.mem_id);
            $('#emp_id').val(ui.item.emp_id);
            $('#member_name').val(ui.item.full_name);
            get_data_debtor();
            return false;
        }
    });

    $("#emp_id").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url('General/auto_get_empid'); ?>",
                type: 'post',
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // ทำอะไรบางอย่างเมื่อเลือกค่า
            //console.log(ui.item.value); // id ของผู้ใช้ที่เลือก
            $('#emp_id').val(ui.item.emp_id);
            $('#mem_id').val(ui.item.mem_id);
            $('#member_name').val(ui.item.full_name);
            get_data_debtor();
            return false;
        }
    });


    $("#mem_id").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url('General/auto_get_memid'); ?>",
                type: 'post',
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // ทำอะไรบางอย่างเมื่อเลือกค่า
            //console.log(ui.item.value); // id ของผู้ใช้ที่เลือก.
            $('#mem_id').val(ui.item.mem_id);
            $('#emp_id').val(ui.item.emp_id);
            $('#member_name').val(ui.item.full_name);
            get_data_debtor();
            return false;
        }
    });

});

function get_m_data_debtor(mem_id, emp_id) {
    var p = {};
    p['mem_id'] = mem_id;
    p['emp_id'] = emp_id;

    $.ajax({
        type: 'post',
        url: "<?php echo site_url('/Debtor_invest/get_m_data_debtor') ?>",
        data: p,
        dataType: "json",
        success: function(data) {
            //alert(data);
            //mem_id  emp_id
            $('#mem_id').val(data.mem_id);
            $('#emp_id').val(data.empid);
            $('#member_name').val(data.full_name);

        },
        error: function(data) {
            //alert(data);
        }
    });

}

function get_data_debtor() {
    //var options = $('input[name=options]:checked').val();
    var res = false
    if ($('#mem_id').val() != '') {
        res = true
    }
    if ($('#emp_id').val() != '') {
        res = true
    }
    if (res) {
        get_m_data_debtor($('#mem_id').val(), $('#emp_id').val());
        var p = {};
        p['mem_id'] = $('#mem_id').val();
        p['emp_id'] = $('#emp_id').val();

        var $modalDialog = $("#modal_overlay");
        $modalDialog.modal('show');
        $.ajax({
            type: 'post',
            url: "<?php echo site_url('/Debtor_invest/get_data_debtor') ?>",
            data: p,
            dataType: 'html',
            success: function(data) {
                $('#debtor_card_diskplay').html(data);
                setTimeout(function() {
                    $modalDialog.modal('hide');
                }, 300);
            },
            error: function(data) {
                setTimeout(function() {
                    $modalDialog.modal('hide');
                }, 300);
                Swal.fire("Cancelled", "ไม่สามารถดำเนินการได้ โปรดรอสักครู่ลองใหม่อีกครั้ง!!! ",
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