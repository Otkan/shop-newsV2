@extends('layouts.base')

@section('content')
    <form id="form-detail" method="POST" action="{{route('create-news')}}">
        @csrf

        <div class="block block-themed block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">New news</h3>
            </div>
            <div class="block-options">
                <button type="submit" class="btn btn-sm btn-primary">Create</button>
            </div>
            <select class="form-control" name="shop_id">

            @foreach($shops as $value => $name)
                <option value="{{ $value }}"> {{ $name }} </option>
            @endforeach
            </select>
            <div class="block-content block-content-full block-content-form">
                <div class="mb-15">
                    <p class="font-weight-bold mb-0">Headline</p>
                    <input name="title" type="text" class="form-control">
                </div>
                <div class="mb-15">
                    <p class="font-weight-bold mb-0">Text</p>
                    <textarea name="text" class="form-control min-height-100"></textarea>
                </div>
            </div>
        </div>
    </form>
@endsection
