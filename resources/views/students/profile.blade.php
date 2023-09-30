@extends('layouts.app')

@section('title')
    بيانات الطالب
@endsection
@section('content')
    <div class="row">
        <!-- Small table -->
        <div class="card">
            <div class="card-header">
                البيانات الشخصية
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>الاسم : {{ $student->name }}</p>
                    </div>

                    <div class="col-md-6">
                        <p>البريد الالكتروني : {{ $student->email }}</p>
                    </div>

                    <div class="col-md-6">
                        <p>الرقم الاكاديمي : {{ $student->num_acadmi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end section -->
@endsection
