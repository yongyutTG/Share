<div class="card">
    <div class="card-header">
        รายละเอียดการสืบทรัพย์
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane " id="invast_land_1">
                <!-- sadasdasdasdasdasdasdasdasdasd -->
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <?php $i = 0;
                                    $tab_active = '';
                                foreach ($results_count_invest_no as $row) { 
                                    $i = $i+1; 
                                    
                                    if($i == 1 ){
                                        $tab_active = 'active';
                                    }else{
                                        $tab_active = '';
                                    }
                                    
                                    ?>

                            <li class="nav-item"><a class="<?php echo $tab_active; ?> nav-link"
                                    href="#invast_land_<?php echo $row['invest_no']; ?>" data-toggle="tab">รอบที่
                                    <?php echo $row['invest_no']; ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <?php 
                            $j = 0; // ตัวนับลูปที่สอง
                            foreach ($results_count_invest_no as $row) { 
                                $j = $j+1; 
                                
                                if($j == 1 ){
                                    $tab_active = 'active';
                                }else{
                                    $tab_active = '';
                                }
                                
                                                            ?>
                            <div class="<?php echo $tab_active; ?>  tab-pane"
                                id="invast_land_<?php echo $row['invest_no']; ?>">

                                <div style="overflow: auto">
                                    <table id="exampledetail2" class="table table-bordered table-striped" hight="800px">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="50px">#</th>
                                                <th width="250px">
                                                    ชื่อกรรมสิทธิ์ที่ดิน</th>
                                                <th width="150px">
                                                    รายละเอียด</th>
                                                <th width="300px">
                                                    รายละเอียด</th>

                                                <th>รายละเอียด1</th>
                                                <th>รายละเอียด2</th>
                                                <th>ราคาประเมิน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                                        $i= 0;
                                                                        $sum_amount_paied = 0;
                                                                        $sum_lcont_id = 0;
                                                                        //var_dump($data_dict);
                                                                        foreach ($results_invest_detail as $name=>$rows_detail){ 
                                                                        $i++;
                                                                        if($rows_detail['invest_no'] == $row['invest_no']){ ?>

                                            <tr>
                                                <td class="text-center">
                                                    <?php echo  $rows_detail['seq_no'];?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo  $rows_detail['proprietor_name']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo  trim($rows_detail['deed_no']); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo  trim($rows_detail['sub_district_no']); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo  trim($rows_detail['remark1']); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo  trim($rows_detail['remark2']); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo number_format($rows_detail['evaluation_amount']);?>
                                                </td>

                                            </tr>
                                            <?php
                                            
                                                }
                                                    ?>

                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <?php } ?>

                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->



            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="invast_office">
                <div style="overflow: auto">
                </div>
            </div>
            <!-- /.tab-pane -->

            <!-- /.tab-pane -->
            <div class="tab-pane" id="invast_car">
                <div style="overflow: auto">
                </div>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->
</div>



<script type="text/javascript">
$(document).ready(function() {
    // $('#exampledetail2').DataTable({
    //     "lengthChange": false,
    //     "searching": true,
    //     "ordering": false,
    //     "autoWidth": false,
    //     "responsive": false,
    // });
});
</script>