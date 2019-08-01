<<<<<<< HEAD
<div class="table-responsive">
    <table class="table" id="agents-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>District</th>
        <th>Role</th>
        <th>Salary</th>
        <th>Signature</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo $agent->name; ?></td>
            <td><?php echo $agent->district; ?></td>
            <td><?php echo $agent->role; ?></td>
            <td><?php echo $agent->salary; ?></td>
            <td><?php echo $agent->signature; ?></td>

                <td>
                    <?php echo Form::open(['route' => ['agents.destroy', $agent->id], 'method' => 'delete']); ?>
=======
<?php $__env->startSection('css'); ?>
    <?php echo $__env->make('layouts.datatables_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
>>>>>>> 236792f5ad063b3b68d60be9f843ae454ec0c4cd

<?php echo $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']); ?>


<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('layouts.datatables_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $dataTable->scripts(); ?>

<?php $__env->stopSection(); ?><?php /**PATH /home/hix/UFT-RECESS/UFT/resources/views/agents/table.blade.php ENDPATH**/ ?>