<<<<<<< HEAD
<div class="table-responsive">
    <table class="table" id="members-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
        <th>District</th>
        <th>Recommender</th>
        <th>Dateofenroll</th>
        <th>Gender</th>
        <th>Agent</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <?php $__currentLoopData = $names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <?php if($name == $member->name): ?>
                        <tr style="background-color:aqua">
                <?php else: ?>
                     <tr>
                    <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <td><?php echo $member->id; ?></td>
                        <td><?php echo $member->name; ?></td>
                        <td><?php echo $member->district; ?></td>
                        <td><?php echo $member->recommender; ?></td>
                        <td><?php echo $member->DateOfEnroll; ?></td>
                        <td><?php echo $member->gender; ?></td>
                        <td><?php echo $member->agent; ?></td>
                            <td>
                                <?php echo Form::open(['route' => ['members.destroy', $member->id], 'method' => 'delete']); ?>

                                <div class='btn-group'>
                                    <a href="<?php echo route('members.show', [$member->id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                                </div>
                                <?php echo Form::close(); ?>

                            </td>
                        </tr>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/hix/UFT-RECESS/UFT/resources/views/members/table.blade.php ENDPATH**/ ?>
=======
<?php $__env->startSection('css'); ?>
    <?php echo $__env->make('layouts.datatables_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']); ?>


<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('layouts.datatables_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $dataTable->scripts(); ?>

<?php $__env->stopSection(); ?><?php /**PATH /home/hix/UFT-RECESS/UFT/resources/views/members/table.blade.php ENDPATH**/ ?>
>>>>>>> 236792f5ad063b3b68d60be9f843ae454ec0c4cd
