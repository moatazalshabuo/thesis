@extends('layouts.app')

@section('title')
    الطروحات
@endsection
@section('content')
    <div class="col-12 col-lg-12 col-xl-12">
        <h2 class="h3 mb-4 page-title">{{ $these->title_thesis }}</h2>
        <div class="col-md-12 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="card-title">بيانات الاطروحة</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-4 col-md-2 text-center">
                                            <a href="profile-posts.html" class="avatar avatar-md">
                                                <i class="fe fe-book" style="font-size: 20px"></i>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <strong class="mb-1 text-muted">العنوان باللغة العربية</strong><span
                                                class="dot dot-lg bg-success ml-1"></span>
                                            <p class=" mb-1">{{ $these->title_thesis }}</p>
                                        </div>
                                        <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                        </div>
                                    </div>
                                </div> <!-- / .card-body -->
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-4 col-md-2 text-center">
                                            <a href="profile-posts.html" class="avatar avatar-md">
                                                <i class="fe fe-book" style="font-size: 20px"></i>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <strong class="mb-1 text-muted">العنوان باللغة الانجليزية</strong><span
                                                class="dot dot-lg bg-success ml-1"></span>
                                            <p class=" mb-1">{{ $these->en_title }}</p>
                                        </div>
                                        <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                            {{-- <a href="#!" class="btn btn-sm btn-secondary">Contact</a> --}}
                                        </div>
                                    </div>
                                </div> <!-- / .card-body -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                @if ($these->status == 0)
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2 text-center">
                                                <a href="profile-posts.html" class="avatar avatar-md">
                                                    <i class="fe fe-info" style="font-size: 20px"></i>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <strong class="mb-1">الحالة</strong><span
                                                    class="dot dot-lg bg-danger ml-1"></span>
                                                <p class="small text-muted mb-1">في انتظار الموافقة</p>
                                            </div>
                                            <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                                <a href="{{ route('thesesactive.admin', $these->id) }}"
                                                    class="btn btn-sm btn-success">الموافقة</a>
                                                <a href="{{ route('thesesdsactive.admin', $these->id) }}"
                                                    class="btn btn-sm btn-danger">الرفض</a>
                                            </div>
                                        </div>
                                    </div> <!-- / .card-body -->
                                @elseif($these->status == 1)
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2 text-center">
                                                <a href="profile-posts.html" class="avatar avatar-md">
                                                    <i class="fe fe-info" style="font-size: 20px"></i>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <strong class="mb-1">الحالة</strong><span
                                                    class="dot dot-lg bg-success ml-1"></span>
                                                <p class="small text-muted mb-1">تحت العمل</p>
                                            </div>
                                            <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                                <a class="btn btn-sm btn-info text-white">نسبة الانجاز {{ $these->rate1 }}%</a>

                                            </div>
                                        </div>
                                    </div> <!-- / .card-body -->
                                @elseif($these->status == 2)
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2 text-center">
                                                <a href="profile-posts.html" class="avatar avatar-md">
                                                    <i class="fe fe-info" style="font-size: 20px"></i>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <strong class="mb-1">الحالة</strong><span
                                                    class="dot dot-lg bg-success ml-1"></span>
                                                <p class="small text-muted mb-1">مكتملة</p>
                                            </div>
                                            <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                                <a class="btn btn-sm btn-info text-white">نسبة الانجاز 100%</a>

                                            </div>
                                        </div>
                                    </div> <!-- / .card-body -->
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h4 class="card-title">بيانات الطالب</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-4 col-md-2 text-center">
                                            <a href="profile-posts.html" class="avatar avatar-md">
                                                <i class="fe fe-user" style="font-size: 20px"></i>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <strong class="mb-1 text-muted">اسم الطالب</strong><span
                                                class="dot dot-lg bg-success ml-1"></span>
                                            <p class=" mb-1">{{ $these->students->name }}</p>
                                        </div>
                                        <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                            {{-- <a href="#!" class="btn btn-sm btn-secondary">Contact</a> --}}
                                        </div>
                                    </div>
                                </div> <!-- / .card-body -->
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-4 col-md-2 text-center">
                                            <a href="profile-posts.html" class="avatar avatar-md">
                                                <i class="fe fe-user" style="font-size: 20px"></i>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <strong class="mb-1 text-muted">الرقم الاكاديمي</strong><span
                                                class="dot dot-lg bg-success ml-1"></span>
                                            <p class=" mb-1">{{ $these->students->num_acadmi }}</p>
                                        </div>
                                        <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                            {{-- <a href="#!" class="btn btn-sm btn-secondary">Contact</a> --}}
                                        </div>
                                    </div>
                                </div> <!-- / .card-body -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow mb-4">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h4 class="card-title">المشرفين</h4>
                    <a href="{{ route('st.supervision',$these->id) }}" class="btn btn-sm btn-secondary">تغيير المشرفين</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            @foreach ($staff as $key => $item)
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2 text-center">
                                                <a href="profile-posts.html" class="avatar avatar-md">
                                                    <i class="fe fe-user" style="font-size: 20px"></i>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <strong class="mb-1 text-muted">المشرف رقم
                                                    {{ $key + 1 }}</strong><span
                                                    class="dot dot-lg bg-success ml-1"></span>
                                                <p class=" mb-1">{{ $item->staff->name }}</p>
                                            </div>
                                            <div class="col-4 col-md-auto offset-4 offset-md-0 my-2">
                                                {{-- <a href="#!" class="btn btn-sm btn-secondary">Contact</a> --}}
                                            </div>
                                        </div>
                                    </div> <!-- / .card-body -->
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
