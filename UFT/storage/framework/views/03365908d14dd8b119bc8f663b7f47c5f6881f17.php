<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Agent
        </h1>
   </section>
   <div class="content">
       <?php echo $__env->make('adminlte-templates::common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   <?php echo Form::model($agent, ['route' => ['agents.update', $agent->id], 'method' => 'patch']); ?>


                        <?php echo $__env->make('agents.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                   <?php echo Form::close(); ?>

               </div>
           </div>
       </div>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hix/UFT-RECESS/UFT/resources/views/agents/edit.blade.php ENDPATH**/ ?>