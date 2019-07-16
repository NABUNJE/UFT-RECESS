<div class="table-responsive">
    <table class="table" id="agents-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>District</th>
        <th>Signature</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo $agent->name; ?></td>
            <td><?php echo $agent->district; ?></td>
            <td><?php echo $agent->signature; ?></td>
                <td>
                    <?php echo Form::open(['route' => ['agents.destroy', $agent->id], 'method' => 'delete']); ?>

                    <div class='btn-group'>
                        <a href="<?php echo route('agents.show', [$agent->id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="<?php echo route('agents.edit', [$agent->id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        <?php echo Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/hix/UFT-RECESS/UFT/resources/views/agents/table.blade.php ENDPATH**/ ?>