@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @livewire('product-create', ['product' => $product])
            </div>
        </div>
    </div>
@endsection
