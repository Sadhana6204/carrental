<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaction Completed</h1>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <?php foreach($booking as $t){ ?>
        <form action="<?php echo base_url().'admin/booking_selesai_act' ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $t->booking_id ?>">
            <input type="hidden" name="customer" value="<?php echo $t->booking_customer ?>">
            <input type="hidden" name="car" value="<?php echo $t->booking_car ?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Customer</label>
                <div class="col-sm-10">
                    <select class="form-control" disabled>
                        <option value="" disabled>Choose Customer</option>
                        <?php foreach($customer as $k){ ?>
                        <option value="<?php echo $k->customer_id ?>"<?php echo ($t->booking_customer == $k->customer_id) ? ' selected':''; ?>><?php echo $k->customer_name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Car</label>
                <div class="col-sm-10">
                    <select class="form-control" disabled>
                        <option value="" disabled>Choose a Car</option>
                        <?php foreach($car as $m){ ?>
                        <option value="<?php echo $m->car_id ?>"<?php echo ($t->booking_car == $m->car_id) ? ' selected':''; ?>><?php echo $m->car_brand ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Borrow Date</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="borrow" value="<?php echo $t->booking_borrow ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Return Date</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="return" value="<?php echo $t->booking_return ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="price" value="<?php echo $t->booking_price ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Per-Day Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="fine" value="<?php echo $t->booking_fine ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Date of return</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="returned">
                </div>
                <?php echo form_error('returned'); ?>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</div>