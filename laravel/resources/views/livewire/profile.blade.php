<div class="card">
    <div class="card-header">{{ __('Dashboard') }}</div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if($success['status'])
            <div class="alert alert-success">
                {{ $success['msg'] }}
            </div>
        @endif

        <form method="POST" wire:submit.prevent="updateProfile">
            <div class="form-group">
                <label classs="required" for="name">Name</label>
                <input id="name" wire:model="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label classs="required" for="email">E-mail</label>
                <input id="email" wire:model="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>

    </div>
</div>
