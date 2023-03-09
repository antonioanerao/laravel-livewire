<div class="card-body">
    <form action="{{ route('dropdowns.submit') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="country" class="col-md-4 col-form-label text-md-right">Countries</label>

            <div class="col-md-6">
                <select wire:model="country" name="country" class="form-control">
                    <option value="">--choose country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">Cities</label>

            <div class="col-md-6">
                <select wire:model="city" name="city" class="form-control">
                    @if($cities->count() === 0)
                        <option value="">--choose a country first</option>
                    @endif
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
</div>
