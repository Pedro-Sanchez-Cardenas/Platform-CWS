<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset(mix('vendors/js/ui/jquery.sticky.js')) }}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<!-- customer scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

@if ($configData['blankPage'] === false)
    <script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif

<!-- Alpinejs -->
<script defer src="{{ asset(mix('vendors/js/alpinejs/alpine.js')) }}"></script>
<!-- END: Alpinejs -->

<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->

@livewireScripts
@yield('livewire-js')

@stack('modals')
