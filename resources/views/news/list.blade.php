@extends('layouts.base')
@php
    use App\Support\ShopEnum;

    $route = empty($shop_id) ? route('show-create-news') : route('show-create-news', $shop_id);
@endphp
@section('content')
    <div class="block block-themed block-rounded">
        <div class="block-header block-header-default">
            <form method="GET" action="{{ route('news') }}">
                <h3 class="card-header text-center">News</h3>
                    <div class="block-options">
                        <a class="btn btn-sm btn-primary" href="{{$route}}">New</a>
                        <button type="submit" class="btn btn-sm btn-primary">Apply</button>
                    </div>

                @if ($errors->has('message'))
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                @endif
                <select class="form-control" name="shop_id">
                    @foreach(ShopEnum::NAMES as $value => $name)
                        <option value="{{ $value }}"> {{ $name }} </option>
                    @endforeach
                </select>
            <form>
        </div>
        <div class="block-content block-content-full">
            <table id="newslist" class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Headline</th>
                    <th>Shop</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $value)
                    <tr>
                        <td> {{ $value['updated_at'] }}</td>
                        <td> {{ $value['title'] }}</td>
                        <td> {{ShopEnum::NAMES[$value['shop_id']]}} </td>
                        <td><a class="btn btn-sm btn-secondary" href="">
                                <i class="fa fa-fw fa-trash"></i></a>
                            <a class="btn btn-sm btn-secondary" href="{{route('news-detail', ['id' => $value['id'] ])}}">
                                <i class="fa fa-fw fa-pencil"></i></a></td>
                    </tr>
                @endforeach
                    </tbody>
            </table>
        </div>
    </div>

@endsection

