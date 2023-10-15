@extends('layouts.app')

@section('title')
    المقيم السري
@endsection
@section('content')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">تقييم الاطروحة</h2>
            <div class="card shadow">

                <div class="card-body">
                    <form method="POST" action="{{ route('secret.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputState">اختر الاطروحة</label>
                                <select id="inputState" name="theses" required class="form-control">
                                    <option value="">Choose...</option>
                                    @foreach ($theses as $val)
                                        <option @selected(old('theses') == $val->id) value="{{ $val->id }}">
                                            {{ $val->title_thesis }}</option>
                                    @endforeach
                                </select>
    
                                @error('theses')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputState">اضافة مقيم</label>
                                <select id="inputState" name="staff" required class="form-control">
                                    <option value="">Choose...</option>
                                    @foreach ($staff as $val)
                                        <option @selected(old('staff') == $val->id) value="{{ $val->id }}">
                                            {{ $val->name }}</option>
                                    @endforeach
                                </select>
                                @error('staff')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">حفظ</button>
                        {{-- <p class="mt-5 mb-3 text-muted text-center">© 2020</p> --}}
                    </form>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->
@endsection
