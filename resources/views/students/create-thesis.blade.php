@extends('layouts.app')
@section('title')
    اضافة اطروحة
@endsection
@section('content')
    <div class="row">
        <!-- Small table -->
        @isset($thesis->id)
            <div class="card border-danger mb-3 w-50 text-center mx-auto" style="">
                <div class="card-header"><i class="fa-solid fa-circle-info text-primary" style="font-size: 80px"></i></div>
                <div class="card-body text-scundarry">
                    <h5 class="card-title">لقد قمت باضافة اطروحة مسبقا </h5>
                    <p class="card-text">
                        لقد قمت باضافة اطروحة مسبقا {{ $thesis->title_thesis }} والاطروحة الان في حالة @if ($thesis->status == 0)
                            انتظار الموافقة
                        @else
                            قيد العمل
                        @endif
                        يمكنك تعديل المشروف او العنوان من الاماكن المخصصه لها .
                    </p>
                </div>
            </div>
        @else
            <div class="col-md-12 my-4">
                <h2 class="page-title">صفحة اضافة اطروحة</h2>
                <div class="card-deck">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">اضافة اطروحة</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('theses.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">عنوان الاطروحة باللغة العربية</label>
                                        <input type="text" class="form-control @error('title_thesis') is-invalid @enderror"
                                            name="title_thesis" value="{{ old('title_thesis') }}" id="inputEmail4">
                                    </div>
                                    @error('title_thesis')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">عنوان الاطروحة باللغة الانجليزية</label>
                                    <input type="text" class="form-control @error('en_title') is-invalid @enderror"
                                        name="en_title" value="{{ old('en_title') }}" id="inputEmail4">

                                    @error('en_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputState">اختار المشرف الاول</label>
                                        <select id="inputState" name="staff1" required class="form-control">
                                            <option value="">Choose...</option>
                                            @foreach ($staff as $item)
                                                <option @selected(old('staff1') == $item->id) value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('staff1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="inputState">اختار المشرف الثاني</label>
                                    <select id="inputState" name="staff2" class="form-control">
                                        <option value="">Choose...</option>
                                        @foreach ($staff as $item)
                                            <option @selected(old('staff2') == $item->id) value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('staff2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- / .card-desk-->
            </div> <!-- customized table -->
        @endisset
    </div> <!-- end section -->
@endsection
