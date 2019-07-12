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
            <tr>
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
                        <a href="<?php echo route('members.edit', [$member->id]); ?>" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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