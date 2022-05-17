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
                    <input type="text" wire:model="search" class="form-control" placeholder="Company name..."
                        aria-label="Company Name..." aria-describedby="basic-addon-search2">
                </div>
            </div>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createCompany">Add
                Company</button>
        </div>
    </head>

    <section class="d-flex justify-content-center align-items-center mt-1">
        <div wire:loading='query'>
            <span class="spinner-border text-danger"></span>
        </div>

        @if (isset($companies))
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
                    @foreach ($companies as $company)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $company->name }}
                            </td>

                            <td>
                                {{ $company->created_at }}
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

    <div class="float-end">{{ $companies->links() }}</div>
</div>

{{-- Modals --}}
@include('livewire.company.extras.modals.createCompany')
{{-- Modals End --}}
