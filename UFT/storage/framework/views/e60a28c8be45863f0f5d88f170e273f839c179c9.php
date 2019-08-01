<<<<<<< HEAD
<?php if(auth()->guard()->check()): ?>
    <?php $__env->startSection('content'); ?>
        <section class="content-header">
            <h1 class="pull-left">Treasuries</h1>
            <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="<?php echo route('treasuries.create'); ?>">Add New</a>
            </h1>
        </section>
        <div class="content">
            <div class="clearfix"></div>
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
=======
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1 class="pull-left">Treasuries</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
>>>>>>> 236792f5ad063b3b68d60be9f843ae454ec0c4cd

            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body">
                        <?php echo $__env->make('treasuries.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
<<<<<<< HEAD
    <?php $__env->stopSection(); ?>
=======
        <div class="text-center">

        </div>
    </div>
<?php $__env->stopSection(); ?>
>>>>>>> 236792f5ad063b3b68d60be9f843ae454ec0c4cd

<?php endif; ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hix/UFT-RECESS/UFT/resources/views/treasuries/index.blade.php ENDPATH**/ ?>