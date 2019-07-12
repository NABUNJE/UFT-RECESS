<div class="table-responsive">
    <table class="table" id="treasuries-table">
        <thead>
            <tr>
                <th>Amount</th>
        <th>Well-Wisher</th>
        <th>Received-On</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $treasuries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treasury): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo $treasury->amount; ?></td>
            <td><?php echo $treasury->well_wisher; ?></td>
            <td><?php echo $treasury->received_on; ?></td>
                <td>
                    <?php echo Form::open(['route' => ['treasuries.destroy', $treasury->id], 'method' => 'delete']); ?>

                    <div class='btn-group'>
                        <a href="<?php echo route('treasuries.show', [$treasury->id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="<?php echo route('treasuries.edit', [$treasury->id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/hix/UFT-RECESS/UFT/resources/views/treasuries/table.blade.php ENDPATH**/ ?>