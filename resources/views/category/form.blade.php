<form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
    @csrf
    @if(isset($category))
        {{ method_field('PATCH') }}
    @endif

    <div class="form-group row">
        <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ isset($category) ? $category->name : old('name') }}">
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-4 col-form-label text-md-right">{{ __('Description') }}</label>
        <div class="col-md-6">
            <textarea id="email" type="email" class="form-control" name="description">{{ isset($category) ? $category->description : old('description') }}</textarea>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Submit') }}
            </button>
        </div>
    </div>
</form>
