<li class="{{ Request::is('admin/models/vacations*') ? 'active' : '' }}">
    <a href="{!! route('admin.models.vacations.index') !!}">
    <i class="livicon" data-c="#6CC66C" data-hc="#6CC66C" data-name="home" data-size="18"
               data-loop="true"></i>
               Vacations
    </a>
</li>

<li class="{{ Request::is('admin/models/holidays*') ? 'active' : '' }}">
    <a href="{!! route('admin.models.holidays.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="image" data-size="18"
               data-loop="true"></i>
               Holidays
    </a>
</li>

