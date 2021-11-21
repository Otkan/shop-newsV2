@extends('layouts.base')

@section('content')
    <form id="form-detail" method="POST" action="{{route('save-detail', $news->id)}}">
        @csrf
        <div class="block block-themed block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit news</h3>
            </div>
            <div class="block-options">
                {{--<button type="submit" class="btn btn-sm btn-primary">Save</button>--}}
            </div>
            <div class="block-content block-content-full block-content-form">
                <div class="mb-15">
                    <p class="font-weight-bold mb-0">News date</p>
                    <input id="updated_at" type="text" name="news_date" value="{{ $news->updated_at}}" class="form-control" placeholder="Date" max="{{ date('Y-m-d') }}" disabled>
                </div>
                <div class="mb-15">
                    <p class="font-weight-bold mb-0">Headline</p>
                    <input name="title" type="text" class="form-control" value="{{$news->title}}">
                </div>
                <div class="mb-15">
                    <p class="font-weight-bold mb-0">Text</p>
                    <textarea name="text" class="form-control min-height-100">{{$news->text}}</textarea>
                </div>
            </div>
        </div>
    </form>
@endsection
