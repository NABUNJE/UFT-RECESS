<<<<<<< HEAD
<?php if(auth()->guard()->check()): ?>
    <?php $__env->startSection('content'); ?>
        <section class="content-header">
            <h1 class="pull-left">Members</h1>
            <h1 class="pull-right">
            </h1>
        </section>
        <div class="content">
            <div class="clearfix"></div>
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
=======
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1 class="pull-left">Members</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
>>>>>>> 236792f5ad063b3b68d60be9f843ae454ec0c4cd

            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body">
                        <?php echo $__env->make('members.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hix/UFT-RECESS/UFT/resources/views/members/index.blade.php ENDPATH**/ ?>