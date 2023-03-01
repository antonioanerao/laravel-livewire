<div>
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
