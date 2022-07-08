<div>
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
                                        <label for="password" class="form-label">password</label>
                                        <div class="input-group">
                                            <span class="input-group-text @error('password') border-danger @enderror">
                                                <svg xmlns="http://www.w3.org/2000/svg" widplantNameth="14"
                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-search @error('password') text-danger @enderror">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65"
                                                        y2="16.65"></line>
                                                </svg>
                                            </span>
                                            <input type="password"
                                                class="form-control @error('password') border-danger @enderror"
                                                id="password" wire:model="password" placeholder="password...">
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md mb-2">
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
                            <button class="btn btn-success"wire:click="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
             @push('livewire-js')
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
