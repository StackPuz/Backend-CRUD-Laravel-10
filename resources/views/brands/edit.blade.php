@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="post" action="/brands/{{$brand->id}}?ref={{urlencode($ref)}}">
                @method("PATCH")
                @csrf
                <div class="row">
                    <input type="hidden" id="brand_id" name="id" value="{{old('id', $brand->id)}}" />
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="brand_name">Name</label>
                        <input id="brand_name" name="name" class="form-control form-control-sm" value="{{old('name', $brand->name)}}" required maxlength="50" />
                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="col-12">
                        <a class="btn btn-sm btn-secondary" href="{{$ref}}">Cancel</a>
                        <button class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    initPage(true)
</script>
@endsection