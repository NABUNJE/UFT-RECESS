<div class="table-responsive">
    <table class="table" id="payments-table">
        <thead>
            <tr>
                <th>Role</th>
        <th>Salary</th>
        <th>Number</th>
        <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo $payment->Role; ?></td>
            <td><?php echo $payment->Salary; ?></td>
            <td><?php echo $payment->Number; ?></td>
            <td><?php echo $payment->Total; ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/hix/UFT-RECESS/UFT/resources/views/payments/table.blade.php ENDPATH**/ ?>