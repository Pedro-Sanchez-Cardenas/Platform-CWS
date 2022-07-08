<div x-clock>
    <form wire:submit.prevent="store">
        <div class="overflow-x h-100">
            <section class="row row-cols-2">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Plant image</h4>
                        </div>

                        <div class="card-body">
                            <div class="input-group ">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        @if (isset($plant['cover']))
                                            <span>Photo Preview:</span>
                                            <img class="img-fluid mb-2" src="{{ $plant['cover']->temporaryUrl() }}">
                                        @endif

                                        <input type="file" wire:model="plant.cover" class="form-control">

                                        @error('plant.cover')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Plant HandBooks</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-group">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <input type="file" multiple class="form-control" accept=".pdf"
                                            wire:model="plant.handbooks">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="card">
                <div class="card-header">
                    <h4 class="card-title">Plant Data</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-5 mb-2">
                            <label for="name" class="form-label">Plant name</label>
                            <div class="input-group">
                                <span class="input-group-text @error('plant.name') border-danger @enderror">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                                        <path
                                            d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                        <path fill-rule="evenodd"
                                            d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z" />
                                    </svg>
                                </span>
                                <input type="text"
                                    class="form-control @error('plant.name') is-invalid border-danger @enderror"
                                    id="name" wire:model="plant.name" placeholder="Plant Name...">
                            </div>
                            @error('plant.name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="col-md-6 col-sm-7">
                            <label for="location" class="form-label">Location</label>
                            <div class="input-group">
                                <span class="input-group-text @error('plant.location') border-danger @enderror"
                                    id="Locationicon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor"
                                        class="bi bi-geo-alt @error('plant.location') text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>
                                </span>
                                <input type="text"
                                    class="form-control @error('plant.location') is-invalid border-danger @enderror"
                                    wire:model="plant.location" id="location" placeholder="Plant location...">
                            </div>
                            @error('plant.location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md mb-2">
                            <label for="plant.type" class="form-label">Type</label>
                            <div class="input-group">
                                <span class="input-group-text @error('plant.type') border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor"
                                        class="bi bi-stickies @error('plant.type') text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                                        <path
                                            d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                                    </svg>
                                </span>
                                <select class="form-select @error('plant.type') is-invalid border-danger @enderror"
                                    wire:model="plant.type" id="plant.type">
                                    <option value="">SELECT TYPE</option>
                                    @foreach ($plantTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('plant.type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md mb-2">
                            <label for="plant.country" class="form-label">Country</label>
                            <div class="input-group">
                                <span class="input-group-text @error('plant.country') border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor"
                                        class="bi bi-file-text @error('plant.country') text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                        <path
                                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                    </svg>
                                </span>
                                <select class="form-select @error('plant.country') is-invalid border-danger @enderror"
                                    wire:model="plant.country" id="plant.country">
                                    <option value="">SELECT COUNTRY</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('plant.country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md mb-2">
                            <label for="plant.currency" class="form-label">Currency</label>
                            <div class="input-group">
                                <span class="input-group-text @error('plant.currency') border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor"
                                        class="bi bi-currency-exchange @error('plant.currency') text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" />
                                    </svg>
                                </span>
                                <select
                                    class="form-select @error('plant.currency') is-invalid border-danger @enderror"
                                    wire:model="plant.currency" id="plant.currency">
                                    <option value="">SELECT CURRENCY</option>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}">{{ $currency->name }} -
                                            {{ $currency->abbreviation }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('plant.currency')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md mb-2">
                            <label for="plant.company" class="form-label">Company</label>
                            <div class="input-group">
                                <span class="input-group-text @error('plant.company') border-danger @enderror"
                                    id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor"
                                        class="bi bi-house-door @error('plant.company') text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                                    </svg>
                                </span>
                                <select class="form-select @error('plant.company') is-invalid border-danger @enderror"
                                    wire:model="plant.company">
                                    <option value="">SELECT MANAGER</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}
                                            ({{ $company->country->name }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('plant.company')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md mb-2">
                            <label for="plant.operator" class="form-label">Operador</label>
                            <div class="input-group">
                                <span class="input-group-text @error('plant.operator') border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg>
                                </span>
                                <select
                                    class="form-select @error('plant.operator') is-invalid border-danger @enderror"
                                    wire:model="plant.operator" id="plant.operator">
                                    <option value="">SELECT OPERATOR</option>
                                    @foreach ($attendants as $attendant)
                                        <option value="{{ $attendant->id }}">{{ $attendant->name }} -
                                            {{ $attendant->company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('plant.operator')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md mb-2">
                            <label for="plant.manager" class="form-label">Manager</label>
                            <div class="input-group">
                                <span class="input-group-text @error('plant.manager') border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor"
                                        class="bi bi-person-circle @error('plant.manager') text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                </span>
                                <select class="form-select @error('plant.manager') is-invalid border-danger @enderror"
                                    wire:model="plant.manager" id="plant.manager">
                                    <option value="">NO MANAGER</option>
                                    @foreach ($managers as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }} -
                                            {{ $manager->company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('plant.manager')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </section>

            <section class="row match-height">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Contract</h4>
                        </div>

                        <div class="card-body" x-data="getYears()">
                            <div class="row">
                                <div class="col-6">
                                    <label for="contract.client" class="form-label">Client</label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error('contract.client') border-danger @enderror"
                                            id="basic-addon-search1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                <path
                                                    d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                                            </svg>
                                        </span>
                                        <select
                                            class="form-select @error('contract.client') is-invalid border-danger @enderror"
                                            wire:model="contract.client">
                                            <option value="">SELECT CLIENT</option>
                                        </select>
                                    </div>
                                    <span class="text-primary">* This field can be left empty</span>
                                    @error('contract.client')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="contract.yearsOfContract" class="form-label">Years of contract</label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error('contract.yearsOfContract') border-danger @enderror"
                                            id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-calendar-check @error('contract.yearsOfContract') text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </span>
                                        <select
                                            class="form-select @error('contract.yearsOfContract') is-invalid border-danger @enderror"
                                            wire:model="contract.yearsOfContract" x-model="yearsOfContract"
                                            @change="calculate()">
                                            <option value="">SELECT YEARS</option>
                                            @for ($i = 1; $i < 17; $i++)
                                                <option value="{{ $i }}">{{ $i }} Years
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    @error('contract.yearsOfContract')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label class="form-label" for="from">From</label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error('contract.from') border-danger @enderror">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-calendar-range" viewBox="0 0 16 16">
                                                <path
                                                    d="M9 7a1 1 0 0 1 1-1h5v2h-5a1 1 0 0 1-1-1zM1 9h4a1 1 0 0 1 0 2H1V9z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </span>
                                        <input type="text" id="from" wire:model="contract.from"
                                            x-model="from" @input="calculate()" autocomplete="off"
                                            class="form-control flatpickr-basic @error('contract.from') is-invalid border-danger @enderror"
                                            placeholder="YYYY-MM-DD" />
                                    </div>
                                    @error('contract.from')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="Till" class="form-label">Till</label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error('contract.till') border-danger @enderror">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-calendar-range" viewBox="0 0 16 16">
                                                <path
                                                    d="M9 7a1 1 0 0 1 1-1h5v2h-5a1 1 0 0 1-1-1zM1 9h4a1 1 0 0 1 0 2H1V9z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control" wire:model="contract.till"
                                            x-model="till" placeholder="YYYY-MM-DD" disabled>
                                    </div>
                                    @error('contract.till')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">
                                    <label for="contract.billingDay" class="form-label">Billing Day</label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error('contract.billingDay') border-danger @enderror"
                                            id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-calendar-event @error('contract.billingDay') text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </span>
                                        <select
                                            class="form-select @error('contract.billingDay') is-invalid border-danger @enderror"
                                            id="billingDay" wire:model="contract.billingDay">
                                            <option value="">SELECT BILLING DAY</option>
                                            @for ($i = 1; $i < 32; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    @error('contract.billingDay')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="contract.paymentType" class="form-label">Payment Type</label>
                                    <div class="input-group">
                                        <span
                                            class="input-group-text @error('contract.paymentType') border-danger @enderror"
                                            id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-calendar-week @error('contract.paymentType') text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"
                                                    class="@error('contract.paymentType') border-danger @enderror" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </span>
                                        <select
                                            class="form-select @error('contract.paymentType') is-invalid border-danger @enderror"
                                            wire:model="contract.paymentType">
                                            <option value="">SELECT PAYMENT TYPE</option>
                                            @foreach ($paymentTypes as $paymentType)
                                                <option value="{{ $paymentType->id }}">
                                                    {{ $paymentType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('contract.paymentType')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="contract.minimumConsumption" class="form-label">Minimum
                                    Consumption</label>
                                <div class="input-group input-group-merge">
                                    <span
                                        class="input-group-text @error('contract.minimumConsumption') border-danger @enderror">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            class="@error('contract.minimumConsumption') text-danger @enderror"
                                            height="16" fill="currentColor" class="bi bi-wallet"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                        </svg>
                                    </span>
                                    <input type="text"
                                        class="form-control px-1 @error('contract.minimumConsumption') is-invalid border-danger @enderror"
                                        placeholder="0.00" wire:model="contract.minimumConsumption">
                                    <span
                                        class="input-group-text @error('contract.minimumConsumption') text-danger @enderror">M3/MONTH</span>
                                </div>
                                @error('contract.minimumConsumption')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label class="text-primary">*This field can be left empty</label>
                            </div>

                            <label for="contract.observations" class="form-label">Observations</label>
                            <div class="input-group">
                                <span class="input-group-text @error('contract.observations') border-danger @enderror"
                                    id="basic-addon-search1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-chat-right-quote" viewBox="0 0 16 16">
                                        <path
                                            d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
                                        <path
                                            d="M7.066 4.76A1.665 1.665 0 0 0 4 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z" />
                                    </svg>
                                </span>
                                <textarea class="form-control" style="resize: none;" wire:model='contract.observations' cols="10"
                                    rows="4"></textarea>
                            </div>
                            <span class="text-primary">* This field can be left empty</span>
                            @error('contract.observations')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card" x-data="costs()">
                        <div class="card-header">
                            <h4 class="card-title">Costs</h4>
                        </div>

                        <div class="card-body">
                            <div class="mb-1 row">
                                <label for="colFormLabel"
                                    class="col-sm-3 col-form-label @error('costs.botM3') text-danger @enderror">BOT
                                    (M3)</label>
                                <div class="col-md mb-2">
                                    <!-- Custom checkbox -->
                                    <div
                                        class="input-group input-group-merge @error('costs.botM3') border border-danger rounded @enderror">
                                        <span class="input-group-text">
                                            <div class="form-check">
                                                <input type="radio" @change="changed('bot')" x-model="botServices"
                                                    value="bot" class="form-check-input">
                                            </div>
                                        </span>
                                        <input type="text" x-mask:dynamic="$money($input)" id="bot" disabled
                                            wire:model="costs.botM3" wire:ignore.self x-model="val_1"
                                            class="form-control ps-1" placeholder="0.00" @input="sumM3()">
                                        <span
                                            class="input-group-text @error('costs.botM3') text-danger @enderror">USD/M3</span>
                                    </div>
                                    @error('costs.botM3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-1 row">
                                <label for="colFormLabel"
                                    class="col-sm-3 col-form-label @error('costs.botFixed') text-danger @enderror">BOT
                                    (Fixed)</label>
                                <div class="col-md mb-2">
                                    <!-- Custom checkbox -->
                                    <div
                                        class="input-group input-group-merge @error('costs.botFixed') border border-danger rounded @enderror">
                                        <span class="input-group-text">
                                            <div class="form-check">
                                                <input type="radio" @change="changed('bot')" x-model="botServices"
                                                    value="botFixed" class="form-check-input">
                                            </div>
                                        </span>
                                        <input type="text" x-mask:dynamic="$money($input)" id="botFixed" disabled
                                            wire:model="costs.botFixed" wire:ignore.self x-model="val_2"
                                            class="form-control ps-1" @input="sumMonth()" placeholder="0.00">
                                        <span
                                            class="input-group-text @error('costs.botFixed') text-danger @enderror">USD/Month</span>
                                    </div>
                                    @error('costs.botFixed')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="colFormLabel"
                                    class="col-sm-3 col-form-label @error('costs.oymM3') text-danger @enderror">O&M
                                    (m3)</label>
                                <div class="col-md mb-2">
                                    <!-- Custom checkbox -->
                                    <div
                                        class="input-group input-group-merge @error('costs.oymM3') border border-danger rounded @enderror">
                                        <span class="input-group-text">
                                            <div class="form-check">
                                                <input type="radio" @change="changed('oym')" x-model="oymServices"
                                                    value="o&m" class="form-check-input">
                                            </div>
                                        </span>
                                        <input type="text" x-mask:dynamic="$money($input)" id="o&m" disabled
                                            wire:model="costs.oymM3" wire:ignore.self x-model="val_3"
                                            class="form-control ps-1" @input="sumM3()" placeholder="0.00">
                                        <span
                                            class="input-group-text @error('costs.oymM3') text-danger @enderror">USD/M3</span>
                                    </div>
                                    @error('costs.oymM3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="colFormLabel"
                                    class="col-sm-3 col-form-label @error('costs.oymFixed') text-danger @enderror">O&M
                                    (Fixed)</label>
                                <div class="col-md mb-2">
                                    <!-- Custom checkbox -->
                                    <div
                                        class="input-group input-group-merge @error('costs.oymFixed') border border-danger rounded @enderror">
                                        <span class="input-group-text">
                                            <div class="form-check">
                                                <input type="radio" @change="changed('oym')" x-model="oymServices"
                                                    value="o&mFixed" class="form-check-input">
                                            </div>
                                        </span>
                                        <input type="text" x-mask:dynamic="$money($input)" id="o&mFixed" disabled
                                            wire:model="costs.oymFixed" wire:ignore.self x-model="val_4"
                                            class="form-control ps-1" @input="sumMonth()" placeholder="0.00">
                                        <span
                                            class="input-group-text @error('costs.oymFixed') text-danger @enderror">USD/Month</span>
                                    </div>
                                    @error('costs.oymFixed')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label for="colFormLabel"
                                    class="col-sm-3 col-form-label @error('costs.remineralisation') text-danger @enderror">Remineralisation
                                    (m3)</label>
                                <div class="col-md">
                                    <!-- Custom checkbox -->
                                    <div
                                        class="input-group input-group-merge @error('costs.remineralisation') border border-danger rounded @enderror">
                                        <span class="input-group-text">
                                            <div class="form-check">
                                                <input type="checkbox" @change="changed()" x-model="remineralisation"
                                                    class="form-check-input">
                                            </div>
                                        </span>
                                        <input type="text" x-mask:dynamic="$money($input)" id="remineralisation"
                                            disabled wire:model="costs.remineralisation" wire:ignore.self
                                            x-model="val_5" class="form-control ps-1" @input="sumM3()"
                                            placeholder="0.00">
                                        <span
                                            class="input-group-text @error('costs.remineralisation') text-danger @enderror">USD/M3</span>
                                    </div>
                                    @error('costs.remineralisation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Total USD/M3: $<span class="text-danger" wire:model="costs.totalM3"
                                                    x-text="sumM3"></span></th>
                                            <th>Total USD/Month: $<span class="text-danger"
                                                    wire:model='costs.totalMonth' x-text="sumMonth"></span>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="row match-height">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Plant Customization</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row mb-2">
                                        <label class="form-label">Cisterns Quantity</label>
                                        <div class="input-group ">
                                            <span
                                                class="input-group-text @error('personalisations.cisterns') border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-moisture @error('personalisations.cisterns') text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.5 0a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V7.5h-1.5a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V15h-1.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V.5a.5.5 0 0 0-.5-.5h-2zM7 1.5l.364-.343a.5.5 0 0 0-.728 0l-.002.002-.006.007-.022.023-.08.088a28.458 28.458 0 0 0-1.274 1.517c-.769.983-1.714 2.325-2.385 3.727C2.368 7.564 2 8.682 2 9.733 2 12.614 4.212 15 7 15s5-2.386 5-5.267c0-1.05-.368-2.169-.867-3.212-.671-1.402-1.616-2.744-2.385-3.727a28.458 28.458 0 0 0-1.354-1.605l-.022-.023-.006-.007-.002-.001L7 1.5zm0 0-.364-.343L7 1.5zm-.016.766L7 2.247l.016.019c.24.274.572.667.944 1.144.611.781 1.32 1.776 1.901 2.827H4.14c.58-1.051 1.29-2.046 1.9-2.827.373-.477.706-.87.945-1.144zM3 9.733c0-.755.244-1.612.638-2.496h6.724c.395.884.638 1.741.638 2.496C11 12.117 9.182 14 7 14s-4-1.883-4-4.267z" />
                                                </svg>
                                            </span>
                                            <input type="text" x-mask:dynamic="$money($input)"
                                                class="form-control @error('personalisations.cisterns') is-invalid border-danger @enderror"
                                                wire:model='personalisations.cisterns' placeholder="0">
                                        </div>
                                        @error('personalisations.cisterns')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="irrigation"
                                            wire:model="personalisations.irrigation">
                                        <label class="form-check-label" for="irrigation">Irrigation</label>
                                    </div>

                                    <br>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="wellPump"
                                            wire:model.lazy="personalisations.wellPump">
                                        <label class="form-check-label" for="wellPump">Well Pump</label>
                                    </div>

                                    <br>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="feedPump"
                                            wire:model.lazy="personalisations.feedPump">
                                        <label class="form-check-label" for="feedPump">Feed Pump</label>
                                    </div>

                                    <br>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="customSwitch1"
                                            wire:model.lazy="personalisations.chloride">
                                        <label class="form-check-label" for="customSwitch1">Chloride</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    @if ($boosters > 0)
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="booster_flow"
                                                wire:model.lazy="personalisations.booster_flow">
                                            <label class="form-check-label" for="booster_flow">Booster
                                                Flow</label>
                                        </div>

                                        <br>
                                    @endif

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="sdi"
                                            wire:model.lazy="personalisations.sdi">
                                        <label class="form-check-label" for="sdi">SDI</label>
                                    </div>

                                    <br>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="feed_flow"
                                            wire:model.lazy="personalisations.feed_flow">
                                        <label class="form-check-label" for="feed_flow">Feed Flow</label>
                                    </div>

                                    <br>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="permeate_flow"
                                            wire:model.lazy="personalisations.permeate_flow">
                                        <label class="form-check-label" for="permeate_flow">Permeate Flow</label>
                                    </div>

                                    <br>

                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="reject_flow"
                                            wire:model.lazy="personalisations.reject_flow">
                                        <label class="form-check-label" for="reject_flow">Reject Flow</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div wire:loading wire:target='trains'>
                        <div class="card d-flex justify-content-center align-items-center height-550">
                            <span class="spinner-border text-danger spinner-border-sm" role="status" aria-hidden="true"></span>
                            <br>
                            <strong class="text-danger">Loading...</strong>
                        </div>
                    </div>

                    <div class="card height-550" wire:loading.remove wire:target='trains'>
                        <div class="d-flex justify-content-between align-items-end mt-2 mx-1">
                            <h4>Trains</h4>

                            <div class="bg-primary text-white p-1 rounded">
                                <span>Trains: {{ $trains }}</span>
                            </div>
                        </div>

                        <div class="card-body overflow-auto">
                            @for ($i = 0; $i < $trains; $i++)
                                <section class="d-flex justify-content-between align-items-end mb-1">
                                    <strong class="text-primary">Train: {{ $i + 1 }}</strong>
                                    <button type="button" wire:click="removeTrain" class="btn btn-sm btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </button>
                                </section>
                                <livewire:plants.create-trains :wire:key='$i'>
                            @endfor
                        </div>

                        <div class="card-footer">
                            <button type="button" wire:click="addTrain" class="btn btn-sm btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                                <span>Add Train</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <div class="me-lg-4">
                <button type="submit" class="btn btn-success col-12 waves-effect waves-float waves-light">
                    <div class="d-flex justify-content-center align-items-center font-weight-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg>
                        <span>CREATE PLANT</span>
                    </div>
                </button>
            </div>
        </div>
    </form>
    @push('jsLivewire')
        <script>
            function getYears() {
                return {
                    yearsOfContract: null,
                    from: null,
                    till: null,
                    calculate() {
                        if (this.yearsOfContract != null && this.from != null) {
                            this.till = moment(this.from).add(this.yearsOfContract, "years").format('Y-MM-D')
                        }
                    }
                }
            }

            function costs() {
                return {
                    botServices: null,
                    oymServices: null,
                    remineralisation: null,
                    val_1: null,
                    val_2: null,
                    val_3: null,
                    val_4: null,
                    val_5: null,
                    changed(type) {
                        if (type === "bot") {
                            let input1 = document.getElementById('bot');
                            let input2 = document.getElementById('botFixed');

                            if (this.botServices === "bot") {
                                input1.disabled = false;
                                input2.disabled = true;
                            } else if (this.botServices === "botFixed") {
                                input1.disabled = true;
                                input2.disabled = false;
                            }

                            if (this.val_1 != null) {
                                this.val_2 = this.val_1;
                                this.val_1 = null;
                            } else if (this.val_2 != null) {
                                this.val_1 = this.val_2;
                                this.val_2 = null;
                            }
                        } else if (type === "oym") {
                            let input3 = document.getElementById('o&m');
                            let input4 = document.getElementById('o&mFixed');

                            if (this.oymServices === "o&m") {
                                input3.disabled = false;
                                input4.disabled = true;
                            } else if (this.oymServices === "o&mFixed") {
                                input3.disabled = true;
                                input4.disabled = false;
                            }

                            if (this.val_4 != null) {
                                this.val_3 = this.val_4;
                                this.val_4 = null;
                            } else if (this.val_3 != null) {
                                this.val_4 = this.val_3;
                                this.val_3 = null;
                            }
                        } else if (this.remineralisation != null) {
                            let input = document.getElementById('remineralisation');
                            if (this.remineralisation === true) {
                                input.disabled = false;
                            } else if (this.remineralisation === false) {
                                this.val_5 = null;
                                input.disabled = true;
                            }
                        }
                    },
                    sumM3() {
                        return parseFloat(Number(this.val_1) + Number(this.val_3) + Number(this.val_5)).toFixed(3);
                    },
                    sumMonth() {
                        return parseFloat(Number(this.val_2) + Number(this.val_4)).toFixed(3);
                    }
                }
            }
        </script>
    @endpush
</div>
