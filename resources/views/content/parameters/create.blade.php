<!--
    /******************************************************************\
    * Author: Pedro Adrian Sanchez Cardenas.
    * Start Date: 02 de Enero del 2022
    * Finish Date: 11 de Marzo del 2022.

    * Update Author: Pedro Adrian Sanchez Cardenas
    * Update Start Date: 01 de Abril del 2022
    * Update Finish Date: 01 de Abril del 2022

    * Description: --------
    /******************************************************************\
 -->

@extends('layouts/contentLayoutMaster')

@section('title', 'Add Parameters')

@section('vendor-style')
    {{-- Datepicker --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('page-style')
    {{-- DataPicker --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">

    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
    <!-- View parameters Create -->
    <section id="alerts">
        <livewire:wifi-alerts />
    </section>

    <section id="header">
        <div class="row match-height">
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-danger p-50 mb-1">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-speedometer" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                    <path fill-rule="evenodd"
                                        d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z" />
                                </svg>
                            </div>
                        </div>
                        <h2 class="fw-bolder">
                            {{ $plantData->name }}
                        </h2>
                        <p class="card-text">
                            {{ $plantData->location }}, {{ $plantData->country->name }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-success p-50 mb-1">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                            </div>
                        </div>
                        <h2 class="fw-bolder">
                            {{ $plantData->Operator->name }}
                        </h2>
                        <p class="card-text">
                            {{ $plantData->Operator->phone_1 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="body">
        <livewire:parameters.create-parameters :plant='$plantData' :company="$comp" :service="$serv">
    </section>
    <!-- View parameters Create -->
@endsection

@section('vendor-script')
    {{-- DatePicker --}}
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>

    {{-- SweetAlert --}}
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>

    {{-- alpineJs Mask --}}
    <script src="{{ asset(mix('vendors/js/alpinejs/mask/mask.js')) }}"></script>
@endsection

@section('page-script')
    {{-- Datepicker --}}
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>

    {{-- SweetAlert --}}
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>

    {{-- Page Js --}}
    <script>
        function parameters() {
            return {
                step: 1,
                totalStep: @json($plantData->trains->where('type', 'Train')->count() * 2 + 1),
                trains: @json($plantData->trains->where('type', 'Train')->count()),
                train: 1,
                addStep() {
                    if (this.step < this.totalStep) {
                        this.step++;

                        if ((this.step % 2) && (this.step < this.totalStep)) {
                            this.train++;
                        }
                    }
                },
                removeStep() {
                    if ((this.step > 1)) {
                        this.step--;

                        if (!(this.step % 2) && (this.step < (this.totalStep - 1))) {
                            this.train--;
                        }
                    }
                }
            }
        }
    </script>
    {{-- Page Js --}}
@endsection
