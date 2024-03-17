<!-- Page Heading -->
<?php $page='transaction';?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaction Data</h1>
    <a href="<?php echo base_url().'admin/booking_add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> New Transaction</a>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Customer/Car</th>
                        <th>Borrow/Return</th>
                        <th>Price</th>
                        <th>Fine P.D</th>
                        <th>Returned</th>
                        <th>Penalty</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach($booking as $t){
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y',strtotime($t->booking_billd)); ?></td>
                        <td><?php echo '<i class="fas fa-user"> </i> '.$t->customer_name.'<br><hr /><i class="fas fa-car"></i> '.$t->car_brand ?></td>
                        <td><?php echo date('d/m/Y',strtotime($t->booking_borrow)).'<br><hr />'.date('d/m/Y',strtotime($t->booking_return)); ?></td>
                        <td><?php echo 'Rs. '.number_format($t->booking_price) ?></td>
                        <td><?php echo 'Rs. '.number_format($t->booking_fine) ?></td>
                        <td><?php echo ($t->booking_returned == '0000-00-00') ? '--' : date('d/m/Y',strtotime($t->booking_returned)); ?></td>
                        <td><?php echo 'Rs. '.number_format($t->booking_totalfine) ?></td>
                        <td>
                            <?php
                            if($t->booking_status == 1){
                                echo '<span class="badge badge-success">Complete</span>';
                            } else {
                            ?>
                            <a class="btn btn-info btn-sm btn-block" href="<?php echo base_url().'admin/booking_selesai/'.$t->booking_id; ?>">
                                <i class="fas fa-check"></i>
                            </a>
                            <a class="btn btn-danger btn-sm btn-block" href="<?php echo base_url().'admin/booking_hapus/'.$t->booking_id; ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>