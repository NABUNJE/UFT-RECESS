<li class="<?php echo e(Request::is('dashboard*') ? 'active' : 'yes'); ?>">
    <a href="<?php echo route('dashboard.index'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span>  </a>
</li>

<li class="<?php echo e(Request::is('agents*') ? 'active' : ''); ?>">
    <a href="<?php echo route('agents.index'); ?>"><i class="fa fa-edit"></i><span>Agents</span></a>
</li>

<li class="<?php echo e(Request::is('treasuries*') ? 'active' : ''); ?>">
    <a href="<?php echo route('treasuries.index'); ?>"><i class="ion ion-cash"></i><span>Treasuries</span></a>
</li>

<li class="<?php echo e(Request::is('districts*') ? 'active' : ''); ?>">
    <a href="<?php echo route('districts.index'); ?>"><i class="fa fa-edit"></i><span>Districts</span></a>
</li>

<li class="<?php echo e(Request::is('payments*') ? 'active' : ''); ?>">
    <a href="<?php echo route('payments.index'); ?>"><i class="fa fa-edit"></i><span>Payments</span></a>
</li>

<li class="<?php echo e(Request::is('members*') ? 'active' : ''); ?>">
    <a href="<?php echo route('members.index'); ?>"><i class="fa fa-edit"></i><span>Members</span></a>
</li>

<?php /**PATH /home/hix/UFT/resources/views/layouts/menu.blade.php ENDPATH**/ ?>