<!-- <script src="<?php echo ASSETS_URL; ?>/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/plugins/DataTables_master/dataTables.css" />
<script src="<?php echo ASSETS_URL; ?>/plugins/DataTables_master/dataTables.js"></script> -->
<div class="card">
    <div class="card-header">
        รายละเอียดการบันทึกการเบิก
    </div>
    <div class="card-body">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table id="sum_example1" class="table table-bordered table-striped" hight="800px">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">#</th>
                                <th class="text-center" width="350px">รายละเอียดเบิก</th>
                                <th class="text-center" width="250px">ยอดเงินที่เบิก</th>
                                <th class="text-center" width="">จำนวนสัญญาที่บันทึก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i= 0;
                                $sum_amount_paied = 0;
                                $sum_lcont_id = 0;
                                //var_dump($data_dict);
                                foreach ($results_sum as $name=>$rows): 
                                $i++;
                                //$id = $encrypt->encode($rows['tnam'].','.$rows['cnam'].','.$rows['cmnt']);
                                //$id = $encrypt->encode($rows['id']);
                                //$id = bin2hex($encrypter->encrypt($rows['id']));
                                ?>
                            <tr>
                                <td class="text-center"><?php echo  number_format($i); ?></td>
                                <td><?php echo TRIM($rows['paied_name']); ?></td>
                                <td class="text-right"><?php echo number_format($rows['amount_paied']); ?></td>
                                <td class="text-right"><?php echo number_format($rows['lcont_id']); ?></td>
                            </tr>
                            <?php 
                            $sum_amount_paied += $rows['amount_paied'];
                            $sum_lcont_id += $rows['lcont_id'];
                            
                            endforeach; 
                                if ($i > 0){  ?>
                        <tfoot>
                            <tr>
                                <td class="text-center" colspan="2"> รวม</td>
                                <td class="text-right"><?php echo number_format($sum_amount_paied); ?></td>
                                <td class="text-right"><?php echo number_format($sum_lcont_id); ?></td>
                            </tr>
                        </tfoot>

                        <?php  }else{

                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->


        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="exampledetail" class="table table-bordered table-striped" hight="800px">
                        <thead>
                            <tr>
                                <th class="text-center" width="50px">#</th>
                                <th class="text-center" width="150px">เลขที่สัญญา</th>
                                <th class="text-center" width="150px">วันที่จ่าย</th>
                                <th class="text-center" width="300px">ประเภทการจ่าย</th>

                                <th class="text-center">ยอดที่จ่าย</th>

                                <th class="text-center">รายละเอียด1</th>
                                <th class="text-center">รายละเอียด2</th>
                                <th class="text-center" width="250px">ผู้บันทึก</th>

                                <th class="text-center" width="250px">วันที่บันทึก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i= 0;
                                $sum_amount_paied = 0;
                                $sum_lcont_id = 0;
                                //var_dump($data_dict);
                                foreach ($results_detail as $name=>$rows): 
                                $i++;
                                //$id = $encrypt->encode($rows['tnam'].','.$rows['cnam'].','.$rows['cmnt']);
                                //$id = $encrypt->encode($rows['id']);
                                //$id = bin2hex($encrypter->encrypt($rows['id']));
                                ?>
                            <tr>
                                <td class="text-center"><?php echo  number_format($i); ?></td>
                                <td><?php echo TRIM($rows['lcont_id']); ?></td>
                                <td class="text-center"><?php echo $rows['Data_date_paied']; ?></td>


                                <td class="text-center"><?php echo '('.$rows['paied_type'].') '.$rows['paied_nameB']; ?>
                                <td class="text-right"><?php echo number_format($rows['amount_paied']); ?></td>


                                <td class="text-right"><?php echo ($rows['paied_nameA']); ?></td>
                                <td class="text-right"><?php echo ($rows['remark1']); ?></td>
                                </td>
                                <td class="text-center"><?php echo ($rows['user_name']); ?></td>
                                <td class="text-center"><?php echo ($rows['update_time']); ?></td>
                            </tr>
                            <?php 
                            $sum_amount_paied = $sum_amount_paied+$rows['amount_paied'];
                            endforeach; 
                                if ($i > 0){  ?>

                            <?php  }else{ ?>

                            <!-- <tr>
                                <td class="text-center" colspan="9"> ไม่พบข้อมูล</td>
                            </tr> -->

                            <?php   }   ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right"> รวมเบิก</td>
                                <td><?php echo number_format($sum_amount_paied); ?></td>
                                <td colspan="4"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    // $('#exampledetail').DataTable({
    //     "lengthChange": false,
    //     "searching": true,
    //     "ordering": true,
    //     "autoWidth": false,
    //     "responsive": true,
    //     buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    // });
});

$(document).ready(function() {
    new DataTable('#exampledetail', {
        layout: {
            topStart: {
                buttons: [{
                        extend: 'excel',
                        text: 'Excel',
                        filename: function() {
                            var iocNumber = $('#ioc_number').val();
                            var iocNumber = iocNumber.replace(/\//g, '_');
                            return 'รายละเอียดการบันทึกการเบิก IOC ' + iocNumber;
                        },
                        messageTop: function() {
                            var iocNumber = $('#ioc_number').val();
                            return 'รายละเอียดการบันทึกการเบิก IOC No.: ' + (iocNumber ?
                                iocNumber : '_');
                        }
                    },
                    'copy'
                ]
            }
        },
        // options: {
        //     lengthChange: false,
        //     searching: true,
        //     ordering: true,
        //     autoWidth: false,
        //     responsive: true,
        //     deferRender: true // เปิดใช้งาน defer rendering
        // }

    });

    $('#sum_example1').DataTable({
        dom: 'Bfrtip', // เปิดใช้งานเฉพาะปุ่ม Export
        buttons: [{
            extend: 'excel',
            text: 'Excel',
            filename: function() {
                var iocNumber = $('#ioc_number').val();
                iocNumber = iocNumber.replace(/\//g, '_');
                return 'รวมรายละเอียดการบันทึกการเบิก IOC ' + iocNumber;
            },
            messageTop: function() {
                var iocNumber = $('#ioc_number').val();
                return 'รวมรายละเอียดการบันทึกการเบิก IOC No.: ' + (iocNumber ? iocNumber :
                    '_');
            }
        }],
        paging: false, // ปิดการแบ่งหน้า
        info: false, // ปิดข้อความ Showing entries
        searching: false, // ปิดช่อง Search
        ordering: false, // ปิดการเรียงลำดับ
        lengthChange: false, // ปิดตัวเลือกจำนวนแถวต่อหน้า
        autoWidth: false, // ปิดการปรับความกว้างอัตโนมัติ
        responsive: false // ปิดการตอบสนอง
    });

});
</script>