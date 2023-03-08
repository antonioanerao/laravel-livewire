<div>

    <div class="card mt-2 mb-2">
        <div class="card-body">
            <div class="col-md-4">
                <label>Search a product by name</label> <img wire:loading width="8%" src="{{ asset('loading-gif.gif') }}">
                <div class="form-group">
                    <input wire:model="searchQuery" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('product.create') }}">
        <button type="button" class="btn btn-primary mb-2 mt-2">Create Product</button>
    </a>

    <table class="table">

        <thead>
            <tr>
                <td>Image</td>
                <td>Name</td>
                <td>Desc</td>
                <td>Category</td>
                <td>#</td>
            </tr>
        </thead>

        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        @if($product->photo)
                            <img src="/storage/{{ $product->photo }}" width="50" alt="{{ $product->name }}">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @foreach($product->category as $category)
                            {{ $category->name }} {{ $loop->last ? '' : '/'  }}
                        @endforeach
                    </td>
                    <td>

                    <a href="{{ route('product.edit', $product->id) }}">
                        <button type="button" class="btn btn-warning">
                            Edit
                        </button>
                    </a>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $product->id }}">
                        Delete
                    </button>

                    <div class="modal fade" id="delete-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="delete-{{ $product->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="delete-{{ $product->id }} Label">Delete product?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete the product called {{ $product->name }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button wire:click="deleteProduct({{ $product->id }})" data-dismiss="modal" type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </td>
                </tr>
            @empty
                <tr>
                    Nothing to show
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $products->links() }}

    @section('js')
            <script>
                window.livewire.on('productDeleted', function() {
                Swal.fire({
                    title: 'Product deleted',
                    text: 'You have deleted a product',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })
            });
            </script>
    @endsection
</div>

