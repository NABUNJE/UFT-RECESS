<<<<<<< HEAD
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
=======
<?php $__env->startSection('css'); ?>
    <?php echo $__env->make('layouts.datatables_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']); ?>


<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('layouts.datatables_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $dataTable->scripts(); ?>

<?php $__env->stopSection(); ?><?php /**PATH /home/hix/UFT-RECESS/UFT/resources/views/payments/table.blade.php ENDPATH**/ ?>
>>>>>>> 236792f5ad063b3b68d60be9f843ae454ec0c4cd
