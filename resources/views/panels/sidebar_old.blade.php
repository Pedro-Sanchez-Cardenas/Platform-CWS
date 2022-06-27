@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' || $configData['theme'] === 'semi-dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header mb-1">
        <ul class="nav navbar-nav flex-row">
            <li class="me-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <svg class="m-0 p-0" width="45" height="45" viewBox="0 0 210.53125 210.52734" version="1.1"
                        id="svg1323" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                        <defs id="defs1327">
                            <filter style="color-interpolation-filters:sRGB" id="filter9526" x="-0.53269434"
                                y="-0.36042801" width="2.0169621" height="1.8409986">
                                <feFlood flood-opacity="0.498039" flood-color="rgb(0,0,0)" result="flood"
                                    id="feFlood9516" />
                                <feComposite in="flood" in2="SourceGraphic" operator="out" result="composite1"
                                    id="feComposite9518" />
                                <feGaussianBlur in="composite1" stdDeviation="25" result="blur"
                                    id="feGaussianBlur9520" />
                                <feOffset dx="-6" dy="20" result="offset" id="feOffset9522" />
                                <feComposite in="offset" in2="SourceGraphic" operator="atop" result="composite2"
                                    id="feComposite9524" />
                            </filter>
                            <filter style="color-interpolation-filters:sRGB" id="filter10264" x="-0.41847676"
                                y="-0.78684491" width="1.7989101" height="2.8359714">
                                <feFlood flood-opacity="0.498039" flood-color="rgb(0,0,0)" result="flood"
                                    id="feFlood10254" />
                                <feComposite in="flood" in2="SourceGraphic" operator="out" result="composite1"
                                    id="feComposite10256" />
                                <feGaussianBlur in="composite1" stdDeviation="25" result="blur"
                                    id="feGaussianBlur10258" />
                                <feOffset dx="-6" dy="20" result="offset" id="feOffset10260" />
                                <feComposite in="offset" in2="SourceGraphic" operator="atop" result="composite2"
                                    id="feComposite10262" />
                            </filter>
                            <filter style="color-interpolation-filters:sRGB" id="filter10276" x="-0.63459158"
                                y="-0.31831557" width="2.211493" height="1.7427363">
                                <feFlood flood-opacity="0.498039" flood-color="rgb(0,0,0)" result="flood"
                                    id="feFlood10266" />
                                <feComposite in="flood" in2="SourceGraphic" operator="out" result="composite1"
                                    id="feComposite10268" />
                                <feGaussianBlur in="composite1" stdDeviation="25" result="blur"
                                    id="feGaussianBlur10270" />
                                <feOffset dx="-6" dy="20" result="offset" id="feOffset10272" />
                                <feComposite in="offset" in2="SourceGraphic" operator="atop" result="composite2"
                                    id="feComposite10274" />
                            </filter>
                        </defs>

                        <g id="g2538" transform="translate(-145.43359,-205.94531)" style="display:inline">
                            <path
                                style="fill:#1e357a;fill-opacity:1;fill-rule:nonzero;stroke:none;filter:url(#filter10264)"
                                d="m 250.69922,380.03125 c -0.75391,0 -1.48828,-0.0742 -2.23438,-0.11328 -0.8789,0.0351 -1.76172,0.0664 -2.66015,0.0664 -18.30469,0 -40.23828,-6.85156 -65.33985,-20.41796 -13.45703,-7.27344 -24.63281,-14.83594 -30.94922,-19.34766 12.59766,44.02344 53.11329,76.25391 101.1836,76.25391 20.8125,0 40.19922,-6.0625 56.53125,-16.48829 -0.96875,-11.33984 -5.82031,-33.65625 -11.69141,-55.82421 -4.61719,20.52343 -22.92187,35.87109 -44.83984,35.87109"
                                id="path1301" />
                            <path
                                style="fill:#007fca;fill-opacity:1;fill-rule:nonzero;stroke:none;filter:url(#filter9526)"
                                d="m 204.70703,334.03906 c 0,-19.26953 20.14063,-61.25 34.67188,-81.33203 l 29.95312,-45.08594 c -6.05078,-1.08203 -12.27344,-1.67578 -18.63281,-1.67578 -58.13672,0 -105.26563,47.12891 -105.26563,105.26172 0,7.40234 0.77344,14.625 2.22657,21.59375 5.47265,4.14063 41.92578,30.98047 77.71093,39.61328 -12.44531,-8.23047 -20.66406,-22.33594 -20.66406,-38.375"
                                id="path1303" />
                            <g id="g10647">
                                <path
                                    style="fill:#00aea8;fill-opacity:1;fill-rule:nonzero;stroke:none;filter:url(#filter10276)"
                                    d="m 355.96484,311.20703 c 0,-50.26953 -35.25,-92.28125 -82.37109,-102.73828 -4.5625,7.56641 -14.51953,23.53516 -21.63281,34.17187 11.57812,4.10157 38.22265,60.07422 44.40234,86.77735 0,0 13.42188,47.9375 15.35156,67.54297 26.77344,-19.08594 44.25,-50.36719 44.25,-85.75391"
                                    id="path1305" />
                            </g>
                        </g>
                    </svg>
                    <h2 class="brand-text">{{ Auth::user()->company->name }}</h2>
                </a>
            </li>

            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- Foreach menu item starts --}}
            @if (isset($menuData[0]))
                @foreach ($menuData[0]->menu as $menu)
                    @if (isset($menu->roles))
                        @php
                            $roles = explode('|', $menu->roles);
                        @endphp
                        @foreach ($roles as $role)
                            @if ($role ==
                                Auth::user()->getRoleNames()->first())
                                @if (isset($menu->navheader))
                                    <li class="navigation-header">
                                        <span>{{ __('locale.' . $menu->navheader) }}</span>
                                        <i data-feather="more-horizontal"></i>
                                    </li>
                                @else
                                    {{-- Add Custom Class with nav-item --}}
                                    @php
                                        $custom_classes = '';
                                        if (isset($menu->classlist)) {
                                            $custom_classes = $menu->classlist;
                                        }
                                    @endphp
                                    <li
                                        class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                                        <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                                            class="d-flex align-items-center"
                                            target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                                            <i data-feather="{{ $menu->icon }}"></i>
                                            <span
                                                class="menu-title text-truncate">{{ __('locale.' . $menu->name) }}</span>
                                            @if (isset($menu->badge))
                                                <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                                                <span
                                                    class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                                            @endif
                                        </a>
                                        @if (isset($menu->submenu))
                                            @include('panels/submenu', ['menu' => $menu->submenu])
                                        @endif
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
            {{-- Foreach menu item ends --}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
