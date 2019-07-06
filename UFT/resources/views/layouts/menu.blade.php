<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{!! route('dashboard.index') !!}"><i class="fa fa-dashboard"></i> <span>Dashboard</span>  </a>
</li>

<li class="{{ Request::is('agents*') ? 'active' : '' }}">
    <a href="{!! route('agents.index') !!}"><i class="fa fa-edit"></i><span>Agents</span></a>
</li>

<li class="{{ Request::is('treasuries*') ? 'active' : '' }}">
    <a href="{!! route('treasuries.index') !!}"><i class="ion ion-cash"></i><span>Treasuries</span></a>
</li>

<li class="{{ Request::is('districts*') ? 'active' : '' }}">
    <a href="{!! route('districts.index') !!}"><i class="fa fa-edit"></i><span>Districts</span></a>
</li>

<li class="{{ Request::is('payments*') ? 'active' : '' }}">
    <a href="{!! route('payments.index') !!}"><i class="fa fa-edit"></i><span>Payments</span></a>
</li>

<li class="{{ Request::is('members*') ? 'active' : '' }}">
    <a href="{!! route('members.index') !!}"><i class="fa fa-edit"></i><span>Members</span></a>
</li>

<li class="{{ Request::is('administrators*') ? 'active' : '' }}">
    <a href="{!! route('administrators.index') !!}"><i class="fa fa-edit"></i><span>Administrators</span></a>
</li>

