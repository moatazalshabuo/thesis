@extends('layouts.app')

@section('title')
    التقييم السري
@endsection
@section('content')
    @if (Auth::id() != $secret->staff)
        @if ($secret->status)
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>تقييم الاطروحة</h4>
                            <p>{{ Helper::thname($secret->theses_id) }}</p>
                            <p>{{ Helper::username($secret->staff) }}</p>
                        </div>
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $secret->rate }}%;" aria-valuenow="{{ $secret->rate }}"
                                    aria-valuemin="0" aria-valuemax="100">{{ $secret->rate }}%</div>
                            </div>
                            <p class="lead">
                                {{ $secret->message }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card border-danger mb-3 w-50 text-center mx-auto" style="">
                <div class="card-header"><i class="fa-solid fa-circle-info text-primary" style="font-size: 80px"></i></div>
                <div class="card-body text-scundarry">
                    <h5 class="card-title">لم يتم التقييم بعد </h5>
                </div>
            </div>
        @endif
    @else
        @isset($discussion->file)
            @php

                $extension = pathinfo($discussion->file, PATHINFO_EXTENSION);

            @endphp
            <div class="row">
                <div class="col-md-7">
                    <a class="btn btn-primary m-3" href="{{ URL::asset($discussion->file) }}">تنزيل الملف </a>
                    <object data="{{ URL::asset($discussion->file) }}" width="100%" height="650px"
                        @if ($extension == 'pdf') type="application/pdf"
            @elseif($extension == 'docx' || $extension == 'doc')
            type="application/msword" @endif>
                        {{-- <a href="{{ URL::asset($discussion->file) }}" class="btn btn-warning">يمكن تحميل الملف من هنا</a> --}}
                    </object>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('secret.update', $secret->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">التقيم</label>
                                    <input type="range" class="form-range" value="{{ $secret->rate }}" min="0"
                                        name="rate" max="100" oninput="this.nextElementSibling.value = this.value">
                                    <output>{{ $secret->rate }}</output>
                                </div>
                                <div class="form-group">
                                    <label>ملاحظات</label>
                                    <textarea name="message" class="form-control">{{ $secret->message }}</textarea>
                                </div>
                                <input type="submit" value="حفظ">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card border-danger mb-3 w-50 text-center mx-auto" style="">
                <div class="card-header"><i class="fa-solid fa-circle-info text-primary" style="font-size: 80px"></i></div>
                <div class="card-body text-scundarry">
                    <h5 class="card-title">لم يتم اضافة ملف للاطروحة بعد </h5>
                </div>
            </div>
        @endisset
    @endif
@endsection
