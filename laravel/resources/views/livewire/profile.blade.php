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
                <input id="name" wire:model.defer="user.name" wire:keydown="checkFields" class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }}">
                <button type="button" class="mt-2 btn btn-primary btn-sm" wire:click="$toggle('showHelp')">Show Help </button>
                @if($showHelp)
                    <div class="alert alert-info mb-2 mt-3">
                        bla bla bla
                    </div>
                @endif

                @if($errors->has('user.name'))
                    <div class="invalid-feedback">{{ $errors->first('user.name') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label classs="required" for="email">E-mail</label>
                <input id="email" wire:model.defer="user.email" wire:keydown="checkFields" class="form-control {{ $errors->has('user.email') ? 'is-invalid' : '' }}">
                @if($errors->has('user.email'))
                    <div class="invalid-feedback">{{ $errors->first('user.email') }}</div>
                @endif
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>

    </div>
</div>
