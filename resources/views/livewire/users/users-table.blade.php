<div>

    <head>
        <div class="d-flex justify-content-between align-items-center">
            <div class="w-25">
                <label class="form" for="">Search:</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </span>
                    <input type="search" wire:model="search" class="form-control" placeholder="Search..."
                        aria-label="Company Name..." aria-describedby="basic-addon-search2">
                </div>
            </div>
            <div style="position: relative; left: -2%;">
                <livewire:users.form-users>
            </div>
        </div>
    </head>

    <section class="d-flex justify-content align-items mt-1 mb-2">
        <div wire:loading='query' wira:target="query">
            <span class="spinner-border text-danger"></span>
        </div>

        <table wire:loading.remove wire:target="query" class="table">
            <thead class="text-center">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Actions</th>
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
                            {{ $user->company->name }}
                        </td>

                        <td>
                            <div class="dropdown">
                                <button type="button"
                                    class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light"
                                    data-bs-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#edit" wire:click='edit({{ $user->id }})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit-2 me-50">s
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg>
                                        <span>Edit</span>
                                    </a>
                                    <a class="dropdown-item" href="#"
                                        wire:click="$emit('deleteUser',{{ $user->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash me-50">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                        </svg>
                                        <span>Delete</span>
                                    </a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" wire:click='show({{ $user->id }})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-circlev viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                        <span>View user</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal text-start" wire:ignore.self id="edit" tabindex="-1"
            aria-labelledby="myModalLabel17" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">edit users</font>
                            </font>
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Cerca"></button>
                    </div>
                    <form wire:submit.prevent="update">
                        <div class="modal-body">
                            <font style="vertical-align: inherit;">
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label for="name1" class="form-label">name</label>
                                        <div class="input-group">
                                            <span class="input-group-text @error('name') border-danger @enderror">
                                                <svg xmlns="http://www.w3.org/2000/svg" widplantNameth="14"
                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-search @error('name') text-danger @enderror">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65"
                                                        y2="16.65"></line>
                                                </svg>
                                            </span>
                                            <input type="text"
                                                class="form-control @error('name') border-danger @enderror"
                                                id="name1" wire:model='name' placeholder="User name">
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="name" class="form-label">Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text @error('phone_1') border-danger @enderror">
                                                <svg xmlns="http://www.w3.org/2000/svg" widplantNameth="14"
                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-search @error('phone_1') text-danger @enderror">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65"
                                                        y2="16.65"></line>
                                                </svg>
                                            </span>
                                            <input type="number"
                                                class="form-control @error('phone_1') border-danger @enderror"
                                                id="phone" wire:model="phone_1" placeholder="Phone 1...">
                                        </div>
                                        @error('phone_1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="phone" class="form-label">Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text @error('phone_2') border-danger @enderror">
                                                <svg xmlns="http://www.w3.org/2000/svg" widplantNameth="14"
                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-search @error('phone_2') text-danger @enderror">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65"
                                                        y2="16.65"></line>
                                                </svg>
                                            </span>
                                            <input type="number"
                                                class="form-control @error('phone_2') border-danger @enderror"
                                                id="phone" wire:model="phone_2" placeholder="Phone 2...">
                                        </div>
                                        @error('phone_2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="name" class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text @error('email') border-danger @enderror">
                                                <svg xmlns="http://www.w3.org/2000/svg" widplantNameth="14"
                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-search @error('email') text-danger @enderror">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65"
                                                        y2="16.65"></line>
                                                </svg>
                                            </span>
                                            <input type="email"
                                                class="form-control @error('email') border-danger @enderror"
                                                id="email" wire:model="email" placeholder="email...">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="companies" class="form-label">company</label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-text @error('companies_id') border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-person-fill @error('companies_id') text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                </svg>
                                            </span>
                                            <select
                                                class="form-select  @error('companies_id') border-danger @enderror"
                                                wire:model="companies_id" id="companies">
                                                <option value="">SELECT OPERATOR</option>
                                                @foreach ($company as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('companies_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md mb-2">
                                        <label for="" class="form-label">Rol</label>
                                        <div class="input-group">
                                            <span class="input-group-text @error('role') border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-person-fill @error('role') text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                </svg>
                                            </span>
                                            <select class="form-select @error('role') border-danger @enderror"
                                                wire:model="role" id="rol">
                                                <option value="">Select rol</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('role')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md mb-2">
                                        <label for="service" class="form-label">service</label>
                                        <div class="input-group">
                                            <span class="input-group-text @error('service') border-danger @enderror"
                                                id="basic-addon-search1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor"
                                                    class="bi bi-person-fill @error('service') text-danger @enderror"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                </svg>
                                            </span>
                                            <select class="form-select @error('service') border-danger @enderror"
                                                wire:model="service" id="service">
                                                <option value="">Select service</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('service')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                class="btn btn-outline-danger"data-bs-dismiss="modal">Reset</button>
                            <button type="button"
                                class="btn btn-outline-primary"data-bs-dismiss="modal"wire:click="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="position-absolute bottom-0 end-0">{{ $users->links() }}</div>
    @push('livewire-js')
        <script src="sweetalert2.all.min.js"></script>
        <script>
            Livewire.on('deleteUser', userId => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.delete(userId)
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        </script>

        <script src="sweetalert2.all.min.js"></script>
        <script>
            Livewire.on('success-alert2', postId => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        </script>
    @endpush
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="info-container">
                 {{--}}   @foreach ($users as $user) {{--}}
                    <ul class="list-unstyled">
                        <li class="mb-25">
                            <span class="fw-bolder me-25">FullName:</span>
                            <span>{{ $user->name }}</span>
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25"> Email:</span>
                            <span> {{ $user->email }} </span>
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25">Phone 1:</span>
                            <span class="badge bg-light-success"> {{ $user->phone_1 }} </span>
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25">Phone 2:</span>
                            <span> {{ $user->phone2 }} </span>
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25">Company</span>
                            <span>{{ $user->company->name }} </span>
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25">Role:</span>
                            <span>{{ $user->getRoleNames()->first() }}</span>
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25">service:</span>
                            <span></span>
                        </li>
                        <li class="mb-75">
                            <span class="fw-bolder me-25">create_at:</span>
                            <span>{{ $user->created_at->toDateString() }}</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center pt-2">

                        <button class="btn btn-outline-primary waves-effect" type="button" data-bs-dismiss="modal">
                            Cerrar</button>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
