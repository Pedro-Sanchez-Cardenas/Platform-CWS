<div>
    <div class="modal-size-lg d-inline-block">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary waves-effect" data-bs-toggle="modal" data-bs-target="#large">
            Create users</button>
        <!-- Modal -->
        <div class="modal fade text-start" wire:ignore.self id="large" tabindex="-1" aria-labelledby="myModalLabel17"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Create users</font>
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerca"></button>
                    </div>
                    <form wire:submit.prevent="save" name="create_users">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="nameform" class="form-label">Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text @error('name') border-danger @enderror">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-person-circle  @error('name') text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                            </svg>
                                        </span>
                                        <input type="text"
                                            class="form-control @error('name') border-danger @enderror" id="nameform"
                                            wire:model='name' placeholder="User name">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="phoneform" class="form-label">Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-text @error('phone_1') border-danger @enderror">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-phone-flip @error('phone_1') text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M11 1H5a1 1 0 0 0-1 1v6a.5.5 0 0 1-1 0V2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v6a.5.5 0 0 1-1 0V2a1 1 0 0 0-1-1Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-2a.5.5 0 0 0-1 0v2a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-2a.5.5 0 0 0-1 0v2ZM1.713 7.954a.5.5 0 1 0-.419-.908c-.347.16-.654.348-.882.57C.184 7.842 0 8.139 0 8.5c0 .546.408.94.823 1.201.44.278 1.043.51 1.745.696C3.978 10.773 5.898 11 8 11c.099 0 .197 0 .294-.002l-1.148 1.148a.5.5 0 0 0 .708.708l2-2a.5.5 0 0 0 0-.708l-2-2a.5.5 0 1 0-.708.708l1.145 1.144L8 10c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575C1.012 8.639 1 8.506 1 8.5c0-.003 0-.059.112-.17.115-.112.31-.242.6-.376Zm12.993-.908a.5.5 0 0 0-.419.908c.292.134.486.264.6.377.113.11.113.166.113.169 0 .003 0 .065-.13.187-.132.122-.352.26-.677.4-.645.28-1.596.523-2.763.687a.5.5 0 0 0 .14.99c1.212-.17 2.26-.43 3.02-.758.38-.164.713-.357.96-.587.246-.229.45-.537.45-.919 0-.362-.184-.66-.412-.883-.228-.223-.535-.411-.882-.571ZM7.5 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1Z" />
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
                                    <label for="phoneform" class="form-label">Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-text @error('phone_2') border-danger @enderror">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-phone-flip  @error('phone_2') border-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M11 1H5a1 1 0 0 0-1 1v6a.5.5 0 0 1-1 0V2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v6a.5.5 0 0 1-1 0V2a1 1 0 0 0-1-1Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-2a.5.5 0 0 0-1 0v2a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-2a.5.5 0 0 0-1 0v2ZM1.713 7.954a.5.5 0 1 0-.419-.908c-.347.16-.654.348-.882.57C.184 7.842 0 8.139 0 8.5c0 .546.408.94.823 1.201.44.278 1.043.51 1.745.696C3.978 10.773 5.898 11 8 11c.099 0 .197 0 .294-.002l-1.148 1.148a.5.5 0 0 0 .708.708l2-2a.5.5 0 0 0 0-.708l-2-2a.5.5 0 1 0-.708.708l1.145 1.144L8 10c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575C1.012 8.639 1 8.506 1 8.5c0-.003 0-.059.112-.17.115-.112.31-.242.6-.376Zm12.993-.908a.5.5 0 0 0-.419.908c.292.134.486.264.6.377.113.11.113.166.113.169 0 .003 0 .065-.13.187-.132.122-.352.26-.677.4-.645.28-1.596.523-2.763.687a.5.5 0 0 0 .14.99c1.212-.17 2.26-.43 3.02-.758.38-.164.713-.357.96-.587.246-.229.45-.537.45-.919 0-.362-.184-.66-.412-.883-.228-.223-.535-.411-.882-.571ZM7.5 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1Z" />
                                            </svg>
                                        </span>
                                        <input type="number"
                                            class="form-control @error('phone_2') border-danger @enderror"
                                            id="phoneform" wire:model="phone_2" placeholder="Phone 2...">
                                    </div>
                                    @error('phone_2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="emailform" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text @error('email') border-danger @enderror">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-envelope @error('email') text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                            </svg>
                                        </span>
                                        <input type="email"
                                            class="form-control @error('email') border-danger @enderror" id="emailform"
                                            wire:model="email" placeholder="email...">
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="passwordform" class="form-label">Password</label>
                                    <div class="input-group form-password-toggle">
                                        <input wire:model="password" type="password" class="form-control  @error('password') border-danger @enderror" id="basic-default-password"
                                            placeholder="Your Password" aria-describedby="basic-default-password">
                                        <span class="input-group-text cursor-pointer @error('password') border-danger @enderror"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-eye font-small-4 @error('password') text-danger @enderror">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg></span>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md mb-2">
                                    <label for="companiesform" class="form-label">Company</label>
                                    <div class="input-group">
                                        <span class="input-group-text @error('companies_id') border-danger @enderror"
                                            id="basic-addon-searchform">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-person-fill @error('companies_id') text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg>
                                        </span>
                                        <select class="form-select  @error('companies_id') border-danger @enderror"
                                            wire:model="companies_id" id="companiesfomr">
                                            <option value="">SELECT OPERATOR</option>
                                            @foreach ($company as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('companies_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md mb-2">
                                    <label for="rolfomr" class="form-label">Role</label>
                                    <div class="input-group">
                                        <span class="input-group-text @error('role') border-danger @enderror"
                                            id="basic-addon-searchfor">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-person-fill @error('role') text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg>
                                        </span>
                                        <select class="form-select @error('role') border-danger @enderror"
                                            wire:model="role" id="rolform">
                                            <option value="">SELECT ROLE</option>
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
                                    <label for="services_id" class="form-label">Service</label>
                                    <div class="input-group">
                                        <span class="input-group-text @error('services_id') border-danger @enderror"
                                            id="basic-addon-searcform">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor"
                                                class="bi bi-person-fill @error('services_id') text-danger @enderror"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg>
                                        </span>
                                        <select class="form-select @error('services_id') border-danger @enderror"
                                            wire:model="services_id" id="serviceform">
                                            <option value="">SELECT SERVICES</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('services_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger"data-bs-dismiss="modal">Reset</button>
                            <button id="save" class="btn btn-primary waves-effect waves-float waves-light"
                                type='submit'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('livewire-js')
        <script>
            Livewire.on('success-alert', postId => {
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
