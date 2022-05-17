<div wire:poll.60000ms>

    <head>
        <div class="d-flex justify-content-between align-items-center">
            <div class="w-25">
                <label class="form" for="">Search:</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-search2"><svg xmlns="http://www.w3.org/2000/svg"
                            width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg></span>
                    <input type="search" wire:model='search' class="form-control" placeholder="Plant Name..."
                        aria-label="Plant Name..." aria-describedby="basic-addon-search2">
                </div>
            </div>

            <a class="btn btn-icon btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
                <span>Add Plant</span>
            </a>
        </div>
    </head>

    <section class="row mt-1">
        <div wire:loading='query'>
            <div class="text-center">
                <span class="spinner-border text-danger"></span>
            </div>
        </div>

        @forelse ($plants as $plant)
            <div wire:loading.remove class="col-sm-1 col-md-6 col-lg-6">
                <div class="card">
                    @hasanyrole('Super-Admin|Operations-Manager|Administrative-Manager')
                        <div class="d-flex btn-group justify-content-end plant-acctions">
                            <button class="btn btn-icon btn-flat-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </button>

                            <button class="btn btn-icon btn-flat-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </button>

                            <button class="btn btn-icon btn-flat-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 1.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v1H6v-1Zm5 0v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5ZM4.5 5.029a.5.5 0 1 1 .998-.06l.5 8.5a.5.5 0 0 1-.998.06l-.5-8.5Zm6.53-.528a.5.5 0 0 1 .47.528l-.5 8.5a.5.5 0 1 1-.998-.058l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg>
                            </button>
                        </div>
                    @endhasanyrole
                    <img src="https://www.f-w-s.com/assets/img/sistemas/planta_tratamiento_osmosis_inversa/planta-tratamiento-osmosis-inversa.jpg"
                        class="img-thumbnail" alt="plant_cover">

                    <div class="card-body">
                        <h5 class="card-title text-uppercase">{{ $plant->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted text-capitalize">{{ $plant->location }},
                            {{ $plant->country->name }} ({{ $plant->company->name }})</h6>

                        <hr>

                        <div class="row">
                            <div class="col text-center">
                                <h4>{{ $plant->trains->where('type', 'Train')->count() }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-subtract" viewBox="0 0 16 16">
                                        <path
                                            d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z" />
                                    </svg>
                                </h4>
                                <small>Train</small>
                            </div>
                            <div class="col text-center">
                                <h4>{{ $plant->cisterns_quantity }} <i class="fas fa-prescription-bottle"></i>
                                </h4>
                                <small>Cisterns</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <h4>{{ $plant->multimedia_filters_quantity }} <svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-funnel-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                    </svg>
                                </h4>
                                <small>Multimedia Filters</small>
                            </div>
                            <div class="col text-center">
                                <h4>{{ $plant->polish_filters_quantity }} <svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-funnel-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                    </svg>
                                </h4>
                                <small>Polish Filters</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                @if ($plant->installed_capacity)
                                    <h5>{{ $plant->installed_capacity }} <i class="fas fa-tint"></i></h4>
                                    @else
                                        <h4 class="text-muted">N/A <i class="fas fa-tint"></i></h4>
                                @endif
                                <small>Installed Capacity</small>
                            </div>

                            <div class="col text-center">
                                @if ($plant->design_limit)
                                    <h4>{{ $plant->design_limit }} <i class="fas fa-tint"></i></h4>
                                @else
                                    <h4 class="text-muted">N/A <i class="fas fa-tint"></i></h4>
                                @endif
                                <small>Design Limit</small>
                            </div>
                        </div>

                        <hr>

                        {{-- <div class="btn-group col-12" role="group">
                        <a href="{{ route('parameters.create', $plant->id) }}" class="btn btn-success"><i
                                class="fas fa-plus"></i> Parameters</a>
                        <a href="{{ route('parameters.show', $plant->id) }}" class="btn btn-info"><i
                                class="far fa-eye"></i> Parameters</a>
                    </div> --}}

                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Operator</th>
                                    <th scope="col">Manager</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td><i class="fas fa-hard-hat"></i>{{ $plant->Operator->name }} <br>
                                        <i class="fas fa-phone-square-alt"></i>{{ $plant->Operator->phone_1 }}
                                    </td>

                                    <td>
                                        @if ($plant->Manager)
                                            <i class="fas fa-user-circle"></i>{{ $plant->Manager->name }} <br>
                                            <i class="fas fa-phone-square-alt"></i>{{ $plant->Manager->phone_1 }}
                                        @else
                                            <span class="text-danger">N/A</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <p class="card-subtitle mb-2 text-muted text-capitalize">Last Parameters:
                            @if ($plant->product_waters->first())
                                <span class="text-primary">{{ $plant->product_waters->first()->created_at }}</span>
                                <span
                                    class="text-danger">{{ \Carbon\Carbon::create($plant->product_waters->first()->created_at)->diffForHumans() }}</span>
                                <br><span>By ({{ $plant->product_waters->first()->assignedBy->name }})</span>
                            @else
                                <span class="text-danger">N/A</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-danger">NO DATA</div>
        @endforelse
    </section>
</div>
