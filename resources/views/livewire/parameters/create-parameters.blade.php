<div class="card" x-data="parameters()" x-cloak>
    <form class="px-2" wire:submit.prevent="store">
        <div class="card-header border-bottom">
            <div>
                <h3>Step <span class="text-danger" x-text="step"></span> for <span class="text-danger"
                        x-text="totalStep"></span></h3>
                <h3>Trains: <span class="text-danger" x-text="trains"></span></h3>

                <div x-show="step < totalStep">
                    <h4 x-show="step % 2">
                        <span class="d-flex">Pretreatment Train #<span x-text="train"></span></span>
                    </h4>

                    <h4 x-show="step % 2 == 0">
                        <span class="d-flex">Operation Train #<span x-text="train"></span></span>
                    </h4>
                </div>

                <h4 x-show="step === totalStep">
                    Product Water
                </h4>
            </div>
            <div x-show="step % 2">
                <label for="statusTrain">TRAIN STATUS</label>
                <div class="form-check form-switch form-check-success">
                    <input type="checkbox" class="form-check-input" id="customSwitch111" checked>
                    <label class="form-check-label" for="customSwitch111">
                        <span class="switch-icon-left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-check">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </span>
                        <span class="switch-icon-right">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-x text-danger">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </span>
                    </label>
                </div>
            </div>
            @if ($addOldParameters)
                <div class="alert alert-warning mt-2 px-3 py-1 d-flex justify-content-between align-items-center"
                    role="alert">
                    <div class="me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                            <path
                                d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                            <path
                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                    </div>
                    <div>
                        <p>Remember, as these parameters are out of time, they will be validated by the Operations
                            Manager and may be approved or rejected. Please verify that your data is correct to avoid
                            rejection and having to redo this process again.</p>
                    </div>
                </div>

                <label class="form-label">PARAMETERS DATE</label>
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-text @error('parameters_date') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-calendar-plus @error('parameters_date') text-danger @enderror"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            </svg>
                        </span>
                        <input type="text" autocomplete="off" id="fp-default"
                            @if ($addOldParameters == false) disabled @endif
                            class="form-control flatpickr-basic @error('parameters_date') is-invalid border-danger @enderror"
                            wire:model="parameters_date" placeholder="YYYY-MM-DD">
                    </div>
                    @error('parameters_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            @endif
        </div>

        {{-- Formulario que se repite segun el numero de trenes --}}
        @for ($pre = 1; $pre <= $plant->trains->where('type', 'Train')->count() * 2; $pre++)
            @if ($pre % 2 != 0)
                {{-- /* Pretreatment Section */ --}}
                <div class="card-body" x-show.transition.in="step === {{ $pre }}">
                    @if ($plant->trains[$pre - 1]->status == 'Disabled')
                        <div class="d-flex justify-content-center align-items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                class="bi bi-x-octagon text-danger" viewBox="0 0 16 16">
                                <path
                                    d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>

                            <h1 class="text-danger display-5 ms-1">THE TRAIN IS DISABLED</h1>
                        </div>
                    @else
                        @if ($plant->personalitation_plant->well_pump == 'yes' || $plant->personalitation_plant->feed_pump == 'yes')
                            <label class="h5">AMPERAGE</label>
                            <div class="row">
                                @if ($plant->personalitation_plant->well_pump == 'yes')
                                    <div class="col-6">
                                        <label class="form-label">Well
                                            pump</label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-text @error("pump.well.$pre") border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-gear-fill @error("pump.well.$pre") text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                                </svg>
                                            </span>
                                            <input type="text" x-mask:dynamic="$money($input)"
                                                class="form-control @error("pump.well.$pre") is-invalid border-danger @enderror"
                                                wire:model="pump.well.{{ $pre }}" placeholder="0.0 A">
                                        </div>
                                        @error("pump.well.$pre")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                                @if ($plant->personalitation_plant->feed_pump == 'yes')
                                    <div class="col-6">
                                        <label class="form-label">Feed
                                            pump</label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-text @error("pump.feed.$pre") border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-gear-fill @error("pump.feed.$pre") text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                                </svg>
                                            </span>
                                            <input type="text" x-mask:dynamic="$money($input)"
                                                class="form-control @error("pump.feed.$pre") is-invalid border-danger @enderror"
                                                wire:model="pump.feed.{{ $pre }}" placeholder="0.0 A">
                                        </div>
                                        @error("pump.feed.$pre")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                        @endif

                        @if ($plant->personalitation_plant->well_pump == 'yes' || $plant->personalitation_plant->feed_pump == 'yes')
                            <label class="h5 mt-1">FREQUENCIES</label>
                            <div class="row">
                                @if ($plant->personalitation_plant->well_pump == 'yes')
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Well
                                            pump</label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-text @error("pump.wellf.$pre") border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-gear-fill @error("pump.wellf.$pre") text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                                </svg>
                                            </span>
                                            <input type="text" x-mask:dynamic="$money($input)"
                                                class="form-control @error("pump.wellf.$pre") is-invalid border-danger @enderror"
                                                wire:model="pump.wellf.{{ $pre }}" placeholder="0.0 Hz">
                                        </div>
                                        @error("pump.wellf.$pre")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                                @if ($plant->personalitation_plant->feed_pump == 'yes')
                                    <div class="col-6 mb-2">
                                        <label class="form-label">Feed
                                            pump</label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-text @error("pump.feedf.$pre") border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-gear-fill @error("pump.feedf.$pre") text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                                </svg>
                                            </span>
                                            <input type="text" x-mask:dynamic="$money($input)"
                                                class="form-control @error("pump.feedf.$pre") is-invalid border-danger @enderror"
                                                wire:model="pump.feedf.{{ $pre }}" placeholder="0.0 Hz">
                                        </div>
                                        @error("pump.feedf.$pre")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                        @endif

                        <label class="h5 mt-1">MULTIMEDIA FILTERS</label>
                        @for ($i = 1; $i <= $plant->multimedia_filters_quantity; $i++)
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label class="form-label">IN #{{ $i }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text @error("mm.in.$pre.$i") border-danger @enderror"
                                            id="basic-addon-search1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-gear-fill @error("mm.in.$pre.$i") text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                            </svg>
                                        </span>

                                        <input type="text" x-mask:dynamic="$money($input)"
                                            class="form-control @error("mm.in.$pre.$i") is-invalid border-danger @enderror"
                                            wire:model="mm.in.{{ $pre }}.{{ $i }}"
                                            placeholder="0.0 psi">
                                    </div>
                                    @error("mm.in.$pre.$i")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-6 mb-2">
                                    <label class="form-label">OUT #{{ $i }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text @error("mm.out.$pre.$i") border-danger @enderror"
                                            id="basic-addon-search1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-gear-fill @error("mm.out.$pre.$i") text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                            </svg>
                                        </span>
                                        <input type="text" x-mask:dynamic="$money($input)"
                                            class="form-control @error("mm.out.$pre.$i") is-invalid border-danger @enderror"
                                            wire:model="mm.out.{{ $pre }}.{{ $i }}"
                                            placeholder="0.0 psi">
                                    </div>
                                    @error("mm.out.$pre.$i")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endfor

                        <label class="form-label">BACKWASH</label>
                        <div class="mb-1">
                            <div class="input-group">
                                <span class="input-group-text @error("backwash.$pre") border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-gear-fill @error("backwash.$pre") text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                    </svg>
                                </span>
                                <input type="number"
                                    class="form-control @error("backwash.$pre") is-invalid border-danger @enderror"
                                    wire:model="backwash.{{ $pre }}" placeholder="0.0 min">
                            </div>
                            @error("backwash.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <label class="h5 mt-1">POLISH FILTERS</label>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label class="form-label">IN</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("pf.in.$pre") border-danger @enderror"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-gear-fill @error("pf.in.$pre") text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                        </svg>
                                    </span>
                                    <input type="text" x-mask:dynamic="$money($input)"
                                        class="form-control @error("pf.in.$pre") is-invalid border-danger @enderror"
                                        wire:model="pf.in.{{ $pre }}" placeholder="0.0 psi">
                                </div>
                                @error("pf.in.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6 mb-2">
                                <label class="form-label">OUT</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("pf.out.$pre") border-danger @enderror"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-gear-fill @error("pf.out.$pre") text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                        </svg>
                                    </span>
                                    <input type="text" x-mask:dynamic="$money($input)"
                                        class="form-control @error("pf.out.$pre") is-invalid border-danger @enderror"
                                        wire:model="pf.out.{{ $pre }}" placeholder="0.0 psi">
                                </div>
                                @error("pf.out.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="table-responsive table-sm">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>FILTER #</th>
                                        <th>CHANGE?</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @for ($i = 1; $i <= $plant->polish_filters_quantity; $i++)
                                        <tr>
                                            <td>Filter # {{ $i }}</td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <div class="form-check form-switch form-check-success my-1">
                                                    <input type="checkbox" class="form-check-input"
                                                        wire:model.lazy="filters.{{ $pre }}.{{ $i }}">
                                                    <label class="form-check-label">
                                                        <span class="switch-icon-left">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-check">
                                                                <polyline points="20 6 9 17 4 12"></polyline>
                                                            </svg>
                                                        </span>
                                                        <span class="switch-icon-right"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            <label for="observations">Observations</label>
                            <textarea style="resize: none"
                                class="form-control @error("observations.pre.$pre") is-invalid border-danger text-danger @enderror"
                                wire:model="observations.pre.{{ $pre }}" rows="5" placeholder="Observations"></textarea>

                            @error("observations.pre.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>
                {{-- /* Pretreatment Section */ --}}
            @else
                {{-- /* Operation Section */ --}}
                <div class="card-body" x-show.transition.in="step === {{ $pre }}">
                    <label class="h5">AMPERAGE</label>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="form-label">H.P.</label>
                            <div class="input-group">
                                <span class="input-group-text @error("hp.amp.$pre") border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-wrench-adjustable @error("hp.amp.$pre") text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                        <path
                                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                    </svg>
                                </span>
                                <input type="text" x-mask:dynamic="$money($input)"
                                    class="form-control @error("hp.amp.$pre") is-invalid border-danger @enderror"
                                    wire:model="hp.amp.{{ $pre }}" placeholder="0.0 A">
                            </div>
                            @error("hp.amp.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @for ($i = 1; $i <= $plant->trains->first()->boosters_quantity; $i++)
                            <div class="col-6 mb-2">
                                <label class="form-label">Booster
                                    #{{ $i }}</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error("booster.amp.$pre.$i") border-danger @enderror"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-asterisk @error("booster.amp.$pre.$i") text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </span>
                                    <input type="text" x-mask:dynamic="$money($input)"
                                        class="form-control @error("booster.amp.$pre.$i") is-invalid
                                    border-danger @enderror"
                                        wire:model="booster.amp.{{ $pre }}.{{ $i }}"
                                        placeholder="0.0 A">
                                </div>
                                @error("booster.amp.$pre.$i")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endfor
                    </div>

                    <label class="h5 mt-1">FREQUENCIES</label>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="form-label">H.P.</label>
                            <div class="input-group">
                                <span class="input-group-text @error("hp.fre.$pre") border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-wrench-adjustable @error("hp.fre.$pre") text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                        <path
                                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                    </svg>
                                </span>
                                <input type="text" x-mask:dynamic="$money($input)"
                                    class="form-control @error("hp.fre.$pre") is-invalid border-danger @enderror"
                                    wire:model="hp.fre.{{ $pre }}" placeholder="0.0 Hz">
                            </div>
                            @error("hp.fre.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @for ($i = 1; $i <= $plant->trains->first()->boosters_quantity; $i++)
                            <div class="col-6 mb-2">
                                <label class="form-label">Booster #
                                    {{ $i }}</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error(" booster.fre.$pre.$i") border border-danger @enderror"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-asterisk @error(" booster.fre.$pre.$i") text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </span>
                                    <input type="text" x-mask:dynamic="$money($input)"
                                        class="form-control @error(" booster.fre.$pre.$i") border
                                    border-danger @enderror"
                                        wire:model="booster.fre.{{ $pre }}.{{ $i }}"
                                        placeholder="0.0 Hz">
                                </div>
                                @error("booster.fre.$pre.$i")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endfor
                    </div>

                    <label class="h5 mt-1">FEED</label>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="form-label">pH</label>
                            <div class="input-group">
                                <span class="input-group-text @error("ph.ope.$pre") border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-wrench-adjustable @error("ph.ope.$pre") text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                        <path
                                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                    </svg>
                                </span>
                                <input type="text" x-mask:dynamic="$money($input)"
                                    class="form-control @error("ph.ope.$pre") is-invalid border-danger @enderror"
                                    wire:model="ph.ope.{{ $pre }}" placeholder="0.0 u. pH">
                            </div>
                            @error("ph.ope.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label class="form-label">Temperature</label>
                            <div class="input-group">
                                <span class="input-group-text @error("temperature.$pre") border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-thermometer-half @error("temperature.$pre") text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415z" />
                                        <path
                                            d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z" />
                                    </svg>
                                </span>
                                <input type="text" x-mask:dynamic="$money($input)"
                                    class="form-control @error("temperature.$pre") is-invalid border-danger @enderror"
                                    wire:model="temperature.{{ $pre }}" placeholder="0.0 ºC">
                            </div>
                            @error("temperature.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <label class="h5 mt-1">TDS CONCENTRATION</label>
                    <div class="row">
                        <div class="col-4 mb-2">
                            <label class="form-label">Feed</label>
                            <div class="input-group">
                                <span class="input-group-text @error("feed.ope.$pre") border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-wrench-adjustable @error("feed.ope.$pre") text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                        <path
                                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                    </svg>
                                </span>
                                <input type="text" x-mask:dynamic="$money($input)"
                                    class="form-control @error("feed.ope.$pre") is-invalid border-danger @enderror"
                                    wire:model="feed.ope.{{ $pre }}" placeholder="0.0 ppm TDS">
                            </div>
                            @error("feed.ope.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4 mb-2">
                            <label class="form-label">Permeate</label>
                            <div class="input-group">
                                <span class="input-group-text @error("permeate.ope.$pre") border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-wrench-adjustable @error("permeate.ope.$pre") text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                        <path
                                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                    </svg>
                                </span>
                                <input type="text" x-mask:dynamic="$money($input)"
                                    class="form-control @error("permeate.ope.$pre") is-invalid border-danger @enderror"
                                    wire:model="permeate.ope.{{ $pre }}" placeholder="0.0 ppm TDS">
                            </div>
                            @error("permeate.ope.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4 mb-2">
                            <label class="form-label">Reject</label>
                            <div class="input-group">
                                <span class="input-group-text @error("reject.ope.$pre") border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-wrench-adjustable @error("reject.ope.$pre") text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                        <path
                                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                    </svg>
                                </span>
                                <input type="text" x-mask:dynamic="$money($input)"
                                    class="form-control @error("reject.ope.$pre") is-invalid border-danger @enderror"
                                    wire:model="reject.ope.{{ $pre }}" placeholder="0.0 ppm TDS">
                            </div>
                            @error("reject.ope.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <label class="h5 mt-1">FLOW</label>
                    <div class="row">
                        <div class="col-4 mb-2">
                            @if ($plant->personalitation_plant->feed_flow == 'yes')
                                <label class="form-label">Feed</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("feed.flo.$pre") border-danger @enderror"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("feed.flo.$pre") text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="text" x-mask:dynamic="$money($input)"
                                        class="form-control @error("feed.flo.$pre") is-invalid border-danger @enderror"
                                        wire:model="feed.flo.{{ $pre }}" placeholder="0.0 gpm">
                                </div>
                                @error("feed.flo.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @endif
                        </div>

                        <div class="col-4 mb-2">
                            @if ($plant->personalitation_plant->permeate_flow == 'yes')
                                <label class="form-label">Permeate</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("permeate.flo.$pre") border-danger @enderror"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("permeate.flo.$pre") text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="text" x-mask:dynamic="$money($input)"
                                        class="form-control @error("permeate.flo.$pre") is-invalid border-danger @enderror"
                                        wire:model="permeate.flo.{{ $pre }}" placeholder="0.0 gpm">
                                </div>
                                @error("permeate.flo.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @endif
                        </div>

                        <div class="col-4 mb-2">
                            @if ($plant->personalitation_plant->reject_flow == 'yes')
                                <label class="form-label">Reject</label>
                                <div class="input-group">
                                    <span class="input-group-text @error("reject.flo.$pre") border-danger @enderror"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-wrench-adjustable @error("reject.flo.$pre") text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                            <path
                                                d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <input type="text" x-mask:dynamic="$money($input)"
                                        class="form-control @error("reject.flo.$pre") is-invalid border-danger @enderror"
                                        wire:model="reject.flo.{{ $pre }}" placeholder="0.0 gpm">
                                </div>
                                @error("reject.flo.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @endif
                        </div>

                        @if ($plant->personalitation_plant->boosterc == 'yes')
                            <div class="col-4 mb-2">
                                <label class="form-label">Booster
                                    @for ($i = 0; $i < $plant->trains->first()->boosters_quantity; $i++)
                                        {{ $i > 0 ? '+' : '' }} {{ $i + 1 }}
                                    @endfor Out
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text @error("booster.co.$pre") border-danger @enderror"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-asterisk @error("booster.co.$pre") text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </span>
                                    <input type="text" x-mask:dynamic="$money($input)"
                                        class="form-control @error("booster.co.$pre") is-invalid border-danger @enderror"
                                        wire:model="booster.co.{{ $pre }}" placeholder="0.0 gpm">
                                </div>
                                @error("booster.co.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                    </div>

                    <label class="h5 mt-1">PRESSURES</label>
                    <div class="row">
                        <div class="col-4 mb-2">
                            <label class="form-label">H.P. In</label>
                            <div class="input-group">
                                <span class="input-group-text @error("hp.in.$pre") border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-wrench-adjustable @error("hp.in.$pre") text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                        <path
                                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                    </svg>
                                </span>
                                <input type="text" x-mask:dynamic="$money($input)"
                                    class="form-control @error("hp.in.$pre") is-invalid border-danger @enderror"
                                    wire:model="hp.in.{{ $pre }}" placeholder="0.0 psi">
                            </div>
                            @error("hp.in.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4 mb-2">
                            <label class="form-label">H.P. Out</label>
                            <div class="input-group">
                                <span class="input-group-text @error("hp.out.$pre") border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-wrench-adjustable @error("hp.out.$pre") text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                        <path
                                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                    </svg>
                                </span>
                                <input type="text" x-mask:dynamic="$money($input)"
                                    class="form-control @error("hp.out.$pre") is-invalid border-danger @enderror"
                                    wire:model="hp.out.{{ $pre }}" placeholder="0.0 psi">
                            </div>
                            @error("hp.out.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4 mb-2">
                            <label class="form-label">Reject</label>
                            <div class="input-group">
                                <span class="input-group-text @error("reject.pre.$pre") border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-wrench-adjustable @error("reject.pre.$pre") text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                        <path
                                            d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                    </svg>
                                </span>
                                <input type="text" x-mask:dynamic="$money($input)"
                                    class="form-control @error("reject.pre.$pre") is-invalid border-danger @enderror"
                                    wire:model="reject.pre.{{ $pre }}" placeholder="0.0 psi">
                            </div>
                            @error("reject.pre.$pre")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($plant->personalitation_plant->boosterc == 'yes')
                            <div class="col mb-2">
                                <label class="form-label">Booster
                                    @for ($i = 0; $i < $plant->trains->first()->boosters_quantity; $i++)
                                        {{ $i > 0 ? '+' : '' }} {{ $i + 1 }}
                                    @endfor Out
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text @error("booster.cp.$pre") border-danger @enderror"
                                        id="basic-addon-search1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor"
                                            class="bi bi-asterisk @error("booster.cp.$pre") text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </span>
                                    <input type="text" x-mask:dynamic="$money($input)"
                                        class="form-control @error("booster.cp.$pre") is-invalid border-danger @enderror"
                                        wire:model="booster.cp.{{ $pre }}" placeholder="0.0 psi">
                                </div>
                                @error("booster.cp.$pre")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        <div class="col">
                            @for ($i = 1; $i <= $plant->trains->first()->boosters_quantity; $i++)
                                <div class="col-md mb-2">
                                    <label class="form-label">Booster #
                                        {{ $i }}</label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error("booster.pre.$pre.$i") border-danger @enderror"
                                            id="basic-addon-search1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-asterisk @error("booster.pre.$pre.$i") text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                            </svg>
                                        </span>
                                        <input type="text" x-mask:dynamic="$money($input)"
                                            class="form-control @error("booster.pre.$pre.$i") is-invalid
                                        border-danger @enderror"
                                            wire:model="booster.pre.{{ $pre }}.{{ $i }}"
                                            placeholder="0.0 psi">
                                    </div>
                                    @error("booster.pre.$pre.$i")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="observations">Observations</label>
                        <textarea style="resize: none;"
                            class="form-control @error("observations.ope.$pre") is-invalid border-danger @enderror"
                            wire:model="observations.ope.{{ $pre }}" rows="5" placeholder="Observations"></textarea>

                        @error("observations.ope.$pre")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- /* Operation Section */ --}}
            @endif
        @endfor
        {{-- Formulario que se repite segun el numero de trenes --}}

        {{-- /* Product Water Section */ --}}
        <div class="card-body" x-show.transition.in="step === totalStep">
            <label class="h5">FEED LINE TO HOTEL SUPPLY</label>
            <div class="row">
                <div class="col-6 mb-2">
                    <label class="form-label">pH</label>
                    <div class="input-group">
                        <span class="input-group-text @error('ph') border-danger @enderror" id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wrench-adjustable @error('ph') text-danger @enderror"
                                viewBox="0 0 16 16">
                                <path
                                    d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                <path
                                    d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('ph') is-invalid border-danger @enderror" wire:model="ph.pro"
                            placeholder="0.0 u. pH">
                    </div>
                    @error('ph')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-6 mb-2">
                    <label class="form-label">Hardness</label>
                    <div class="input-group">
                        <span class="input-group-text @error('hardness') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wrench-adjustable @error('hardness') text-danger @enderror"
                                viewBox="0 0 16 16">
                                <path
                                    d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                <path
                                    d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('hardness') is-invalid border-danger @enderror"
                            wire:model="hardness" placeholder="0.0 ppm">
                    </div>
                    @error('hardness')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-6 mb-2">
                    <label class="form-label">TDS</label>
                    <div class="input-group">
                        <span class="input-group-text @error('tds') border-danger @enderror" id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wrench-adjustable @error('tds') text-danger @enderror"
                                viewBox="0 0 16 16">
                                <path
                                    d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                <path
                                    d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('tds') is-invalid border-danger @enderror" wire:model="tds"
                            placeholder="0.0 ppm">
                    </div>
                    @error('tds')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-6 mb-2">
                    <label class="form-label">H2S</label>
                    <div class="input-group">
                        <span class="input-group-text @error('h2s') border-danger @enderror" id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wrench-adjustable @error('h2s') text-danger @enderror"
                                viewBox="0 0 16 16">
                                <path
                                    d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                <path
                                    d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('h2s') is-invalid border-danger @enderror" wire:model="h2s"
                            placeholder="0.0 ppm">
                    </div>
                    @error('h2s')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mt-1">
                <div class="col-6 mb-2">
                    <label class="form-label">Free Chlorine</label>
                    <div class="input-group">
                        <span class="input-group-text @error('free_chlorine') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wrench-adjustable @error('free_chlorine') text-danger @enderror"
                                viewBox="0 0 16 16">
                                <path
                                    d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                <path
                                    d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('free_chlorine') is-invalid border-danger @enderror"
                            wire:model="free_chlorine" placeholder="0.0 u. pH">
                    </div>
                    @error('free_chlorine')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                @if ($plant->personalitation_plant->chloride == 'yes')
                    <div class="col-6 mb-2">
                        <label class="form-label">Chlorides</label>
                        <div class="input-group">
                            <span class="input-group-text @error('chloride') border-danger @enderror"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-wrench-adjustable @error('chloride') text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z" />
                                    <path
                                        d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                </svg>
                            </span>
                            <input type="text" x-mask:dynamic="$money($input)"
                                class="form-control @error('chloride') is-invalid border-danger @enderror"
                                wire:model="chloride" placeholder="0.0 ppm">
                        </div>
                        @error('chloride')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
            </div>

            <label class="h5 mt-1">WATER METER READINGS</label><br>
            <span class="text-danger">Remember that here you are asked for the meter readings, not the production
                calculation.</span>
            <div class="row">
                @for ($i = 1; $i <= $plant->trains->where('type', 'Train')->count(); $i++)
                    <div class="col mb-2">
                        <label class="form-label">Train #{{ $i }}</label>
                        <div class="input-group">
                            <span class="input-group-text @error("reading.$i") border-danger @enderror"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-water @error("reading.$i") text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                </svg>
                            </span>
                            <input type="text" x-mask:dynamic="$money($input)"
                                class="form-control @error("reading.$i") is-invalid border-danger @enderror"
                                wire:model="reading.{{ $i }}" placeholder="0.0 m3">
                        </div>
                        @error("reading.$i")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endfor
            </div>

            <div class="row">
                @if ($plant->personalitation_plant->irrigation == 'yes')
                    <div class="col-6 mb-2">
                        <label class="form-label">Irrigation</label>
                        <div class="input-group">
                            <span class="input-group-text @error('irrigation') border-danger @enderror"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-water @error('irrigation') text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                                </svg>
                            </span>
                            <input type="text" x-mask:dynamic="$money($input)"
                                class="form-control @error('irrigation') is-invalid border-danger @enderror"
                                wire:model="irrigation" placeholder="0.0 m3">
                        </div>
                        @error('irrigation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif

                <div class="col-6 mb-2">
                    <label class="form-label">Municipal</label>
                    <div class="input-group">
                        <span class="input-group-text @error('municipal') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-water @error('municipal') text-danger @enderror" viewBox="0 0 16 16">
                                <path
                                    d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65zm0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('municipal') is-invalid border-danger @enderror"
                            wire:model="municipal" placeholder="0.0 m3">
                    </div>
                    @error('municipal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <label class="h5 mt-1">TANK LEVELS</label>
            <div class="row">
                @for ($i = 1; $i <= $plant->cisterns_quantity; $i++)
                    <div class="col mb-2">
                        <label class="form-label">Tank
                            #{{ $i }}</label>
                        <div class="input-group">
                            <span class="input-group-text @error("tank.$i") border-danger @enderror"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-moisture @error("tank.$i") text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M13.5 0a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V7.5h-1.5a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V15h-1.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V.5a.5.5 0 0 0-.5-.5h-2zM7 1.5l.364-.343a.5.5 0 0 0-.728 0l-.002.002-.006.007-.022.023-.08.088a28.458 28.458 0 0 0-1.274 1.517c-.769.983-1.714 2.325-2.385 3.727C2.368 7.564 2 8.682 2 9.733 2 12.614 4.212 15 7 15s5-2.386 5-5.267c0-1.05-.368-2.169-.867-3.212-.671-1.402-1.616-2.744-2.385-3.727a28.458 28.458 0 0 0-1.354-1.605l-.022-.023-.006-.007-.002-.001L7 1.5zm0 0-.364-.343L7 1.5zm-.016.766L7 2.247l.016.019c.24.274.572.667.944 1.144.611.781 1.32 1.776 1.901 2.827H4.14c.58-1.051 1.29-2.046 1.9-2.827.373-.477.706-.87.945-1.144zM3 9.733c0-.755.244-1.612.638-2.496h6.724c.395.884.638 1.741.638 2.496C11 12.117 9.182 14 7 14s-4-1.883-4-4.267z" />
                                </svg>
                            </span>
                            <select class="form-select @error("tank.$i") is-invalid border-danger @enderror"
                                wire:model="tank.{{ $i }}">
                                <option value="" selected>SELECT</option>
                                @for ($j = 0; $j <= 100; $j++)
                                    <option value="{{ $j }}">{{ $j }}%</option>
                                @endfor
                            </select>
                        </div>
                        @error("tank.$i")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endfor
            </div>

            <label class="h5 mt-1">DAILY CHEMICAL SUPPLY</label>
            <div class="row">
                <div class="col-4 mb-2">
                    <label class="form-label">Calcium
                        Chloride</label>
                    <div class="input-group">
                        <span class="input-group-text @error('calcium_chloride') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-radioactive @error('calcium_chloride') text-danger @enderror"
                                viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z" />
                                <path
                                    d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('calcium_chloride') is-invalid border-danger @enderror"
                            wire:model="calcium_chloride" placeholder="0.0 Kg">
                    </div>
                    @error('calcium_chloride')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-4 mb-2">
                    <label class="form-label">Sodium
                        Carbonate</label>
                    <div class="input-group">
                        <span class="input-group-text @error('sodium_carbonate') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-water @error('sodium_carbonate') text-danger @enderror"
                                viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z" />
                                <path
                                    d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('sodium_carbonate') is-invalid border-danger @enderror"
                            wire:model="sodium_carbonate" placeholder="0.0 Kg">
                    </div>
                    @error('sodium_carbonate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-4 mb-2">
                    <label class="form-label">Sodium
                        Hypochloride</label>
                    <div class="input-group">
                        <span class="input-group-text @error('sodium_hypochloride') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-water @error('sodium_hypochloride') text-danger @enderror"
                                viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z" />
                                <path
                                    d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('sodium_hypochloride') is-invalid border-danger @enderror"
                            wire:model="sodium_hypochloride" placeholder="0.0 Kg">
                    </div>
                    @error('sodium_hypochloride')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-4 mb-2">
                    <label class="form-label">Antiscalant</label>
                    <div class="input-group">
                        <span class="input-group-text @error('antiscalant') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-water @error('antiscalant') text-danger @enderror" viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z" />
                                <path
                                    d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('antiscalant') is-invalid border-danger @enderror"
                            wire:model="antiscalant" placeholder="0.0 L">
                    </div>
                    @error('antiscalant')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-4 mb-2">
                    <label class="form-label">Sodium
                        Hydroxide</label>
                    <div class="input-group">
                        <span class="input-group-text @error('sodium_hydroxide') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-water @error('sodium_hydroxide') text-danger @enderror"
                                viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z" />
                                <path
                                    d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('sodium_hydroxide') is-invalid border-danger @enderror"
                            wire:model="sodium_hydroxide" placeholder="0.0 Kg">
                    </div>
                    @error('sodium_hydroxide')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-4 mb-2">
                    <label class="form-label">Hydrochloric
                        Acid</label>
                    <div class="input-group">
                        <span class="input-group-text @error('hydrochloric_acid') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-water @error('hydrochloric_acid') text-danger @enderror"
                                viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z" />
                                <path
                                    d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('hydrochloric_acid') is-invalid border-danger @enderror"
                            wire:model="hydrochloric_acid" placeholder="0.0 Kg">
                    </div>
                    @error('hydrochloric_acid')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-6 mb-2">
                    <label class="form-label">Kl-1</label>
                    <div class="input-group">
                        <span class="input-group-text @error('kl1') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-water @error('kl1') text-danger @enderror" viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z" />
                                <path
                                    d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('kl1') is-invalid border-danger @enderror" wire:model="kl1"
                            placeholder="0.0 Kg">
                    </div>
                    @error('kl1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-6 mb-2">
                    <label class="form-label">Kl-2</label>
                    <div class="input-group">
                        <span class="input-group-text @error('kl2') border-danger @enderror"
                            id="basic-addon-search1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-water @error('kl2') text-danger @enderror" viewBox="0 0 16 16">
                                <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1ZM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8Z" />
                                <path
                                    d="M9.653 5.496A2.986 2.986 0 0 0 8 5c-.61 0-1.179.183-1.653.496L4.694 2.992A5.972 5.972 0 0 1 8 2c1.222 0 2.358.365 3.306.992L9.653 5.496Zm1.342 2.324a2.986 2.986 0 0 1-.884 2.312 3.01 3.01 0 0 1-.769.552l1.342 2.683c.57-.286 1.09-.66 1.538-1.103a5.986 5.986 0 0 0 1.767-4.624l-2.994.18Zm-5.679 5.548 1.342-2.684A3 3 0 0 1 5.005 7.82l-2.994-.18a6 6 0 0 0 3.306 5.728ZM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                        </span>
                        <input type="text" x-mask:dynamic="$money($input)"
                            class="form-control @error('kl2') is-invalid border-danger @enderror" wire:model="kl2"
                            placeholder="0.0 Kg">
                    </div>
                    @error('kl2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mt-2">
                <label for="observations">Observations</label>
                <textarea style="resize: none" class="form-control @error('observations.prw') is-invalid border-danger @enderror"
                    wire:model="observations.prw" rows="4" placeholder="Observations"></textarea>

                @error('observations.prw')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        {{-- /* Product Water Section */ --}}

        <div class="card-footer">
            <div class="d-flex align-items-center justify-content-between">
                <div class="col me-2" x-show="step > 1" x-transition.delay.150ms>
                    <button @click="removeStep()" onclick="setTimeout(function(){window.scrollTo(0,0)}, 300);"
                        type="button"
                        class="btn d-flex col-12 btn-lg btn-danger me-2 align-items-center justify-content-start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                            <path
                                d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                        </svg>
                        <strong>Back</strong>
                    </button>
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col" x-show="step < totalStep" x-transition>
                            <button @click="addStep()" onclick="setTimeout(function(){window.scrollTo(0,0)}, 300);"
                                type="button" @if ($errors->any()) disabled @endif
                                class="btn d-flex col-12 btn-lg btn-primary align-items-center justify-content-end">
                                <strong>Next</strong>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                </svg>
                            </button>
                        </div>

                        <div class="col" x-show="step === totalStep" x-transition>
                            <button wire:offline.attr="disabled" @if ($errors->any()) disabled @endif
                                type="button" wire:click="$emit('confirmParameters')"
                                class="btn d-flex col-12 btn-lg btn-success align-items-center justify-content-end">
                                <strong>Add Parameters</strong>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-cloud-upload-fill ms-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2">
                @if ($errors->any())
                    <strong class="text-danger">*In order to continue filling out the form, you need to correct your
                        validation errors!</strong>
                @endif
            </div>
        </div>
    </form>

    @section('livewire-js')
        <script>
            Livewire.on('confirmParameters', postId => {
                Swal.fire({
                    title: 'The parameters are correct?',
                    text: "The parameters can´t be modified!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save!',
                    backdrop: true,
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        @this.store()
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                });
            });

            Livewire.on('success-AddOldParameters', postId => {
                Swal.fire({
                    title: "Registration Success",
                    text: "We will send your parameters to the operations manager for him to evaluate, when he has an answer we will send you a notification!",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.replace(@json(route('companies.services.plants.index', [$company, $service])))
                    }
                })
            });

            Livewire.on('success-alert', postId => {
                Swal.fire({
                    title: "Registration Success",
                    text: "Your Parameters has been Saved!",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.replace(@json(route('companies.services.plants.index', [$company, $service])))
                    }
                })
            });

            Livewire.on('error-alert', event => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "An error has occurred :(!",
                    footer: '<a href="#">Contact support?</a>'
                })
            });
        </script>
    @endsection
</div>
