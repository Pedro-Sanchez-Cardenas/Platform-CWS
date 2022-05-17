<div>

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
                    <input type="search" wire:model="search" class="form-control"
                        placeholder="Reverse Osmosis Types name..." aria-label="Reverse Osmosis Types Name..."
                        aria-describedby="basic-addon-search2">
                </div>
            </div>

            <button type="button" class="btn btn-icon btn-success" data-bs-toggle="modal"
                data-bs-target="#createCompany">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
                <span>Add Reverse Osmosis Types</span>
            </button>
        </div>
    </head>

    <section class="d-flex justify-content-center align-items-center mt-1">
        <div wire:loading='query'>
            <span class="spinner-border text-danger"></span>
        </div>

        @if (isset($reverse_osmosis_types))
            <table wire:loading.remove class="table">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>NAME</th>
                        <th>CREATED AT</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    @foreach ($reverse_osmosis_types as $type)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $type->name }}
                            </td>

                            <td>
                                {{ $type->created_at }}
                            </td>

                            <td>
                                <!-- TODO: Agregar acciones en companies module -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span class="display-2">NO DATA</span>
        @endif
    </section>

    {{-- <div class="float-end">{{ $reverse_osmosis_types->links() }}</div> --}}
</div>

{{-- Modals --}}

{{-- Modals End --}}
