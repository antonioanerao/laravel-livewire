<div>
    <div class="card mt-2 mb-2">
        <div class="card-body">
            <div class="card-title">
                <h4>Create a product</h4>
            </div>

            <form method="POST" wire:submit.prevent="store">
                <div class="form-group"
                     x-data="{ isUploading: false, progress: 0 }"
                     x-on:livewire-upload-start="isUploading = true"
                     x-on:livewire-upload-finish="isUploading = false"
                     x-on:livewire-upload-error="isUploading = false"
                     x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <label class="required" for="photo">Photo</label>

                    @if($photo)
                        Photo Preview:
                        <img src="{{ $photo->temporaryUrl() }}">
                    @endif

                    <input wire:model.defer="photo" type="file"
                           class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" >

                    <div wire:loading wire:target="photo">
                        <progress min="1" max="100" x-bind:value="progress"></progress>
                    </div>

                    @if($errors->has('photo'))
                        <div class="invalid-feedback">{{ $errors->first('photo') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required" for="name">Name</label>
                    <input id="name" wire:model.defer="product.name" class="form-control {{ $errors->has('product.name') ? 'is-invalid' : '' }}">

                    @if($errors->has('product.name'))
                        <div class="invalid-feedback">{{ $errors->first('product.name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required" for="description">Description</label>
                    <input id="description" wire:model.defer="product.description" class="form-control {{ $errors->has('product.description') ? 'is-invalid' : '' }}">
                    @if($errors->has('product.description'))
                        <div class="invalid-feedback">{{ $errors->first('product.description') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required" for="category_id">Category</label>
                    <select multiple wire:model="productCategories" id="category_id" class="form-control {{ $errors->has('productCategories') ? 'is-invalid' : '' }}">
                        <option value="">Pick a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('productCategories'))
                        <div class="invalid-feedback">{{ $errors->first('productCategories') }}</div>
                    @endif
                </div>

                <div class="form-group mt-1">
                    <label class="required" for="color">Color</label>
                    @foreach(\App\Models\Product::COLOR_LIST as $key => $value)
                        <input id="color" wire:model="product.color" type="radio" value="{{ $key }}"
                            class="{{ $errors->has('product.color') ? 'is-invalid' : '' }}">
                        {{ $value }}
                    @endforeach
                    @if($errors->has('product.color'))
                        <div class="invalid-feedback">{{ $errors->first('product.color') }}</div>
                    @endif
                </div>

                <div class="form-group mt-1">
                    <label class="required" for="in_stock">In Stock</label>
                    <input wire:model="product.in_stock" id="in_stock" type="checkbox" value="1"
                            class="{{ $errors->has('product.in_stock') ? 'is-invalid' : '' }}">
                    @if($errors->has('product.in_stock'))
                        <div class="invalid-feedback">{{ $errors->first('product.in_stock') }}</div>
                    @endif
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-info">
                        {{ request()->route()->uri() == 'product/{product}/edit' ? 'Update' : 'Create' }}
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
