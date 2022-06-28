<div>
    {{-- Data Filters --}}
    <div class="row gap-1">
        <div class="card col-md-12 col-lg-4">
            <div class="card-body">
                <h5>{{ $plant->name }}</h5>
                <p class="card-text font-small-3">{{ $plant->location }}</p>
                @if ($plant->cover_path != '')
                    <img src="{{ $plant->cover_path }}" class="img-thumbnail" alt="error img plant">
                @else
                    <img src="https://www.f-w-s.com/assets/img/sistemas/planta_tratamiento_osmosis_inversa/planta-tratamiento-osmosis-inversa.jpg"
                        class="img-thumbnail" alt="error img plant">
                @endif
            </div>

            <div class="card-footer pb-0">
                <p class="card-subtitle mb-2 text-muted text-capitalize">Last Parameters:
                    @if ($plant->product_waters->first())
                        <span class="text-primary">{{ $plant->product_waters->first()->parameters_date }}</span>
                        <span
                            class="text-danger">{{ \Carbon\Carbon::create($plant->product_waters->first()->parameters_date)->diffForHumans() }}</span>
                        <br><span>By ({{ $plant->product_waters->first()->assignedBy->name }})</span>
                    @else
                        <span class="text-danger">N/A</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="col">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h5>PLANT STATUS</h5>
                    </div>

                    <div class="card-body">
                        <div class="row gap-1">
                            <div class="col border rounded py-1">
                                <h6>TRAINS</h6>

                                <hr>

                                <div class="d-flex gap-1 px-1">
                                    @foreach ($plant->trains->where('type', 'Train') as $train)
                                        <div class="col border rounded py-1">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    fill="currentColor" class="bi bi-file-code" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.646 5.646a.5.5 0 1 1 .708.708L5.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zm2.708 0a.5.5 0 1 0-.708.708L10.293 8 8.646 9.646a.5.5 0 0 0 .708.708l2-2a.5.5 0 0 0 0-.708l-2-2z" />
                                                    <path
                                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                                </svg>

                                                <h6 class="mt-1">TRAIN # {{ $loop->iteration }}</h6>
                                                <small class="text-success">ENABLED</small>
                                                <div class="text-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-check-circle"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                        <path
                                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if ($plant->trains->where('type', 'Irrigation')->count() > 0)
                                        <div class="col border rounded py-1">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                                </svg>

                                                <h6 class="mt-1">IRRIGATION</h6>
                                                <small class="text-success">ENABLED</small>
                                                <div class="text-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-check-circle"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                        <path
                                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">DATA FILTERS</h5>

                            @hasrole('Super-Admin|Operations-Manager')
                                <div>
                                    <strong class="form-label text-primary">Export to:</strong>

                                    <div class="d-flex gap-1">
                                        {{-- <a class="btn btn-sm btn-danger"
                                        href="{{ route('parameters.pdf', ['id' => $plant, 'date_range' => $date_range]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-filetype-pdf icon-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                                        </svg>
                                        <strong>PDF</strong>
                                    </a> --}}

                                        <a class="btn btn-sm btn-success" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-file-earmark-spreadsheet icon-left"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
                                            </svg>
                                            <strong>EXCEL</strong>
                                        </a>
                                    </div>
                                </div>
                            @endhasrole
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-icon">
                                        DATE/TIME
                                    </label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <svg fill="#B6B6B6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"
                                                width="20px" height="20px">
                                                <path
                                                    d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z" />
                                            </svg>
                                        </span>
                                        <input type="search" id="date-range" wire:model='date_range' autocomplete="off"
                                            class="form-control flatpickr-range ps-1"
                                            placeholder="YYYY-MM-DD to YYYY-MM-DD" />
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-md">
                                <label class="form-label" for="bills">BILLS</label>
                                <select data-placeholder="Select a type..." class="select2-icons form-select"
                                    id="bills">
                                    <optgroup label="Bills">
                                        <!-- TODO: agregar facturas generadas por el sistema (Daniel). -->
                                    </optgroup>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Data Filters end --}}

    <div class="row">
        {{-- Production Reading --}}
        <div class="col-sm-12 col-lg-4 p-0 m-0">
            <h5>PRODUCTION READINGS</h5>
            <div wire:loading wire:target='date_range' class="w-100">
                <div class="card d-flex justify-content-center align-items-center height-600">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <br>
                    <strong>Loading...</strong>
                </div>
            </div>

            <div wire:loading.remove wire:target='date_range' class="card">
                <div class="card-body m-0 p-0">
                    <div class="border rounded-top overflow-auto height-550">
                        @if ($plant->product_waters->first() != null)
                            <table class="table table-bordered table-hover">
                                <thead class="sticky-top zindex-2">
                                    <tr class="text-center" role="row">
                                        <th class="pt-2">TYPE</th>
                                        <th>
                                            READING <br>
                                            <small class="text-danger">m³</small>
                                        </th>
                                        <th>
                                            PRODUCTION <br>
                                            <small class="text-danger">m³</small>
                                        </th>

                                        <th class="pt-2">UPLOAD DATE</th>

                                        <th class="pt-2">CORRESPONDING DATE</th>
                                    </tr>
                                </thead>

                                <tbody class="m-0 p-0">
                                    @foreach ($plant->product_waters as $product_water)
                                        <tr class="border-primary">
                                            @foreach ($product_water->production_readings as $reading)
                                        <tr class="text-center">
                                            <td class="m-0 py-0.5 px-0">
                                                @if ($reading->type == 'Train')
                                                    {{ $reading->type }} #{{ $loop->iteration }}
                                                @else
                                                    {{ $reading->type }}
                                                @endif
                                            </td>

                                            <td class="m-0 py-0.5 px-0">
                                                {{ $reading->reading }}
                                            </td>

                                            <td class="m-0 py-0.5 px-0">
                                                @if (!$loop->parent->last)
                                                    {{ $reading->reading -
                                                        $plant->product_waters[$loop->parent->index + 1]->production_readings[$loop->index]->reading }}
                                                @else
                                                    {{ $reading->reading }}
                                                @endif
                                            </td>

                                            <td class="text-nowrap m-0 py-0.5 px-0">
                                                @if (!$loop->first && !$loop->last)
                                                    <span>{{ $product_water->created_at }}</span>
                                                @endif
                                            </td>

                                            <td class="text-nowrap text-center m-0 py-0.5 px-0">
                                                @if (!$loop->first && !$loop->last)
                                                    <span>{{ $product_water->parameters_date }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tr>
                        @endforeach
                        </tbody>
                        </table>
                    @else
                        <div style="height: 350pt;"
                            class="d-flex justify-content-center align-items-center text-danger">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="80px" height="80px" viewBox="0 0 59.227 59.227" xml:space="preserve"
                                class="fill-current">
                                <path
                                    d="M51.586,10.029c-0.333-0.475-0.897-0.689-1.449-0.607c-0.021-0.005-0.042-0.014-0.063-0.017L27.469,6.087
                                c-0.247-0.037-0.499-0.01-0.734,0.076L8.63,12.799c-0.008,0.003-0.015,0.008-0.023,0.011c-0.019,0.008-0.037,0.02-0.057,0.027
                                c-0.099,0.044-0.191,0.096-0.276,0.157c-0.026,0.019-0.051,0.038-0.077,0.059c-0.093,0.076-0.178,0.159-0.249,0.254
                                c-0.004,0.006-0.01,0.009-0.014,0.015L0.289,23.78c-0.293,0.401-0.369,0.923-0.202,1.391c0.167,0.469,0.556,0.823,1.038,0.947
                                l6.634,1.713v16.401c0,0.659,0.431,1.242,1.062,1.435l24.29,7.422c0.008,0.004,0.017,0.001,0.025,0.005
                                c0.13,0.036,0.266,0.059,0.402,0.06c0.003,0,0.007,0.002,0.011,0.002l0,0h0.001c0.143,0,0.283-0.026,0.423-0.067
                                c0.044-0.014,0.085-0.033,0.13-0.052c0.059-0.022,0.117-0.038,0.175-0.068l17.43-9.673c0.477-0.265,0.772-0.767,0.772-1.312
                                V25.586l5.896-2.83c0.397-0.19,0.69-0.547,0.802-0.973c0.111-0.427,0.03-0.88-0.223-1.241L51.586,10.029z M27.41,9.111
                                l17.644,2.59L33.35,17.143l-18.534-3.415L27.41,9.111z M9.801,15.854l21.237,3.914l-6.242,9.364l-20.78-5.365L9.801,15.854z
                                    M10.759,43.122V28.605l14.318,3.697c0.125,0.031,0.25,0.048,0.375,0.048c0.493,0,0.965-0.244,1.248-0.668l5.349-8.023v25.968
                                L10.759,43.122z M49.479,41.1l-14.431,8.007V25.414l2.635,5.599c0.171,0.361,0.479,0.641,0.854,0.773
                                c0.163,0.06,0.333,0.087,0.502,0.087c0.223,0,0.444-0.05,0.649-0.146l9.789-4.698L49.479,41.1L49.479,41.1z M39.755,28.368
                                l-4.207-8.938L49.85,12.78l5.634,8.037L39.755,28.368z" />
                            </svg>
                            <strong class="ms-1">NO DATA TO DISPLAY</strong>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-success py-1 px-2">TOTAL:
                            {{ $plant->first()->product_waters->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- Production Reading end --}}

        {{-- Product Water --}}
        <div class="col-sm-12 col-lg-8 ps-1 pe-0">
            <h5>PRODUCT WATER</h5>
            <div wire:loading wire:target='date_range' class="w-100">
                <div class="card d-flex justify-content-center align-items-center height-600">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <br>
                    <strong>Loading...</strong>
                </div>
            </div>

            <div wire:loading.remove wire:target='date_range' class="card">
                <div class="card-body m-0 p-0">
                    <div class="border rounded-top overflow-auto height-550">
                        @if ($plant->product_waters->first() != null)
                            <table class="table table-sm table-bordered table-hover">
                                <thead class="sticky-top zindex-2">
                                    <tr class="text-center" role="row">
                                        <th colspan="@if ($plant->personalitation_plant->chloride == 'yes') 6 @else 5 @endif">
                                            FEED LINE TO
                                            HOTEL
                                            SUPPLY</th>
                                        <th colspan="8">DAYLI CHEMICAL SUPPLY</th>
                                        <th colspan="{{ $plant->cisterns_quantity }}">Cistern Levels</th>
                                        <th rowspan="2" class="pt-3">ASSIGNED BY</th>
                                        <th rowspan="2" class="pt-3">OBSERVATION</th>
                                        <th rowspan="2" class="pt-3">OPERATIONS MANAGER OBSERVATION</th>
                                        <th rowspan="2" class="pt-3">UPLOAD DATE</th>

                                        <th rowspan="2" class="pt-3">CORRESPONDING DATE</th>
                                        @hasrole('Super-Admin|Operation-Manager')
                                            <th rowspan="2" class="pt-3">ACTIONS</th>
                                        @endhasrole
                                    </tr>

                                    <tr class="text-center text-nowrap" role="row">
                                        {{-- Init Feed line to hotel supply --}}
                                        <th>
                                            PH <br>
                                            <small class="text-danger">u.
                                                pH</small>
                                        </th>
                                        <th>
                                            HARDNESS <br>
                                            <small class="text-danger">ppm</small>
                                        </th>
                                        <th>
                                            TDS <br>
                                            <small class="text-danger">ppm</small>
                                        </th>
                                        <th>
                                            H2S <br>
                                            <small class="text-danger">ppm</small>
                                        </th>
                                        <th>
                                            FREE CHLORINE <br>
                                            <small class="text-danger">ppm</small>
                                        </th>

                                        @if ($plant->personalitation_plant->chloride == 'yes')
                                            <th>
                                                CHLORIDES <br>
                                                <small class="text-danger">ppm</small>
                                            </th>
                                        @endif
                                        {{-- End Feed line to hotel supply --}}

                                        {{-- Init Dayli chemical supply --}}
                                        <th>
                                            CACL2 <br>
                                            <small class="text-danger">Kg</small>
                                        </th>
                                        <th>
                                            NACO3 <br>
                                            <small class="text-danger">Kg</small>
                                        </th>
                                        <th>
                                            NACLO <br>
                                            <small class="text-danger">Kg</small>
                                        </th>
                                        <th>
                                            ANTIS <br>
                                            <small class="text-danger">Kg</small>
                                        </th>
                                        <th>
                                            NAOH <br>
                                            <small class="text-danger">Kg</small>
                                        </th>
                                        <th>
                                            HCL <br>
                                            <small class="text-danger">Kg</small>
                                        </th>
                                        <th>
                                            KL1 <br>
                                            <small class="text-danger">Kg</small>
                                        </th>
                                        <th>
                                            KL2 <br>
                                            <small class="text-danger">Kg</small>
                                        </th>

                                        @for ($i = 0; $i < $plant->cisterns_quantity; $i++)
                                            <th>
                                                #{{ $i + 1 }} <br>
                                                <small class="text-danger">%</small>
                                            </th>
                                        @endfor
                                        {{-- Init Dayli chemical supply --}}
                                    </tr>
                                </thead>

                                <tbody class="m-0 p-0">
                                    @foreach ($plant->product_waters as $product_water)
                                        <tr class="border-primary">
                                            {{-- Init Feed line to hotel supply --}}
                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->ph }}
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->hardness }}
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->tds }}
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->h2s }}
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->free_chlorine }}
                                            </td>

                                            @if ($plant->personalitation_plant->chloride == 'yes')
                                                <td class="m-0 p-0 text-center">
                                                    {{ $product_water->chloride }}
                                                </td>
                                            @endif
                                            {{-- End Feed line to hotel supply --}}

                                            {{-- Init Dayli chemical supply --}}
                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->chemical->calcium_chloride }}
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->chemical->sodium_carbonate }}
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->chemical->sodium_hypochlorite }}
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->chemical->antiscalant }}
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->chemical->sodium_hydroxide }}
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->chemical->hydrochloric_acid }}
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->chemical->kl1 }}
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                {{ $product_water->chemical->kl2 }}
                                            </td>
                                            {{-- End Dayli chemical supply --}}

                                            {{-- Init Cisterns --}}
                                            @for ($c = 0; $c < $plant->cisterns_quantity; $c++)
                                                <td class="m-0 p-0 text-center">
                                                    {{ $product_water->cisterns[$c]->capacity }}
                                                </td>
                                            @endfor
                                            {{-- End Cisterns --}}


                                            <td class="text-nowrap m-0 px-0.5">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <span class="avatar">
                                                        <img class="round"
                                                            src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($product_water->assignedBy->name) . '&color=7F9CF5&background=EBF4F4' }}"
                                                            alt="avatar" height="40" width="40">
                                                        <span class="avatar-status-offline"></span>
                                                    </span>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <strong>{{ $product_water->assignedBy->name }}</strong>
                                                </div>
                                            </td>

                                            <td class="m-0 p-1 text-justify">
                                                <p class="text-justify p-1" style="width: 400px">
                                                    @if ($product_water->observations != null)
                                                        {{ $product_water->observations }}
                                                    @else
                                                        <span class="text-danger">NO COMMENTS</span>
                                                    @endif
                                                </p>
                                            </td>

                                            {{-- OPERATIONS MANAGER OBSERVATIONS --}}
                                            <td class="m-0 p-1 text-justify">
                                                @if ($product_water->ope_mana_observation == null)
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <button class="btn btn-success" type="button"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#addOperationsManagerComment"
                                                            wire:click="get_id_toAddOpeManaObservation({{ $product_water->id }})">
                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                    <path
                                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                </svg>
                                                                <strong class="ms-1">COMMENT</strong>
                                                            </div>
                                                        </button>
                                                    </div>
                                                @else
                                                    <p class="text-justify" style="width: 400px">
                                                        {{ $product_water->ope_mana_observation }}
                                                    </p>
                                                @endif
                                            </td>
                                            {{-- OPERATIONS MANAGER OBSERVATIONS END --}}

                                            <td class="text-nowrap m-0 px-0.5">
                                                {{ $product_water->created_at }}
                                            </td>

                                            <td class="text-nowrap m-0 px-0.5 text-center">
                                                {{ $product_water->parameters_date }}
                                            </td>

                                            <td class="text-nowrap m-0 px-0.5">
                                                <div class="d-flex justify-content-center align-items-center gap-1">
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-bs-toggle="modal" data-bs-target="#editProductWater"
                                                        wire:click='get_id_editProductWater({{ $product_water->id }})'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div style="height: 350pt;"
                                class="d-flex justify-content-center align-items-center text-danger">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="80px" height="80px" viewBox="0 0 59.227 59.227" xml:space="preserve"
                                    class="fill-current">
                                    <path
                                        d="M51.586,10.029c-0.333-0.475-0.897-0.689-1.449-0.607c-0.021-0.005-0.042-0.014-0.063-0.017L27.469,6.087
                               c-0.247-0.037-0.499-0.01-0.734,0.076L8.63,12.799c-0.008,0.003-0.015,0.008-0.023,0.011c-0.019,0.008-0.037,0.02-0.057,0.027
                               c-0.099,0.044-0.191,0.096-0.276,0.157c-0.026,0.019-0.051,0.038-0.077,0.059c-0.093,0.076-0.178,0.159-0.249,0.254
                               c-0.004,0.006-0.01,0.009-0.014,0.015L0.289,23.78c-0.293,0.401-0.369,0.923-0.202,1.391c0.167,0.469,0.556,0.823,1.038,0.947
                               l6.634,1.713v16.401c0,0.659,0.431,1.242,1.062,1.435l24.29,7.422c0.008,0.004,0.017,0.001,0.025,0.005
                               c0.13,0.036,0.266,0.059,0.402,0.06c0.003,0,0.007,0.002,0.011,0.002l0,0h0.001c0.143,0,0.283-0.026,0.423-0.067
                               c0.044-0.014,0.085-0.033,0.13-0.052c0.059-0.022,0.117-0.038,0.175-0.068l17.43-9.673c0.477-0.265,0.772-0.767,0.772-1.312
                               V25.586l5.896-2.83c0.397-0.19,0.69-0.547,0.802-0.973c0.111-0.427,0.03-0.88-0.223-1.241L51.586,10.029z M27.41,9.111
                               l17.644,2.59L33.35,17.143l-18.534-3.415L27.41,9.111z M9.801,15.854l21.237,3.914l-6.242,9.364l-20.78-5.365L9.801,15.854z
                                M10.759,43.122V28.605l14.318,3.697c0.125,0.031,0.25,0.048,0.375,0.048c0.493,0,0.965-0.244,1.248-0.668l5.349-8.023v25.968
                               L10.759,43.122z M49.479,41.1l-14.431,8.007V25.414l2.635,5.599c0.171,0.361,0.479,0.641,0.854,0.773
                               c0.163,0.06,0.333,0.087,0.502,0.087c0.223,0,0.444-0.05,0.649-0.146l9.789-4.698L49.479,41.1L49.479,41.1z M39.755,28.368
                               l-4.207-8.938L49.85,12.78l5.634,8.037L39.755,28.368z" />
                                </svg>
                                <strong class="ms-1">NO DATA TO DISPLAY</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-success py-1 px-2">TOTAL:
                            {{ $plant->first()->product_waters->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- Product Water end --}}
    </div>

    {{-- Pretreatment --}}
    <div class="row">
        <h5 class="ms-0 ps-0">PRETREATMENT</h5>
        <div wire:loading wire:target='date_range' class="w-100">
            <div class="card d-flex justify-content-center align-items-center col-12 height-700">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <br>
                <strong>Loading...</strong>
            </div>
        </div>

        <div wire:loading.remove wire:target='date_range' class="card mx-0 px-0">
            <div class="card-body m-0 p-0">
                <div class="border rounded-top overflow-auto height-600">
                    @if ($plant->pretreatments->first() != null)
                        <table class="table table-sm table-bordered table-hover">
                            <thead class="sticky-top zindex-2">
                                <tr class="text-center" role="row">
                                    <th colspan="1" rowspan="2" class="pt-3">
                                        TRAIN
                                    </th>

                                    @isset($plant->personalitation_plant->well_pump)
                                        @if ($plant->personalitation_plant->well_pump != 'no' || $plant->personalitation_plant->feed_pump != 'no')
                                            <th class="text-center" colspan="2">
                                                WATER PUMPS
                                            </th>
                                        @endif
                                    @endisset

                                    <th colspan="@php echo ($plant->multimedia_filters_quantity * 2); @endphp">
                                        MULTIMEDIA FILTERS
                                    </th>

                                    <th colspan="1" rowspan="3" class="pt-5">
                                        BACKWASH <br>
                                        <small class="text-danger">Min</small>
                                    </th>

                                    <th colspan="3" rowspan="2" class="pt-3">
                                        POLISH FILTERS
                                    </th>

                                    <th rowspan="3" class="pt-5">
                                        ASSIGNED</th>

                                    <th rowspan="3" class="pt-5">
                                        OBSERVATIONS</th>

                                    <th rowspan="3" class="pt-5">
                                        UPLOAD DATE</th>

                                    <th rowspan="3" class="pt-5">
                                        CORRESPONDING DATE</th>
                                </tr>

                                <tr class="text-center text-nowrap" role="row">
                                    @if ($plant->personalitation_plant->well_pump != 'no')
                                        <th colspan="2">Well Pump</th>
                                    @endif

                                    @if ($plant->personalitation_plant->feed_pump != 'no')
                                        <th colspan="2">Feed Pump</th>
                                    @endif

                                    @for ($i = 0; $i < $plant->multimedia_filters_quantity; $i++)
                                        <th colspan="2">Multimedia Filter #{{ $i + 1 }}</th>
                                    @endfor
                                </tr>

                                <tr class="text-center text-nowrap" role="row">
                                    <th class="pt-2">#</th>

                                    @if ($plant->personalitation_plant->well_pump != 'no')
                                        <th>
                                            AMPERAGE <br>
                                            <small class="text-danger">A</small>
                                        </th>
                                        <th>
                                            FREQUENCY <br>
                                            <small class="text-danger">Hz</small>
                                        </th>
                                    @endif

                                    @if ($plant->personalitation_plant->feed_pump != 'no')
                                        <th>
                                            AMPERAGE <br>
                                            <small class="text-danger">A</small>
                                        </th>
                                        <th>
                                            FREQUENCY <br>
                                            <small class="text-danger">Hz</small>
                                        </th>
                                    @endif

                                    @for ($i = 0; $i < $plant->multimedia_filters_quantity; $i++)
                                        <th>
                                            IN <br>
                                            <small class="text-danger">psi</small>
                                        </th>
                                        <th>
                                            OUT <br>
                                            <small class="text-danger">psi</small>
                                        </th>
                                    @endfor

                                    <th>
                                        IN <br>
                                        <small class="text-danger">psi</small>
                                    </th>
                                    <th>
                                        OUT <br>
                                        <small class="text-danger">psi</small>
                                    </th>
                                    <th>
                                        CHANGE
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="m-0 p-0">
                                @foreach ($plant->first()->pretreatments->groupBy('group_by') as $pretreatment)
                                    <tr class="border-primary">
                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @foreach ($plant->first()->trains->where('type', 'Train') as $train)
                                                        <tr
                                                            @if (!$loop->last) class="border-bottom" @endif>
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>

                                        @if ($plant->personalitation_plant->well_pump == 'yes')
                                            <td class="m-0 p-0 text-center">
                                                <table class="w-100">
                                                    <tbody>
                                                        @for ($train =
                                                        $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                        $train >= 0;
                                                        $train--)
                                                            <tr
                                                                class="@if ($train > 0) border-bottom @endif">
                                                                <td>
                                                                    {{ $pretreatment[$train]->well_pump }}
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                <table class="w-100">
                                                    <tbody>
                                                        @for ($train =
                                                        $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                        $train >= 0;
                                                        $train--)
                                                            <tr
                                                                class="@if ($train > 0) border-bottom @endif">
                                                                <td>
                                                                    {{ $pretreatment[$train]->frecuencies_well_pump }}
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endif

                                        @if ($plant->personalitation_plant->feed_pump == 'yes')
                                            <td class="m-0 p-0 text-center">
                                                <table class="w-100">
                                                    <tbody>
                                                        @for ($train =
                                                        $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                        $train >= 0;
                                                        $train--)
                                                            <tr
                                                                class="@if ($train > 0) border-bottom @endif">
                                                                <td>
                                                                    {{ $pretreatment[$train]->feed_pump }}
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </td>

                                            <td class="m-0 p-0 text-center">
                                                <table class="w-100">
                                                    <tbody>
                                                        @for ($train =
                                                        $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                        $train >= 0;
                                                        $train--)
                                                            <tr
                                                                class="@if ($train > 0) border-bottom @endif">
                                                                <td>
                                                                    {{ $pretreatment[$train]->frecuencies_feed_pump }}
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endif

                                        <td class="m-0 p-0 text-center"
                                            colspan="@php echo ($plant->multimedia_filters_quantity * 2); @endphp">
                                            <table class="w-100">
                                                @for ($train =
                                                $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                $train >= 0;
                                                $train--)
                                                    <tr
                                                        class="@if ($train > 0) border-bottom @endif">
                                                        @foreach ($pretreatment[$train]->multimedias as $mm)
                                                            <td>{{ $mm->in }}</td>
                                                            <td>{{ $mm->out }}</td>
                                                        @endforeach
                                                    </tr>
                                                @endfor
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td>
                                                                {{ $pretreatment[$train]->backwash }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td>
                                                                {{ $pretreatment[$train]->polish->first()->in }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td>
                                                                {{ $pretreatment[$train]->polish->first()->out }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="m-0 p-0">
                                            <table class="w-100 table-sm">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td>
                                                                <table class="table-sm table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            @foreach ($pretreatment[$train]->polish as $polish)
                                                                                <th class="text-center">
                                                                                    {{ $loop->iteration }}</th>
                                                                            @endforeach
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        <tr class="text-center">
                                                                            @foreach ($pretreatment[$train]->polish as $polish)
                                                                                @if ($polish->filter_change != null)
                                                                                    <td class="text-success">YES</td>
                                                                                @else
                                                                                    <td class="text-danger">NO</td>
                                                                                @endif
                                                                            @endforeach
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="text-nowrap m-0 px-0.5">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <span class="avatar">
                                                    <img class="round"
                                                        src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($pretreatment->first()->assignedBy->name) . '&color=7F9CF5&background=EBF4F4' }}"
                                                        alt="avatar" height="40" width="40">
                                                    <span class="avatar-status-offline"></span>
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <strong>{{ $pretreatment->first()->assignedBy->name }}</strong>
                                            </div>
                                        </td>

                                        <td class="m-0 p-1 text-justify">
                                            <table class="w-100">
                                                <tbody>
                                                    @foreach ($pretreatment as $pretre)
                                                        <tr
                                                            class="@if (!$loop->last) border-bottom @endif">
                                                            <td>
                                                                <p class="text-justify" style="width: 400px">
                                                                    ({{ $loop->iteration }}).
                                                                    {{ $pretre->observations }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="text-nowrap m-0 px-0.5">
                                            {{ $pretreatment->last()->created_at }}
                                        </td>

                                        <td class="m-0 px-0.5 text-center">
                                            {{ $pretreatment->last()->parameters_date }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div style="height: 350pt;"
                            class="d-flex justify-content-center align-items-center text-danger">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="80px" height="80px" viewBox="0 0 59.227 59.227" xml:space="preserve"
                                class="fill-current">
                                <path
                                    d="M51.586,10.029c-0.333-0.475-0.897-0.689-1.449-0.607c-0.021-0.005-0.042-0.014-0.063-0.017L27.469,6.087
                                c-0.247-0.037-0.499-0.01-0.734,0.076L8.63,12.799c-0.008,0.003-0.015,0.008-0.023,0.011c-0.019,0.008-0.037,0.02-0.057,0.027
                                c-0.099,0.044-0.191,0.096-0.276,0.157c-0.026,0.019-0.051,0.038-0.077,0.059c-0.093,0.076-0.178,0.159-0.249,0.254
                                c-0.004,0.006-0.01,0.009-0.014,0.015L0.289,23.78c-0.293,0.401-0.369,0.923-0.202,1.391c0.167,0.469,0.556,0.823,1.038,0.947
                                l6.634,1.713v16.401c0,0.659,0.431,1.242,1.062,1.435l24.29,7.422c0.008,0.004,0.017,0.001,0.025,0.005
                                c0.13,0.036,0.266,0.059,0.402,0.06c0.003,0,0.007,0.002,0.011,0.002l0,0h0.001c0.143,0,0.283-0.026,0.423-0.067
                                c0.044-0.014,0.085-0.033,0.13-0.052c0.059-0.022,0.117-0.038,0.175-0.068l17.43-9.673c0.477-0.265,0.772-0.767,0.772-1.312
                                V25.586l5.896-2.83c0.397-0.19,0.69-0.547,0.802-0.973c0.111-0.427,0.03-0.88-0.223-1.241L51.586,10.029z M27.41,9.111
                                l17.644,2.59L33.35,17.143l-18.534-3.415L27.41,9.111z M9.801,15.854l21.237,3.914l-6.242,9.364l-20.78-5.365L9.801,15.854z
                                    M10.759,43.122V28.605l14.318,3.697c0.125,0.031,0.25,0.048,0.375,0.048c0.493,0,0.965-0.244,1.248-0.668l5.349-8.023v25.968
                                L10.759,43.122z M49.479,41.1l-14.431,8.007V25.414l2.635,5.599c0.171,0.361,0.479,0.641,0.854,0.773
                                c0.163,0.06,0.333,0.087,0.502,0.087c0.223,0,0.444-0.05,0.649-0.146l9.789-4.698L49.479,41.1L49.479,41.1z M39.755,28.368
                                l-4.207-8.938L49.85,12.78l5.634,8.037L39.755,28.368z" />
                            </svg>
                            <strong class="ms-1">NO DATA TO DISPLAY</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge bg-success py-1 px-2">TOTAL:
                        {{ $plant->first()->pretreatments->groupBy('group_by')->count() }}</span>
                </div>
            </div>
        </div>
    </div>
    {{-- Pretreatment end --}}

    {{-- Operation --}}
    <div class="row">
        <h5 class="ms-0 ps-0">OPERATION</h5>
        <div wire:loading wire:target='date_range' class="w-100">
            <div class="card d-flex justify-content-center align-items-center height-700">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <br>
                <strong>Loading...</strong>
            </div>
        </div>

        <div wire:loading.remove wire:target='date_range' class="card mx-0 px-0">
            <div class="card-body m-0 p-0">
                <div class="border rounded-top overflow-auto height-600">
                    @if ($plant->operations->first() != null)
                        <table class="table table-sm table-bordered table-hover">
                            <thead class="sticky-top zindex-2">
                                <tr class="text-center" role="row">
                                    <th>TRAIN</th>
                                    <th
                                        colspan="@if ($plant->personalitation_plant->boosterc == 'yes') @php echo ($plant->trains->first()->boosters_quantity + 1); @endphp @else 1 @endif">
                                        AMPERAGE</th>
                                    <th
                                        colspan="@if ($plant->personalitation_plant->boosterc == 'yes') @php echo ($plant->trains->first()->boosters_quantity + 1); @endphp @else 1 @endif">
                                        FRECUENCIES</th>
                                    <th colspan="2">FEED</th>
                                    <th colspan="3">TDS CONCENTRATION</th>
                                    <th colspan="@if ($plant->personalitation_plant->boosterc == 'yes') 4 @else 3 @endif">FLOW
                                    </th>
                                    <th
                                        colspan="@php echo ($plant->trains->first()->boosters_quantity + ($plant->personalitation_plant->boosterc == 'yes' ? 1 : 0) + 3); @endphp">
                                        PRESSURES</th>
                                    <th rowspan="2" class="pt-3">ASSIGNED BY</th>
                                    <th rowspan="2" class="pt-3">OBSERVATIONS</th>
                                    <th rowspan="2" class="pt-3">UPLOAD DATE</th>

                                    <th rowspan="2" class="pt-3">CORRESPONDING DATE</th>
                                </tr>

                                <tr class="text-center" role="row">
                                    <th class="pt-2">#</th>

                                    {{-- Init Amperage --}}
                                    <th>
                                        H.P. <br>
                                        <small class="text-danger">A</small>
                                    </th>

                                    @if ($plant->personalitation_plant->boosterc == 'yes')
                                        @for ($i = 0; $i < $plant->trains->first()->boosters_quantity; $i++)
                                            <th class="text-nowrap">
                                                Booster #{{ $i + 1 }} <br>
                                                <small class="text-danger">A</small>
                                            </th>
                                        @endfor
                                    @endif
                                    {{-- End Amperage --}}

                                    {{-- Init Frequency --}}
                                    <th>
                                        H.P <br>
                                        <small class="text-danger">Hz</small>
                                    </th>

                                    @if ($plant->personalitation_plant->boosterc == 'yes')
                                        @for ($i = 0; $i < $plant->trains->first()->boosters_quantity; $i++)
                                            <th class="text-nowrap">
                                                Booster #{{ $i + 1 }} <br>
                                                <small class="text-danger">A</small>
                                            </th>
                                        @endfor
                                    @endif
                                    {{-- End Frequency --}}

                                    {{-- Init Feed --}}
                                    <th class="text-nowrap">
                                        PH <br>
                                        <small class="text-danger">U. ph</small>
                                    </th>
                                    <th>
                                        TEMPERATURE <br>
                                        <small class="text-danger">°C</small>
                                    </th>
                                    {{-- End Feed --}}

                                    {{-- Init TDS Concentration --}}
                                    <th class="text-nowrap">
                                        FEED <br>
                                        <small class="text-danger">ppm TDS</small>
                                    </th>
                                    <th class="text-nowrap">
                                        PERMEATE <br>
                                        <small class="text-danger">ppm TDS</small>
                                    </th>
                                    <th class="text-nowrap">
                                        REJECT <br>
                                        <small class="text-danger">ppm TDS</small>
                                    </th>
                                    {{-- End TDS Concentration --}}

                                    {{-- Init Flow --}}
                                    @if ($plant->personalitation_plant->boosterc == 'yes')
                                        <th class="text-nowrap">
                                            B1+2 Out <br>
                                            <small class="text-danger">gpm</small>
                                        </th>
                                    @endif

                                    <th>
                                        FEED <br>
                                        <small class="text-danger">gpm</small>
                                    </th>
                                    <th>
                                        PERMEATE <br>
                                        <small class="text-danger">gpm</small>
                                    </th>
                                    <th>
                                        REJET <br>
                                        <small class="text-danger">gpm</small>
                                    </th>
                                    {{-- End Flow --}}

                                    {{-- Init Pressures --}}
                                    @if ($plant->personalitation_plant->boosterc == 'yes')
                                        <th class="text-nowrap">
                                            B1+2 Out <br>
                                            <small class="text-danger">psi</small>
                                        </th>
                                        @for ($i = 0; $i < $plant->trains->first()->boosters_quantity; $i++)
                                            <th class="text-nowrap">
                                                PX #{{ $i + 1 }} <br>
                                                <small class="text-danger">psi</small>
                                            </th>
                                        @endfor
                                    @endif

                                    <th class="text-nowrap">
                                        H.P. IN <br>
                                        <small class="text-danger">psi</small>
                                    </th>
                                    <th class="text-nowrap">
                                        H.P. OUT <br>
                                        <small class="text-danger">psi</small>
                                    </th>
                                    <th class="text-nowrap">
                                        REJECT <br>
                                        <small class="text-danger">psi</small>
                                    </th>
                                    {{-- End Pressures --}}
                                </tr>
                            </thead>

                            <tbody class="m-0 p-0">
                                @foreach ($plant->first()->operations->groupBy('group_by') as $operation)
                                    <tr class="border-primary">
                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @foreach ($plant->trains->where('type', 'Train') as $train)
                                                        <tr
                                                            class="@if (!$loop->first) border-top @endif">
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td>
                                                                {{ $operation[$train]->hp }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        @if ($plant->personalitation_plant->boosterc == 'yes')
                                            @for ($train =
                                            $plant->first()->trains->where('type', 'Train')->count() - 1;
                                            $train >= 0;
                                            $train--)
                                                <td class="m-0 px-0 text-center"
                                                    colspan="{{ $plant->trains->first()->boosters_quantity }}">
                                                    <table class="w-100">
                                                        <tbody>
                                                            <tr
                                                                class="@if ($train > 0) border-bottom @endif">
                                                                @for ($b = 0; $b < $operation[$train]->boosters->count(); $b++)
                                                                    <td class="text-nowrap">
                                                                        <span>{{ $operation[$train]->boosters[$b]->amperage }}</span>
                                                                    </td>
                                                                @endfor
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            @endfor
                                        @endif

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                <div class="d-flex flex-column">
                                                                    <span>{{ $operation[$train]->hpF }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        @if ($plant->personalitation_plant->boosterc == 'yes')
                                            @for ($train =
                                            $plant->first()->trains->where('type', 'Train')->count() - 1;
                                            $train >= 0;
                                            $train--)
                                                <td class="m-0 p-0 text-center" colspan="2">
                                                    <table class="w-100">
                                                        <tbody>
                                                            <tr
                                                                class="@if ($train > 0) border-bottom @endif">
                                                                @for ($b = 0; $b < $operation[$train]->boosters->count(); $b++)
                                                                    <td class="text-nowrap">
                                                                        <span>{{ $operation[$train]->boosters[$b]->frequency }}</span>
                                                                    </td>
                                                                @endfor
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            @endfor
                                        @endif

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                {{ $operation[$train]->ph }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                {{ $operation[$train]->temperature }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                {{ $operation[$train]->feed }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                {{ $operation[$train]->permeate }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                {{ $operation[$train]->reject }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        {{-- FLOW --}}
                                        @if ($plant->personalitation_plant->boosterc == 'yes')
                                            <td class="m-0 p-0 text-center">
                                                <table class="w-100">
                                                    <tbody>
                                                        @for ($train =
                                                        $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                        $train >= 0;
                                                        $train--)
                                                            <tr
                                                                class="@if ($train > 0) border-bottom @endif">
                                                                <td class="text-nowrap">
                                                                    {{ $operation[$train]->boosters->first()->booster_flow }}
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endif

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                {{ $operation[$train]->feed_flow }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                {{ $operation[$train]->permeate_flow }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                {{ $operation[$train]->reject_flow }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>
                                        {{-- END FLOW --}}

                                        {{-- PRESSURES --}}
                                        @if ($plant->personalitation_plant->boosterc == 'yes')
                                            <td class="m-0 p-0 text-center">
                                                <table class="w-100">
                                                    <tbody>
                                                        @for ($train =
                                                        $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                        $train >= 0;
                                                        $train--)
                                                            <tr
                                                                class="@if ($train > 0) border-bottom @endif">
                                                                <td class="text-nowrap">
                                                                    {{ $operation[$train]->boosters->first()->booster_pressures_total }}
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endif

                                        @if ($plant->personalitation_plant->boosterc == 'yes')
                                            <td class="m-0 p-0 text-center" colspan="2">
                                                <table class="w-100">
                                                    <tbody>
                                                        @for ($train =
                                                        $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                        $train >= 0;
                                                        $train--)
                                                            <tr
                                                                class="@if ($train > 0) border-bottom @endif">
                                                                @for ($b = 0; $b < $plant->trains->first()->boosters_quantity; $b++)
                                                                    <td>
                                                                        {{ $operation[$train]->boosters[$b]->booster_pressures }}
                                                                    </td>
                                                                @endfor
                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </td>
                                        @endif

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                {{ $operation[$train]->hp_in }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                @for ($train =
                                                $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                $train >= 0;
                                                $train--)
                                                    <tbody>
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                {{ $operation[$train]->hp_out }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endfor
                                            </table>
                                        </td>

                                        <td class="m-0 p-0 text-center">
                                            <table class="w-100">
                                                <tbody>
                                                    @for ($train =
                                                    $plant->first()->trains->where('type', 'Train')->count() - 1;
                                                    $train >= 0;
                                                    $train--)
                                                        <tr
                                                            class="@if ($train > 0) border-bottom @endif">
                                                            <td class="text-nowrap">
                                                                {{ $operation[$train]->reject_pressure }}
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </td>
                                        {{-- END PRESSURES --}}

                                        <td class="text-nowrap m-0 px-0.5 text-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <span class="avatar">
                                                    <img class="round"
                                                        src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($operation->first()->assignedBy->name) . '&color=7F9CF5&background=EBF4F4' }}"
                                                        alt="avatar" height="40" width="40">
                                                    <span class="avatar-status-offline"></span>
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <strong>{{ $operation->first()->assignedBy->name }}</strong>
                                            </div>
                                        </td>

                                        <td class="m-0 p-1">
                                            <table>
                                                <tbody>
                                                    @foreach ($operation as $oper)
                                                        <tr
                                                            class="@if (!$loop->last) border-bottom @endif">
                                                            <td>
                                                                <p class="text-justify" style="width: 400px">
                                                                    {{ $loop->iteration }}).
                                                                    {{ $oper->observations }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>

                                        <td class="text-nowrap m-0 px-0.5">
                                            {{ $operation->last()->created_at }}
                                        </td>

                                        <td class="text-center m-0 px-0.5">
                                            {{ $operation->last()->parameters_date }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div style="height: 350pt;"
                            class="d-flex justify-content-center align-items-center text-danger">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="80px" height="80px" viewBox="0 0 59.227 59.227" xml:space="preserve"
                                class="fill-current">
                                <path
                                    d="M51.586,10.029c-0.333-0.475-0.897-0.689-1.449-0.607c-0.021-0.005-0.042-0.014-0.063-0.017L27.469,6.087
                                c-0.247-0.037-0.499-0.01-0.734,0.076L8.63,12.799c-0.008,0.003-0.015,0.008-0.023,0.011c-0.019,0.008-0.037,0.02-0.057,0.027
                                c-0.099,0.044-0.191,0.096-0.276,0.157c-0.026,0.019-0.051,0.038-0.077,0.059c-0.093,0.076-0.178,0.159-0.249,0.254
                                c-0.004,0.006-0.01,0.009-0.014,0.015L0.289,23.78c-0.293,0.401-0.369,0.923-0.202,1.391c0.167,0.469,0.556,0.823,1.038,0.947
                                l6.634,1.713v16.401c0,0.659,0.431,1.242,1.062,1.435l24.29,7.422c0.008,0.004,0.017,0.001,0.025,0.005
                                c0.13,0.036,0.266,0.059,0.402,0.06c0.003,0,0.007,0.002,0.011,0.002l0,0h0.001c0.143,0,0.283-0.026,0.423-0.067
                                c0.044-0.014,0.085-0.033,0.13-0.052c0.059-0.022,0.117-0.038,0.175-0.068l17.43-9.673c0.477-0.265,0.772-0.767,0.772-1.312
                                V25.586l5.896-2.83c0.397-0.19,0.69-0.547,0.802-0.973c0.111-0.427,0.03-0.88-0.223-1.241L51.586,10.029z M27.41,9.111
                                l17.644,2.59L33.35,17.143l-18.534-3.415L27.41,9.111z M9.801,15.854l21.237,3.914l-6.242,9.364l-20.78-5.365L9.801,15.854z
                                    M10.759,43.122V28.605l14.318,3.697c0.125,0.031,0.25,0.048,0.375,0.048c0.493,0,0.965-0.244,1.248-0.668l5.349-8.023v25.968
                                L10.759,43.122z M49.479,41.1l-14.431,8.007V25.414l2.635,5.599c0.171,0.361,0.479,0.641,0.854,0.773
                                c0.163,0.06,0.333,0.087,0.502,0.087c0.223,0,0.444-0.05,0.649-0.146l9.789-4.698L49.479,41.1L49.479,41.1z M39.755,28.368
                                l-4.207-8.938L49.85,12.78l5.634,8.037L39.755,28.368z" />
                            </svg>
                            <strong class="ms-1">NO DATA TO DISPLAY</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge bg-success py-1 px-2">TOTAL:
                        {{ $plant->first()->operations->groupBy('group_by')->count() }}</span>
                </div>
            </div>
        </div>
    </div>
    {{-- Operation end --}}
    @include('content.parameters.extra.modals.addOperationManagerComment')
</div>
