<!-- Name Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('name', 'Name:'); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('district', 'District:'); ?>

    <?php echo Form::text('district', null, ['class' => 'form-control']); ?>

</div>

<!-- Admin Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('admin', 'Admin:'); ?>

    <?php echo Form::text('admin', null, ['class' => 'form-control']); ?>

</div>

<!-- Signature Field -->
<div class="form-group col-sm-6">
    <?php echo Form::label('signature', 'Signature:'); ?>

    <?php echo Form::text('signature', null, ['class' => 'form-control']); ?>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('agents.index'); ?>" class="btn btn-default">Cancel</a>
</div>
<?php /**PATH /home/hix/UFT/resources/views/agents/fields.blade.php ENDPATH**/ ?>