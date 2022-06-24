
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" wire:model='name'>
        @error('name') <span>{{ $message }}</span> @enderror
    </div>
    
    <div class="form-group">
        <label>Email</label>
        <textarea class="form-control" wire:model='email'></textarea>
        @error('email') <span>{{ $message }}</span> @enderror
    </div>
    
    <div class="form-group">
        <label>phone</label>
        <input type="number" class="form-control" wire:model='phone_1'>
        @error('phone_1') <span>{{ $message }}</span> @enderror
    </div>
    
    <div class="form-group">
        <label>Precio</label>
        <input type="number" class="form-control" wire:model='phone_2' step=".01">
        @error('phone_2') <span>{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label>password</label>
        <input type="text" class="form-control" wire:model='password' step=".01">
        @error('passsword') <span>{{ $message }}</span> @enderror
    </div>
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
                wire:model="companies_id">
                <option value="">SELECT MANAGER</option>
                @foreach ($users as $user)
                    <option value="{{ $user->companies_id }}">{{ $user->companies_id }}</option>
                @endforeach
            </select>
        </div>
        @error('plants.company')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <span class="select2 select2-container select2-container--default select2-container--focus" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select2-basic-container"><span class="select2-selection__rendered" id="select2-select2-basic-container" role="textbox" aria-readonly="true" title="Alaska">Alaska</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    <button class="btn btn-success" wire:click='save'>Crear producto</button>
