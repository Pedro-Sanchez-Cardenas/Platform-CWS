<div>
    <div class="d-flex justify-content-between align-items-end">
        <div class="w-25">
            <label class="form" for="">Search:</label>
            <div class="input-group input-group-merge">
                <span class="input-group-text" id="basic-addon-search2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </span>
                <input type="search" wire:model='search' class="form-control" placeholder="Plant Name..."
                    aria-label="Plant Name..." aria-describedby="basic-addon-search2">
            </div>
        </div>

        <a href="{{ route('companies.services.plants.create', [$company, $service]) }}"
            class="btn btn-lg btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
            <span>Add Plant</span>
        </a>
    </div>

    <section class="mt-2">
        <div class="col-12" wire:loading wire:target='search'>
            <div class="text-center">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="spinner-border text-danger"></span>
                    <span class="text-danger h1 ms-1">Loading...</span>
                </div>
            </div>
        </div>

        <div class="row match-height">
            @forelse ($plants as $plant)
                <div wire:loading.remove wire:target='search' class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <img src="https://www.f-w-s.com/assets/img/sistemas/planta_tratamiento_osmosis_inversa/planta-tratamiento-osmosis-inversa.jpg"
                            class="img-thumbnail" alt="plant_cover">

                        @hasanyrole('Super-Admin|Operations-Manager|Administrative-Manager')
                            <div class="d-flex btn-group">
                                <button
                                    class="btn btn-icon btn-flat-warning d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg>
                                    <span class="ms-1">Edit</span>
                                </button>

                                <button
                                    class="btn btn-icon btn-flat-danger d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 1.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v1H6v-1Zm5 0v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5ZM4.5 5.029a.5.5 0 1 1 .998-.06l.5 8.5a.5.5 0 0 1-.998.06l-.5-8.5Zm6.53-.528a.5.5 0 0 1 .47.528l-.5 8.5a.5.5 0 1 1-.998-.058l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                    <span class="ms-1">Delete</span>
                                </button>
                            </div>
                        @endhasanyrole

                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ $plant->name }}</h5>
                            <h6 class="card-subtitle mb-1 text-muted text-capitalize pb-1 border-bottom">
                                {{ $plant->location }},
                                {{ $plant->country->name }} ({{ $plant->company->name }})</h6>

                            <div class="table-responsive border-bottom">
                                <table class="table table-sm border-bottom">
                                    <tbody class="text-center">
                                        <tr>
                                            <td class="col-4">
                                                <span class="text-primary h3">
                                                    {{ $plant->trains->where('type', 'Train')->count() }}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-subtract" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z" />
                                                </svg>
                                                <br>
                                                <small>{{ $plant->trains->where('type', 'Train')->count() < 2 ? 'Train' : 'Trains' }}</small>
                                            </td>

                                            <td class="col-4">
                                                @if ($plant->installed_capacity)
                                                    <span
                                                        class="text-primary h3">{{ $plant->installed_capacity }}</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-aspect-ratio"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                                        <path
                                                            d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z" />
                                                    </svg>
                                                @else
                                                    <span class="text-danger h4">N/A</span>
                                                @endif
                                                <br>
                                                <small>Inst. Capacity</small>
                                            </td>

                                            <td class="col-4">
                                                @if ($plant->design_limit)
                                                    <span class="text-primary h4">{{ $plant->design_limit }}</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-aspect-ratio"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                                        <path
                                                            d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z" />
                                                    </svg>
                                                @else
                                                    <span class="text-danger h4">N/A</span>
                                                @endif
                                                <br>
                                                <small>Design Limit</small>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="col-4">
                                                <span
                                                    class="text-primary h3">{{ $plant->personalitation_plant->cisterns_quantity }}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-moisture" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.5 0a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V7.5h-1.5a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V15h-1.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V.5a.5.5 0 0 0-.5-.5h-2zM7 1.5l.364-.343a.5.5 0 0 0-.728 0l-.002.002-.006.007-.022.023-.08.088a28.458 28.458 0 0 0-1.274 1.517c-.769.983-1.714 2.325-2.385 3.727C2.368 7.564 2 8.682 2 9.733 2 12.614 4.212 15 7 15s5-2.386 5-5.267c0-1.05-.368-2.169-.867-3.212-.671-1.402-1.616-2.744-2.385-3.727a28.458 28.458 0 0 0-1.354-1.605l-.022-.023-.006-.007-.002-.001L7 1.5zm0 0-.364-.343L7 1.5zm-.016.766L7 2.247l.016.019c.24.274.572.667.944 1.144.611.781 1.32 1.776 1.901 2.827H4.14c.58-1.051 1.29-2.046 1.9-2.827.373-.477.706-.87.945-1.144zM3 9.733c0-.755.244-1.612.638-2.496h6.724c.395.884.638 1.741.638 2.496C11 12.117 9.182 14 7 14s-4-1.883-4-4.267z" />
                                                </svg>
                                                <br>
                                                <small>Cisterns</small>
                                            </td>

                                            <td class="col-4">
                                                @foreach ($plant->trains->where('type', 'Train') as $train)
                                                    @if (!$loop->first && $loop->last)
                                                        /
                                                    @endif
                                                    <span
                                                        class="text-primary h3">{{ $train->multimedia_filters_quantity }}</span>
                                                @endforeach
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                                </svg>
                                                <br>
                                                <small>Multimedia Filters</small>
                                            </td>

                                            <td class="col-4">
                                                @foreach ($plant->trains->where('type', 'Train') as $train)
                                                    @if (!$loop->first && $loop->last)
                                                        /
                                                    @endif
                                                    <span
                                                        class="text-primary h3">{{ $train->boosters_quantity }}</span>
                                                @endforeach
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-battery-charging"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.585 2.568a.5.5 0 0 1 .226.58L8.677 6.832h1.99a.5.5 0 0 1 .364.843l-5.334 5.667a.5.5 0 0 1-.842-.49L5.99 9.167H4a.5.5 0 0 1-.364-.843l5.333-5.667a.5.5 0 0 1 .616-.09z" />
                                                </svg>
                                                <br>
                                                <small>Boosters Quantity</small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="accordion" id="accordionExample" data-toggle-hover="true">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#accordion-{{ $plant->id }}" aria-expanded="true"
                                                aria-controls="accordion-{{ $plant->id }}">
                                                More Info
                                            </button>
                                        </h2>
                                        <div id="accordion-{{ $plant->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <table class="table table-sm border-bottom">
                                                    <tbody class="text-center">
                                                        <tr>
                                                            <td class="col-4">
                                                                @foreach ($plant->trains->where('type', 'Train') as $train)
                                                                    @if (!$loop->first && $loop->last)
                                                                        <br>
                                                                    @endif
                                                                    <span
                                                                        class="text-primary">{{ $train->polish_filters_type->name }}
                                                                        {{ $train->polish_filters_type->microns }}#
                                                                        microns
                                                                    </span>
                                                                @endforeach
                                                                <small>Polish Filters Types</small>
                                                            </td>

                                                            <td class="col-4">
                                                                @foreach ($plant->trains->where('type', 'Train') as $train)
                                                                    @if (!$loop->first && $loop->last)
                                                                        /
                                                                    @endif
                                                                    <span
                                                                        class="text-primary h3">{{ $train->polish_filters_quantity }}</span>
                                                                @endforeach
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-filter" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                                                </svg>
                                                                <br>
                                                                <small>Polish Filters</small>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="col-4">
                                                                @foreach ($plant->trains->where('type', 'Train') as $train)
                                                                    @if (!$loop->first && $loop->last)
                                                                    <span>ft²</span> /
                                                                    @endif
                                                                    <span
                                                                        class="text-primary h3">{{ $train->membrane_type->ft2 }}</span>
                                                                @endforeach
                                                                <span>ft²</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-layers-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z" />
                                                                    <path
                                                                        d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z" />
                                                                </svg>
                                                                <br>
                                                                <small>Membrane Active Areas</small>
                                                            </td>

                                                            <td class="col-4">
                                                                @foreach ($plant->trains->where('type', 'Train') as $train)
                                                                    @if (!$loop->first && $loop->last)
                                                                        /
                                                                    @endif
                                                                    <span
                                                                        class="text-primary h3">{{ $train->membrane_elements }}</span>
                                                                @endforeach
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-x-diamond-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M9.05.435c-.58-.58-1.52-.58-2.1 0L4.047 3.339 8 7.293l3.954-3.954L9.049.435zm3.61 3.611L8.708 8l3.954 3.954 2.904-2.905c.58-.58.58-1.519 0-2.098l-2.904-2.905zm-.706 8.614L8 8.708l-3.954 3.954 2.905 2.904c.58.58 1.519.58 2.098 0l2.905-2.904zm-8.614-.706L7.292 8 3.339 4.046.435 6.951c-.58.58-.58 1.519 0 2.098l2.904 2.905z" />
                                                                </svg>
                                                                <br>
                                                                <small>Membrane Quantity</small>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-group col-12 my-1" role="group">
                                <button wire:click="checkForParameters({{ $plant->id }})"
                                    class="btn col-6 btn-success d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                    <strong class="ms-1">Parameters</strong>
                                </button>

                                <a href="{{ route('companies.services.plants.parameters.show', [$company, $service, $plant->id, $plant->id]) }}"
                                    class="btn col-6 btn-primary d-flex justify-content-center align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                    <strong class="ms-1">View</strong>
                                </a>
                            </div>

                            <div class="table-responsive rounded">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Operator</th>
                                            <th scope="col">Manager</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>
                                                <i class="fas fa-hard-hat"></i>{{ $plant->Operator->name }} <br>
                                                <i
                                                    class="fas fa-phone-square-alt"></i>{{ $plant->Operator->phone_1 }}
                                            </td>

                                            <td>
                                                @if ($plant->Manager)
                                                    <i class="fas fa-user-circle"></i>{{ $plant->Manager->name }}
                                                    <br>
                                                    <i
                                                        class="fas fa-phone-square-alt"></i>{{ $plant->Manager->phone_1 }}
                                                @else
                                                    <span class="text-danger">N/A</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer">
                            <p class="card-subtitle mb-2 text-muted text-capitalize">Last Parameters:
                                @if ($plant->product_waters->first())
                                    <span
                                        class="text-primary">{{ $plant->product_waters->first()->created_at }}</span>
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
                <div class="text-center text-danger">
                    <span class="display-4">NO DATA</span>
                </div>
            @endforelse
        </div>
    </section>
</div>

@section('livewire-js')
    <script>
        Livewire.on('alertExistParameters', plantId => {
            Swal.fire({
                title: "Today's parameters have already been recorded",
                text: "Do you want to upload backward parameters?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, upload!',
                cancelButtonText: 'NO',
                backdrop: true,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    let company = @json($company);
                    let service = @json($service);

                    window.location.replace("http://platform-cws.test/companies/" +
                        company + "/services/" + service + "/plants/" + plantId +
                        "/parameters/create/?oldParameters");
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
        });
    </script>
@endsection
