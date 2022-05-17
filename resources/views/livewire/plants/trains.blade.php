<div>
    <section id="trains">
        <div class="card" x-data="trains()" x-cloak>
            <div class="card-header">
                <h3 class="card-title">Trains</h3>
            </div>

            <div x-text="$wire.trainIndex"></div>

            <div class="card-body">
                <template x-for="(list, index) in trains">
                    <div class="row p-1 m-1 border rounded" wire:key="trainIndex">
                        <div class="row">
                            <div>
                                <h5>Train #<span x-text="index+1"></span></h5>
                            </div>

                            <div class="col-md mb-2">
                                <label :for="list.id" class="form-label">Capacity</label>
                                <div class="input-group input-group-merge">
                                    <span
                                        class="input-group-text @error('trains.capacity') border border-danger @enderror">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-moisture" viewBox="0 0 16 16">
                                            <path
                                                d="M13.5 0a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V7.5h-1.5a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V15h-1.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V.5a.5.5 0 0 0-.5-.5h-2zM7 1.5l.364-.343a.5.5 0 0 0-.728 0l-.002.002-.006.007-.022.023-.08.088a28.458 28.458 0 0 0-1.274 1.517c-.769.983-1.714 2.325-2.385 3.727C2.368 7.564 2 8.682 2 9.733 2 12.614 4.212 15 7 15s5-2.386 5-5.267c0-1.05-.368-2.169-.867-3.212-.671-1.402-1.616-2.744-2.385-3.727a28.458 28.458 0 0 0-1.354-1.605l-.022-.023-.006-.007-.002-.001L7 1.5zm0 0-.364-.343L7 1.5zm-.016.766L7 2.247l.016.019c.24.274.572.667.944 1.144.611.781 1.32 1.776 1.901 2.827H4.14c.58-1.051 1.29-2.046 1.9-2.827.373-.477.706-.87.945-1.144zM3 9.733c0-.755.244-1.612.638-2.496h6.724c.395.884.638 1.741.638 2.496C11 12.117 9.182 14 7 14s-4-1.883-4-4.267z" />
                                        </svg>
                                    </span>
                                    <input type="number"
                                        class="form-control @error('trains.capacity') border border-danger @enderror"
                                        wire:model="trains.capacity" placeholder="0.00 m3">
                                </div>
                                @error('trains.capacity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label :for="'trains.tds-' + index" class="form-label">TDS</label>
                                <div class="input-group input-group-merge">
                                    <span
                                        class="input-group-text @error('trainTds') border border-danger @enderror"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                            <path
                                                d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"
                                                class="@error('trainTds') text-danger @enderror" />
                                        </svg></span>
                                    <input type="number" wire:model="trainTds"
                                        class="form-control @error('trainTds') border border-danger @enderror"
                                        :for="'trains.tds-' + index" placeholder="0.00"
                                        aria-label="Amount (to the nearest dollar)">
                                    <span class="input-group-text">ppm</span>
                                </div>
                                @error('trainTds')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label for="trainBooster" class="form-label">Booster
                                    &
                                    PX</label>
                                <div class="input-group">
                                    <span class="input-group-text @error('trainBooster') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor"
                                            class="bi bi-speedometer @error('trainBooster') text-danger @enderror"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                            <path fill-rule="evenodd"
                                                d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z" />
                                        </svg>
                                    </span>
                                    <select class="form-select @error('trainBooster') border border-danger @enderror"
                                        id="trainBooster" wire:model="trainBooster">
                                        <option value="">0</option>
                                        @for ($i = 1; $i < 7; $i++)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                @error('trainBooster')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="meabrane" class="form-label">#Membrane
                                    elements</label>
                                <div class="input-group input-group-merge mb-2">
                                    <span
                                        class="input-group-text  @error('trainsElements') border border-danger @enderror"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                                            <path
                                                d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"
                                                class="@error('trainsElements') text-danger @enderror" />
                                        </svg></span>
                                    <input type="number"
                                        class="form-control @error('trainsElements') border border-danger @enderror"
                                        wire:model.lazy="trainsElements" placeholder="0.00"
                                        aria-label="Amount (to the nearest dollar)" id="meabrane">
                                </div>
                                @error('trainsElements')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="membranesActiveArea" class="form-label">Membrane
                                    active area
                                </label>
                                <div class="input-group mb-2">
                                    <span
                                        class="input-group-text @error('membranesActiveAre') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-bullseye" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                                            <path
                                                d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"
                                                class="@error('membranesActiveAre') text-danger @enderror" />
                                            <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg>
                                    </span>
                                    <select
                                        class="form-select @error('membranesActiveAre') border border-danger @enderror"
                                        id="trains.mArea" wire:model.lazy="membranesActiveAre">
                                        <option value="">SELECT TYPE</option>
                                        @foreach ($membranesActiveArea as $ActiveArea)
                                            <option value="{{ $ActiveArea->id }}">
                                                {{ $ActiveArea->ft2 }} Ft2
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('membranesActiveAre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md mb-2">
                                <label for="multimediaFilsters" class="form-label">Multimedia
                                    Filters</label>
                                <div class="input-group ">
                                    <span
                                        class="input-group-text @error('multimediaFilsters') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                                                class=" @error('multimediaFilsters') text-danger @enderror" />
                                        </svg>
                                    </span>
                                    <select
                                        class="form-select @error('multimediaFilsters') border border-danger @enderror"
                                        id="multimediaFilsters" wire:model.lazy="multimediaFilsters">
                                        <option value="">SELECT</option>
                                        @for ($i = 1; $i < 7; $i++)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                @error('multimediaFilsters')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label for="polishFilters" class="form-label">Polish
                                    Filters
                                    Type</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text  @error('polishFilters') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
                                                class="@error('polishFilters') text-danger @enderror" />
                                        </svg>
                                    </span>
                                    <select class="form-select @error('polishFilters') border border-danger @enderror"
                                        id="polishFilters" wire:model.lazy="polishFilters">
                                        <option value="">SELECT TYPE</option>
                                        @foreach ($polishFilterTypes as $PolishFilterType)
                                            <option value="{{ $PolishFilterType->id }}">
                                                {{ $PolishFilterType->microns }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('polishFilters')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label for="polishQuantity" class="form-label">Polish
                                    Filters
                                    quantity</label>
                                <div class="input-group">
                                    <span
                                        class="input-group-text  @error('polishQuantity') border border-danger @enderror"
                                        id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                                                class="@error('polishQuantity') text-danger @enderror" />
                                        </svg>
                                    </span>
                                    <select class="form-select @error('polishQuantity') border border-danger @enderror"
                                        id="polishQuantity" wire:model.lazy="polishQuantity">
                                        <option value="">SELECT QUANTITY</option>
                                        @for ($i = 1; $i < 7; $i++)
                                            <option value="{{ $i }}">
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                @error('polishQuantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-2 my-2">
                                <button class="btn col-12 btn-outline-danger text-nowrap px-1" @click="remove()"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>

                <hr>

                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-icon btn-primary" type="button" @click="add()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                            </svg>
                            <span>Add Train</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
