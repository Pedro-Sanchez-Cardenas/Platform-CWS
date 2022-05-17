<div>
    <form wire:submit.prevent="store">
        <section>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Plant image</h4>
                        </div>
                        <div class="card-body mb-1">
                            <div class="input-group ">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <input type="file" wire:model="plants.plants_cover" class="form-control"
                                            livewire-upload-progress accept="image/gif,image/jpeg,image/jpg,image/png"
                                            name="files[]" id="file">
                                        <br>
                                        @if ($plants_cover)
                                            <img width="545x" height="250" src="{{ $plants_cover->temporaryUrl() }}">
                                            <br><br>
                                            <input type="button" value="Delate image" class="col-md-12" />
                                        @endif
                                        @error('photo')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Multiple file</h4>
                        </div>
                        <div class="card-body" wire:ignore>
                            <div class="input-group">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <input type="file" name="files[]" id="inputFile" multiple class="form-control"
                                            accept=".pdf" wire:model="plants.multiplepdf">
                                        <br>
                                        <ul id="listaDeArchivos">
                                        </ul>
                                    </div>
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
                    <div class="col-md-6 mb-2">
                        <label for="name" class="form-label">Plant name</label>
                        <div class="input-group">
                            <span class="input-group-text @error('plants.name') border border-danger @enderror">
                                <svg xmlns="http://www.w3.org/2000/svg" widplantNameth="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-search @error('plants.name') text-danger @enderror">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </span>
                            <input type="text" class="form-control @error('plants.name') border border-danger @enderror"
                                id="name" wire:model="plants.name" placeholder="Plant Name...">
                        </div>
                        @error('plants.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="col-md-6">
                        <label for="location" class="form-label">Location</label>
                        <div class="input-group">
                            <span class="input-group-text @error('plants.location') border border-danger @enderror"
                                id="Locationicon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-geo-alt @error('plants.location') text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                            </span>
                            <input type="text"
                                class="form-control @error('plants.location') border border-danger @enderror"
                                wire:model="plants.location" id="location" placeholder="Plant location...">
                        </div>
                        @error('plants.location')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="col-md mb-2">
                        <label for="plants.type" class="form-label">Type</label>
                        <div class="input-group">
                            <span class="input-group-text @error('plants.type') border border-danger @enderror"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-stickies @error('plants.type') text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                                    <path
                                        d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                                </svg>
                            </span>
                            <select class="form-select @error('plants.type') border border-danger @enderror"
                                wire:model="plants.type" id="plants.type">
                                <option value="">SELECT TYPE</option>
                                @foreach ($plantTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('plants.type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label for="plants.country" class="form-label">Country</label>
                        <div class="input-group">
                            <span class="input-group-text @error('plants.country') border border-danger @enderror"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-file-text @error('plants.country') text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                </svg>
                            </span>
                            <select class="form-select @error('plants.country') border border-danger @enderror"
                                wire:model="plants.country" id="plants.country">
                                <option value="">SELECT COUNTRY</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('plants.country')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md mb-2">
                        <label for="plants.currency" class="form-label">Currency</label>
                        <div class="input-group">
                            <span class="input-group-text @error('plants.currency') border border-danger @enderror"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-currency-exchange @error('plants.currency') text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" />
                                </svg>
                            </span>
                            <select class="form-select @error('plants.currency') border border-danger @enderror"
                                wire:model="plants.currency" id="plants.currency">
                                <option value="">SELECT CORRENCY</option>
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }} -
                                        {{ $currency->abbreviation }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('plants.currency')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md mb-2">
                        <label for="plants.company" class="form-label">Company</label>
                        <div class="input-group">
                            <span class="input-group-text @error('plants.company') border border-danger @enderror"
                                id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor"
                                    class="bi bi-house-door @error('plants.company') text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                                </svg>
                            </span>
                            <select class="form-select @error('plants.company') border border-danger @enderror"
                                wire:model="plants.company">
                                <option value="">SELECT MANAGER</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('plants.company')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md mb-2">
                        <label for="plants.operator" class="form-label">Operador</label>
                        <div class="input-group">
                            <span class="input-group-text @error('plants.operator') border border-danger @enderror"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-fill @error('plants.operator') text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                            </span>
                            <select class="form-select @error('plants.operator') border border-danger @enderror"
                                wire:model="plants.operator" id="plants.operator">
                                <option value="">SELECT OPERATOR</option>
                                @foreach ($attendants as $attendant)
                                    <option value="{{ $attendant->id }}">{{ $attendant->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('plants.operator')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md mb-2">
                        <label for="plants.manager" class="form-label">Manager</label>
                        <div class="input-group">
                            <span class="input-group-text @error('plants.manager') border border-danger @enderror"
                                id="basic-addon-search1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-circle @error('plants.manager') text-danger @enderror"
                                    viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </span>
                            <select class="form-select @error('plants.manager') border border-danger @enderror"
                                wire:model="plants.manager" id="plants.manager">
                                <option value="">SELECT MANAGER</option>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('plants.manager')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-md-6">
                <div class="card" x-data="cisterns()" x-cloak>
                    <div class="d-flex justify-content-between align-items-center" wire:ignore>
                        <div class="card-header">
                            <h4 class="card-title">Cisterns</h4>
                        </div>
                        <div class="me-1">
                            Total cisterns: <span class="text-danger font-bold" x-text="cisterns.length"></span>
                        </div>
                    </div>
                    <div class="ms-2">
                        <button type="button" @click="add()"
                            class="btn btn-success waves-effect waves-float waves-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            Add Cistern
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="text-danger text-center" x-show="cisterns.length == 0">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                                    class="bi bi-basket-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z" />
                                </svg>
                            </div>
                            <span class="h5 text-danger">No cisterns</span>
                        </div>
                        <template x-for="(list, index) in cisterns">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="col-md-11">
                                    <label :for="index" class="form-label">
                                        Cisterns capacity #
                                        <span x-text="index+1"></span>
                                    </label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="plantNameicon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-moisture" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.5 0a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V7.5h-1.5a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V15h-1.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V.5a.5.5 0 0 0-.5-.5h-2zM7 1.5l.364-.343a.5.5 0 0 0-.728 0l-.002.002-.006.007-.022.023-.08.088a28.458 28.458 0 0 0-1.274 1.517c-.769.983-1.714 2.325-2.385 3.727C2.368 7.564 2 8.682 2 9.733 2 12.614 4.212 15 7 15s5-2.386 5-5.267c0-1.05-.368-2.169-.867-3.212-.671-1.402-1.616-2.744-2.385-3.727a28.458 28.458 0 0 0-1.354-1.605l-.022-.023-.006-.007-.002-.001L7 1.5zm0 0-.364-.343L7 1.5zm-.016.766L7 2.247l.016.019c.24.274.572.667.944 1.144.611.781 1.32 1.776 1.901 2.827H4.14c.58-1.051 1.29-2.046 1.9-2.827.373-.477.706-.87.945-1.144zM3 9.733c0-.755.244-1.612.638-2.496h6.724c.395.884.638 1.741.638 2.496C11 12.117 9.182 14 7 14s-4-1.883-4-4.267z" />
                                            </svg>
                                        </span>
                                        <input :id="index" type="text" step="0.01" class="form-control"
                                            placeholder="0.0 lt" :x-model="index" wire:model="cisterns.capacity">
                                    </div>
                                    @error('cisterns.capacity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col ms-1">
                                    <button type="button" class="btn btn-outline-danger" @click="remove()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="card-footer">
                        <p>The fields can be left empty, but it is necesary that they exist to add the
                            number of thaks.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Personalization</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="irrigation"
                                        wire:model="personalitations.irrigation">
                                    <label class="form-check-label" for="irrigation">Irrigation</label>
                                </div>

                                <br>

                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="wellPump"
                                        wire:model.lazy="personalitations.wellPump">
                                    <label class="form-check-label" for="wellPump">Well Pump</label>
                                </div>

                                <br>

                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="feedPump"
                                        wire:model.lazy="personalitations.feedPump">
                                    <label class="form-check-label" for="feedPump">Feed Pump</label>
                                </div>

                                <br>

                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="customSwitch1"
                                        wire:model.lazy="personalitations.chloride">
                                    <label class="form-check-label" for="customSwitch1">Chloride</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="sdi"
                                        wire:model.lazy="personalitations.sdi">
                                    <label class="form-check-label" for="sdi">SDI</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p>The fields can be left empty, but it is necesary that they exist to add the
                            number of thaks.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-md-6">
                <div class="card" x-data="costs()" x-cloak>
                    <div class="card-header">
                        <h4 class="card-title">Costs</h4>
                    </div>

                    <div class="card-body">
                        <div class="mb-1 row">
                            <label for="colFormLabel"
                                class="col-sm-3 col-form-label @error('botM3') text-danger @enderror">BOT (M3)</label>
                            <div class="col-md mb-2">
                                <!-- Custom checkbox -->
                                <div
                                    class="input-group input-group-merge @error('botM3') border border-danger rounded @enderror">
                                    <span class="input-group-text">
                                        <div class="form-check">
                                            <input type="radio" @click="action('bot1'), sumarM3(), sumarMonth()"
                                                name="bot" class="form-check-input">
                                        </div>
                                    </span>
                                    <input type="number" @keyup="sumarM3()" disabled wire:ignore wire:model="botM3"
                                        id="botM3" class="form-control ps-1" placeholder="0.00">
                                    <span class="input-group-text @error('botM3') text-danger @enderror">USD/M3</span>
                                </div>
                                @error('botM3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-1 row">
                            <label for="colFormLabel"
                                class="col-sm-3 col-form-label @error('botFixed') text-danger @enderror">BOT
                                (Fixed)</label>
                            <div class="col-md mb-2">
                                <!-- Custom checkbox -->
                                <div
                                    class="input-group input-group-merge @error('botFixed') border border-danger rounded @enderror">
                                    <span class="input-group-text">
                                        <div class="form-check">
                                            <input type="radio" @click="action('bot2'), sumarM3(), sumarMonth()"
                                                name="bot" class="form-check-input">
                                        </div>
                                    </span>
                                    <input type="number" @keyup="sumarMonth()" disabled wire:ignore
                                        wire:model="botFixed" id="botFixed" class="form-control ps-1"
                                        placeholder="0.00" aria-label="Amount (to the nearest dollar)">
                                    <span
                                        class="input-group-text @error('botFixed') text-danger @enderror">USD/Month</span>
                                </div>
                                @error('botFixed')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label for="colFormLabel"
                                class="col-sm-3 col-form-label @error('oymM3') text-danger @enderror">O&M (m3)</label>
                            <div class="col-md mb-2">
                                <!-- Custom checkbox -->
                                <div
                                    class="input-group input-group-merge @error('oymM3') border border-danger rounded @enderror">
                                    <span class="input-group-text">
                                        <div class="form-check">
                                            <input type="radio" @click="action('o&m1'), sumarM3(), sumarMonth()"
                                                name="o&m" class="form-check-input">
                                        </div>
                                    </span>
                                    <input type="number" @keyup="sumarM3()" disabled wire:ignore wire:model="oymM3"
                                        id="omM3" class="form-control ps-1" placeholder="0.00">
                                    <span class="input-group-text @error('oymM3') text-danger @enderror">USD/M3</span>
                                </div>
                                @error('oymM3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label for="colFormLabel"
                                class="col-sm-3 col-form-label @error('oymFixed') text-danger @enderror">O&M
                                (Fixed)</label>
                            <div class="col-md mb-2">
                                <!-- Custom checkbox -->
                                <div
                                    class="input-group input-group-merge @error('oymFixed') border border-danger rounded @enderror">
                                    <span class="input-group-text">
                                        <div class="form-check">
                                            <input type="radio" @click="action('o&m2'), sumarM3(), sumarMonth()"
                                                name="o&m" class="form-check-input">
                                        </div>
                                    </span>
                                    <input type="number" @keyup="sumarMonth()" disabled wire:ignore
                                        wire:model="oymFixed" id="omFixed" class="form-control ps-1"
                                        placeholder="0.00">
                                    <span
                                        class="input-group-text @error('oymFixed') text-danger @enderror">USD/Month</span>
                                </div>
                                @error('oymFixed')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label for="colFormLabel"
                                class="col-sm-3 col-form-label @error('remineralisationM3') text-danger @enderror">Remineralisation
                                (m3)</label>
                            <div class="col-md">
                                <!-- Custom checkbox -->
                                <div
                                    class="input-group input-group-merge @error('remineralisationM3') border border-danger rounded @enderror">
                                    <span class="input-group-text">
                                        <div class="form-check">
                                            <input type="checkbox" @click="action('remi'), sumarM3(), sumarMonth()"
                                                id="radioRemi" class="form-check-input">
                                        </div>
                                    </span>
                                    <input type="number" @keyup="sumarM3()" disabled wire:ignore
                                        wire:model="remineralisationM3" id="remi" class="form-control ps-1"
                                        placeholder="0.00">
                                    <span
                                        class="input-group-text @error('remineralisationM3') text-danger @enderror">USD/M3</span>
                                </div>
                                @error('remineralisationM3')
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
                                        <th>Total USD/M3: $<span class="text-danger" x-text="sumM3"></span></th>
                                        <th>Total USD/Month: $<span class="text-danger" x-text="sumMonth"></span>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contract</h4>
                    </div>

                    <div class="card-body">
                        <div class="row mb-2 ">
                            <label for="contract.yearsOfContract" class="form-label">Years of contract</label>
                            <div class="input-group ">
                                <span
                                    class="input-group-text @error('contract.yearsOfContract') border border-danger @enderror"
                                    id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor"
                                        class="bi bi-calendar-check @error('contract.yearsOfContract') text-danger @enderror"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                    </svg>
                                </span>
                                <select type="number" id="cmb_dias"
                                    class="form-select @error('contract.yearsOfContract') border border-danger @enderror"
                                    wire:model="contract.yearsOfContract" onchange="cmb_dias();">
                                    <option value="">SELECT YEARS</option>
                                    @for ($i = 1; $i < 17; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            @error('contract.yearsOfContract')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="form-label" for="from">From</label>
                                <input type="text" id="from" wire:model="contract.from" id="dt_fecha_nacimiento"
                                    class="form-control flatpickr-basic @error('contract.from') border border-danger @enderror"
                                    placeholder="YYYY-MM-DD" />
                                @error('contract.from')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label for="Till" class="form-label">Till</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error('contract.till') border border-danger @enderror">
                                        <svg xmlns="http://www.w3.org/2000/svg" widplantNameth="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search @error('contract.till') text-danger @enderror">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </span>
                                    <input type="text" id="dt_fecha_siguiente_etapa"
                                        class="form-control @error('contract.Till') border border-danger @enderror"
                                        wire:model="contract.till" for="dt_fecha_siguiente_etapa">
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
                                        class="input-group-text @error('contract.billingDay') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-calendar-event"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"
                                                class="@error('contract.billingDay') border border-danger @enderror" />
                                        </svg>
                                    </span>
                                    <select
                                        class="form-select @error('contract.billingDay') border border-danger @enderror"
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
                                <label for="contract.paymenttypes" class="form-label">paymenttypes</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error('paymenttypes') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor"
                                            class="bi bi-calendar-week @error('paymenttypes') text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"
                                                @error('contract.billingPeriod') border border-danger @enderror" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                    </span>
                                    <select
                                        class="form-select @error('contract.paymenttypes') border border-danger @enderror"
                                        id="contract.paymenttypes" wire:model="contract.paymenttypes">
                                        <option value="">payment types</option>
                                        <option value="1">Weekly</option>
                                        <option value="2">Quarterly</option>
                                        <option value="3">Monthly</option>
                                        <option value="3">Biweekly</option>
                                        <option value="3">Bimonthly</option>
                                        <option value="4">Biannual</option>

                                    </select>
                                </div>
                                @error('contract.billingPeriod')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="contract.minimumConsumption" class="form-label">Minimum Consumption</label>
                            <div class="input-group input-group-merge">
                                <span
                                    class="input-group-text @error('contract.minimumConsumption') border border-danger @enderror"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                        class="@error('contract.minimumConsumption') text-danger @enderror"
                                        height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                        <path
                                            d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                    </svg></span>
                                <input type="number"
                                    class="form-control px-1 @error('contract.minimumConsumption') border border-danger @enderror"
                                    placeholder="0.00" id="contract.minimumConsumption"
                                    wire:model="contract.minimumConsumption"
                                    aria-label="Amount (to the nearest dollar)">
                                <span
                                    class="input-group-text @error('contract.minimumConsumption') text-danger @enderror">M3/MONTH</span>
                            </div>
                            @error('contract.minimumConsumption')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <label>*This field can be left empty</label>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <livewire:operation.plants.trains />

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
    </form>

    @push('jsLivewire')
        <script>
            function cisterns() {
                return {
                    cisterns: [],
                    add() {
                        if (this.cisterns.length < 5) {
                            //Agregar nuevo form input
                            this.cisterns.push({
                                id: this.cisterns.length
                            });
                        } else {
                            alert("Cannot add more than 5 tanks");
                        }
                    },
                    remove() {
                        if (this.cisterns.length > 0) {
                            this.cisterns.pop();
                        }
                    }
                }
            }

            function costs() {
                return {
                    sumM3: 0,
                    sumMonth: 0,
                    action($type) {
                        switch ($type) {
                            case 'bot1':
                                // Deshabilitamos los campos
                                $("#botM3").prop('disabled', false);
                                $("#botFixed").prop('disabled', true);

                                // Cambiamos el valor de los campos con Livewire
                                @this.botM3 = @this.botFixed;
                                @this.botFixed = "";
                                break;

                            case 'bot2':
                                // Deshabilitamos los campos
                                $("#botM3").prop('disabled', true);
                                $("#botFixed").prop('disabled', false);

                                // Cambiamos el valor de los campos con Livewire
                                @this.botFixed = @this.botM3;
                                @this.botM3 = "";
                                break;

                            case 'o&m1':
                                // Deshabilitamos los campos
                                $("#omM3").prop('disabled', false);
                                $("#omFixed").prop('disabled', true);

                                // Cambiamos el valor de los campos con Livewire
                                @this.oymM3 = @this.oymFixed;
                                @this.oymFixed = "";
                                break;

                            case 'o&m2':
                                // Deshabilitamos los campos
                                $("#omM3").prop('disabled', true);
                                $("#omFixed").prop('disabled', false);

                                // Cambiamos el valor de los campos con Livewire
                                @this.oymFixed = @this.oymM3;
                                @this.oymM3 = "";
                                break;

                            case 'remi':
                                // Desabilitamos el campo
                                if ($("#radioRemi").prop('checked')) {
                                    $("#remi").prop('disabled', false);
                                } else {
                                    @this.remineralisationM3 = "";
                                    $("#remi").prop('disabled', true);
                                }
                                break;
                            default:
                                console.log("default");
                                break;
                        }
                    },
                    sumarM3() {
                        var v1 = $("#botM3").val() != "" ? $("#botM3").val() : 0;
                        var v2 = $("#omM3").val() != "" ? $("#omM3").val() : 0;
                        var v3 = $("#remi").val() != "" ? $("#remi").val() : 0;

                        this.sumM3 = parseFloat(v1) + parseFloat(v2) + parseFloat(v3);
                    },
                    sumarMonth() {
                        var v1 = $("#botFixed").val() != "" ? $("#botFixed").val() : 0;
                        var v2 = $("#omFixed").val() != "" ? $("#omFixed").val() : 0;

                        this.sumMonth = parseFloat(v1) + parseFloat(v2);
                    }
                }
            }

            function trains() {
                return {
                    trains: [{
                        id: this.trains.length,
                        value: null,
                        validation: null
                    }],
                    add() {
                        if (this.trains.length < 5) {
                            //Agregar nuevo form input
                            this.trains.push({
                                id: this.trains.length,
                                value: null,
                                validation: null
                            });
                        } else {
                            alert("Cannot add more than 5 trains");
                        }
                    },
                    remove() {
                        if (this.trains.length > 1) {
                            this.trains.pop();
                        } else {
                            alert("Cannot remove trains");
                        }
                    }
                }
            }
        </script>
    @endpush
</div>
{{-- Script cdn multiple file --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    var inputFile = $("#inputFile");
    var listaDeArchivos = $("#listaDeArchivos");
    var archivosParaSubir = [];

    function actualizarListaDeArchivos() {
        let listaHtml = archivosParaSubir.map(function(item, index) {
            return `<li>
      ${item.name} 
      <button data-index="${index}" class="file-list-eliminar">Eliminar</button>
    </li>`;
        });
        listaDeArchivos.html(listaHtml);
    }

    inputFile.on('change', function(e) {
        let files = e.target.files;

        if (files.length == 0) return;

        files = Array.from(files);
        archivosParaSubir = files;
        actualizarListaDeArchivos();
        $(this).val('');
    });

    $(document).on("click", ".file-list-eliminar", function() {
        let index = $(this).data('index');
        archivosParaSubir.splice(index, 1);
        actualizarListaDeArchivos();
    });
</script>



<button id="calcular">Calcular</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    //Al hacer click en el botón... (Debes cambiar esta acción en tu proyecto)
    $("#calcular").on("click", function() {
        //Obtener la fecha de nacimiento
        let fecha = $("#dt_fecha_nacimiento").val();
        //Obtener la cantidad de días
        let dias = $("#cmb_dias").val();
        //Calcular la sumatoria
        let fecha2 = moment(fecha).add(dias, 'years').format('DD/MM/YYYY');
        //Asignar la nueva fecha al input siguiente etapa
        $("#dt_fecha_siguiente_etapa").val(fecha2);
    });
</script>
