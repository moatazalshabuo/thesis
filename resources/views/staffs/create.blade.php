@extends('layouts.app')

@section('title')
    عرض اعضاء التدريس
@endsection
@section('content')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">ادارة اعضاء التدريس</h2>
            <div class="card shadow">

                <div class="card-body">
                    <form method="POST" action="{{ route('staffs.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="lastname">الاسم</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="firstname">البريد الالكتروني</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                <input type="hidden" name="type_user" value="2">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-md-6">
                                <label for="lastname">الرقم الوظيفي</label>
                                <input id="num_acadmi" type="text"
                                    class="form-control @error('num_acadmi') is-invalid @enderror" name="num_acadmi"
                                    value="{{ old('num_acadmi') }}" required autocomplete="name" autofocus>

                                @error('num_acadmi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPassword5">كلمة المرور</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword6">تاكيد كلمة المرور</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">Password requirements</p>
                                <p class="small text-muted mb-2"> To create a new password, you have to meet all of
                                    the
                                    following requirements: </p>
                                <ul class="small text-muted pl-4 mb-0">
                                    <li> Minimum 8 character </li>
                                    <li>At least one special character</li>
                                    <li>At least one number</li>
                                    <li>Can’t be the same as a previous password </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <div class='form-group'>
                                    <label>السيرة الذاتية</label>
                                    <input type="file" class="form-control" accept="application/pdf" name="cv"
                                        required>
                                </div>
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
