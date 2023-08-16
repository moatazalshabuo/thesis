@extends('layouts.app')

@section('title')
    {{ $discussion->thesis->title_thesis }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 m-3">
            <h4 class="text-white ">{{ $discussion->thesis->title_thesis }}</h4>
        </div>
        @php

            $extension = pathinfo($discussion->file, PATHINFO_EXTENSION);

        @endphp
        <div class="col-md-7">
            <a class="btn btn-primary m-3" href="{{ URL::asset($discussion->file) }}">تنزيل الملف </a>
            <object data="{{ URL::asset($discussion->file) }}"
                width="100%"
                height="650px"
                @if ($extension == 'pdf')
                type="application/pdf"
                @elseif($extension == 'docx' || $extension == 'doc')
                type="application/msword"
                @endif
                >
                {{-- <a href="{{ URL::asset($discussion->file) }}" class="btn btn-warning">يمكن تحميل الملف من هنا</a> --}}
            </object>
        </div>
        <div class="col-md-5 card">
            <div class="card-header">
                <h5 class="card-title">الملاحظات</h5><span >{{ count($discussion->messages) }}</span>
            </div>
            <div class="card-body" style="height: 400px;overflow-y:scroll">
                @foreach ($discussion->messages()->orderBy('created_at', 'desc')->get() as $item)
                <div class="card bg-primary text-white p-2 m-2" >
                    <span class="badge badge-light bg-white text-dark" style="font-size:10px"> <i class="fa fa-user"></i> <small>{{$item->created_by}}</small></span>
                    <p style="font-size:12px">{{ $item->message }}</p>
                </div>
                @endforeach
            </div>
            <div class="card-footer">
                <form action="{{ route('message.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea rows="6" class="form-control" name="message"></textarea>
                        <input type="hidden" name="disc_id" value="{{ $discussion->id }}">
                    </div>
                    <input type="submit" class="btn btn-primary" value="ارسال">
                </form>
            </div>
        </div>
    </div>
@endsection
