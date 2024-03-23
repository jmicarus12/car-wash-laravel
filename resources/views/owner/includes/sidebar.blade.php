<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('owner.dashboard')"
                :active="activeClass(Route::is('owner.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('owner.services.index')"
                :active="activeClass(Route::is('owner.services.*'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Services')" />
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('owner.store.index')"
                :active="activeClass(Route::is('owner.store.*'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Store')" />
        </li>
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
