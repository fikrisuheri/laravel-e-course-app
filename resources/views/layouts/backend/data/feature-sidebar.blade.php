<li
class="sidebar-item  has-sub">
<a href="#" class='sidebar-link'>
    <i class="bi bi-menu-down"></i>
    <span>Feature</span>
</a>
<ul class="submenu ">
    <li class="submenu-item ">
        <a href="{{ route('backend.feature.mitra.index') }}">{{ __('sidebar.mitra') }}</a>
    </li>
    <li class="submenu-item ">
        <a href="{{ route('backend.feature.course.index') }}">{{ __('sidebar.course') }}</a>
    </li>
    <li class="submenu-item ">
        <a href="{{ route('backend.feature.transaction.index') }}">{{ __('sidebar.transaction') }}</a>
    </li>
    <li class="submenu-item ">
        <a href="{{ route('backend.feature.withdraw.index') }}">{{ __('sidebar.witdrawal') }}</a>
    </li>
</ul>
</li>