<div>

    <head>
        <div class="d-flex justify-content-between align-items-center">
            <div class="w-25">
                <label class="form" for="">Search:</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="Search">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="14" height="14"
                             viewBox="0 0 24 24" fill="none"
                             stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round"
                             class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </span>
                    <input type="search" wire:model="search" class="form-control" placeholder="Company name..."
                           aria-label="Company Name..." aria-describedby="basic-addon-search2">
                </div>
            </div>

            <button type="button" class="btn btn-icon btn-success" data-bs-toggle="modal"
                    data-bs-target="#createCompany">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                <span>Add Services</span>
            </button>
        </div>
    </head>

    <section class="d-flex justify-content-center align-items-center mt-1">
        <div wire:loading='query'>
            <span class="spinner-border text-danger"></span>
        </div>

       {{--}} @if (isset($users)) {{--}}
            <table wire:loading.remove class="table">
                <thead class="text-center">
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>SERVICE</th>
                    <th>ROL</th>
                    <th>CREATED AT</th>
                    <th>ACTIONS</th>
                </tr>
                </thead>

                <tbody class="text-center">
                @foreach ($users as $user)
                    <tr>

                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->phone_1 }}
                        </td>

                        <td>
                            {{ $user->created_at }}
                        </td>
                        <td>
                            {{ $user->created_at }}
                        </td>
                        <td>
                            {{ $user->created_at }}
                        </td>

                        <td>
                            <div class="dropdown">
                              <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#" wire:click='edit({{ $user->id }})'>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 me-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                  <span>Edit</span>
                                </a>
                                <a class="dropdown-item" href="#" wire:click='destroy({{ $user->id }})'>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                  <span>Delete</span>
                                </a>
                              </div>
                            </div>
                          </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </section>
    <div class="container">
        @include("livewire.$view");
    </div>

</div>
