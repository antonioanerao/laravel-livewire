<div>
    <div class="card mt-2 mb-2">
        <div class="card-body">
            <div class="card-title">
                <h4>Create a product</h4>
            </div>

            <form method="POST" wire:submit.prevent="store">
                <div class="form-group">
                    <label classs="required" for="name">Name</label>
                    <input id="name" wire:model.defer="product.name" class="form-control {{ $errors->has('product.name') ? 'is-invalid' : '' }}">

                    @if($errors->has('product.name'))
                        <div class="invalid-feedback">{{ $errors->first('product.name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label classs="required" for="description">Description</label>
                    <input id="description" wire:model.defer="product.description" class="form-control {{ $errors->has('product.description') ? 'is-invalid' : '' }}">
                    @if($errors->has('product.description'))
                        <div class="invalid-feedback">{{ $errors->first('product.description') }}</div>
                    @endif
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
            </form>

        </div>
    </div>
</div>
