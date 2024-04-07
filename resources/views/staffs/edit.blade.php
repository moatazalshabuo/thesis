@extends('layouts.app')

@section('title')
    تعديل البيانات اعضاء التدريس
@endsection
@section('content')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">تعديل بيانات اعضاء التدريس
            </h2>
            <div class="card shadow">

                <div class="card-body">
                    <form method="POST" action="{{ route('staffs.update', $user->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">البريد الالكتروني</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $user->email) }}" required autocomplete="email">
                                {{-- <input type="hidden" name="type_user" value="3"> --}}
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">الاسم</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="lastname">الرقم الاكاديمي</label>
                                <input id="num_acadmi" type="text"
                                    class="form-control @error('num_acadmi') is-invalid @enderror" name="num_acadmi"
                                    value="{{ old('num_acadmi', $user->num_acadmi) }}" required autocomplete="name"
                                    autofocus>

                                @error('num_acadmi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class='form-group'>
                                    <label>السيرة الذاتية</label>
                                    <input type="file" class="form-control" accept="application/pdf" name="cv"
                                        required>
                                </div>
                            </div>
                        </div>
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <hr class="my-4">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">حفظ</button>
                        {{-- <p class="mt-5 mb-3 text-muted text-center">© 2020</p> --}}
                    </form>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->
@endsection
