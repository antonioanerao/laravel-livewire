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

    <table class="table">
        <thead>
            <tr>
                <td>Name</td>
                <td>Desc</td>
            </tr>
        </thead>

        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                </tr>
            @empty
                <tr>
                    Nothing to show
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $products->links() }}
</div>
