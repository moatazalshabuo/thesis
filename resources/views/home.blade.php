@extends('layouts.app')

@section('title')
    الصفحة الرئيسية
@endsection
@section('content')
    @if (Auth::user()->type_user == 3)
        <div class="row mt-4">
            <div class="col-md-7">
                <div class="row mt-4">
                    <div class="col-lg-12 ">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    @isset($thesis)
                                        <div class="col-lg-8 mb-lg-0 mb-4" style="position: relative">
                                            <div class="d-flex flex-column h-100">
                                                <span style="position: absolute;top:10px;left:10px">
                                                    @if ($thesis->status == 1)
                                                        <i class="fa-solid fa-circle text-success"></i>
                                                        قيد العمل
                                                    @elseif($thesis->status == 0)
                                                        <i class="fa-solid fa-circle text-danger"></i>
                                                        في انتظار الموافقة
                                                    @elseif($thesis->status == 2)
                                                        <i class="fa-regular fa-circle-check"></i>الاطروحة مكتملة
                                                    @endif
                                                </span>
                                                <p class="mb-1 pt-2 text-bold">{{ $thesis->title_thesis }}</p>

                                                <h5 class="font-weight-bolder">{{ $thesis->en_title }}</h5>
                                                <p class="mb-5">{{ $thesis->descripe }}</p>
                                                @if ($thesis->status == 1)
                                                    <a class="text-dark font-weight-bold ps-1 mb-0 icon-move-left mt-auto"
                                                        href="{{ route('thesis.show', $thesis->id) }}">
                                                        الاطلاعات مع المشرفين
                                                        <i class="fas fa-arrow-left text-sm ms-1" aria-hidden="true"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <p>لم يتم اضافة اطروحة بعد</p>
                                    @endisset

                                    <div class="col-lg-4 me-auto ms-0 text-center">
                                        <div class="bg-gradient-primary border-radius-lg min-height-200">
                                            {{-- <img src="{{ asset('assets//img/shapes/waves-white.svg') }}" class="position-absolute h-100 top-0 d-md-block d-none" alt="waves"> --}}
                                            <div class="position-relative pt-5 pb-4">
                                                <i class="fa-solid fa-book text-white" style="font-size: 120px"></i>
                                                {{-- <img class="max-width-500 w-100 position-relative z-index-2" src="{{ asset('assets//img/illustrations/rocket-white.png') }}"> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @isset($thesis)
                        <div class="col-md-12 mt-2">
                            <div class="row">

                                <div class="col-lg-12 col-sm-6 mb-lg-0 mb-4 mt-3">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">نسبة الانجاز
                                                        </p>
                                                        <h5 class="font-weight-bolder mb-0">
                                                            نسبة الانجاز
                                                            <span
                                                                class="text-danger text-sm font-weight-bolder">{{ $thesis->rate1 + $thesis->rate2 / 2 }}%</span>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-start">
                                                    <div
                                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                        {{-- <i class="ni ni-money-coins " aria-hidden="true"></i> --}}
                                                        <i class="fa-solid fa-clipboard-user text-lg opacity-10"></i> <i
                                                            class="fa-solid fa-clipboard-user text-lg opacity-10"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
            <div class="col-md-5">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0">الاشعارات</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <i class="far fa-calendar-alt me-2" aria-hidden="true"></i>
                                <small>{{ date('Y-m-d') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 " style="height: 400px;overflow-y:scroll">
                        <ul class="list-group p-0">
                            @foreach (Auth::user()->Notifications as $item)
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg"
                                    style="background-color:#f5f5f5">
                                    <a href="{{ $item->data['link'] }}" style="color: #8f8e8e">
                                        <div class="d-flex align-items-start">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                    class="fas fa-arrow-down" aria-hidden="true"></i></button>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark text-sm mx-1"
                                                    style="color: rgb(68, 47, 255) !important">{{ $item->data['title'] }}
                                                </h6>
                                                <span class="text-xs">{{ $item->data['time'] }}</span>
                                            </div>
                                        </div>
                                        {{-- <div
                                        class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                        - $ 2,500
                                    </div> --}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->type_user == 1)
    <div class="row">
        <div class="col-md-7">
        <div class="row">
            <div class="col-lg-6 col-sm-6 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a href="{{ route('students.index') }}" class="text-sm mb-0 text-capitalize font-weight-bold">عدد الطلاب</a>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ Helper::CountStudents() }}
                                        <span class="text-success text-sm font-weight-bolder">{{ Helper::CountStudents() }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a href="{{ route('staffs.index') }}" class="text-sm mb-0 text-capitalize font-weight-bold">عدد المشرفين</a>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ Helper::CountStaff() }}
                                        <span class="text-success text-sm font-weight-bolder">{{ Helper::CountStaff() }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mb-lg-0 mt-1">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a href="{{ route('theses.a.admin') }}" class="text-sm mb-0 text-capitalize font-weight-bold"> عدد الاطروحات قيد العمل</a>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ Helper::CountThesisW() }}
                                        <span class="text-danger text-sm font-weight-bolder">{{ Helper::CountThesisW() }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    {{-- <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i> --}}
                                    <i class="fa-solid fa-retweet text-lg opacity-10"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mt-1">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a href="{{route('theses.f.admin')}}" class="text-sm mb-0 text-capitalize font-weight-bold">عدد الاطروحات المكتملة</a>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ Helper::CountThesisF() }}
                                        <span class="text-success text-sm font-weight-bolder">{{ Helper::CountThesisF() }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mb-lg-0 mt-1">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a href="{{ route('theses.index') }}" class="text-sm mb-0 text-capitalize font-weight-bold"> عدد الاطروحات تنتظر الموافقة</a>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ Helper::CountThesisN() }}
                                        <span class="text-danger text-sm font-weight-bolder">{{ Helper::CountThesisN() }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mt-1">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a href="{{ route('theses.n.admin') }}" class="text-sm mb-0 text-capitalize font-weight-bold">عدد الاطروحات المرفوضة</a>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ Helper::CountThesisC() }}
                                        <span class="text-success text-sm font-weight-bolder">{{ Helper::CountThesisC() }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    {{-- <i class="ni ni-cancel text-lg opacity-10" aria-hidden="true"></i> --}}
                                    <i class="fa-solid fa-ban text-lg opacity-10"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-5">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">الاشعارات</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <i class="far fa-calendar-alt me-2" aria-hidden="true"></i>
                            <small>{{ date('Y-m-d') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 " style="height: 400px;overflow-y:scroll">
                    <ul class="list-group p-0">
                        @foreach (Auth::user()->Notifications as $item)
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg"
                                style="background-color:#f5f5f5">
                                <a href="{{ $item->data['link'] }}" style="color: #8f8e8e">
                                    <div class="d-flex align-items-start">
                                        <button
                                            class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                class="fas fa-arrow-down" aria-hidden="true"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm mx-1"
                                                style="color: rgb(68, 47, 255) !important">{{ $item->data['title'] }}
                                            </h6>
                                            <span class="text-xs">{{ $item->data['time'] }}</span>
                                        </div>
                                    </div>
                                    {{-- <div
                                    class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    - $ 2,500
                                </div> --}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @elseif(Auth::user()->type_user == 2)
    <div class="row">
        <div class="col-md-7">
        <div class="row">
            <div class="col-lg-6 col-sm-6 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">مشرف اول</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        عدد البحوث
                                        <span class="text-success text-sm font-weight-bolder">{{Helper::CountS1() }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">مشرف تاني في </p>
                                    <h5 class="font-weight-bolder mb-0">
                                        عدد البحوث
                                        <span class="text-success text-sm font-weight-bolder">{{ Helper::CountS2() }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mb-lg-0 mb-4 mt-1">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">طلبات الاشراف</p>
                                    <h5 class="font-weight-bolder mb-0">

                                        <span class="text-danger text-sm font-weight-bolder">{{ Helper::CountSR() }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mt-1">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">البحوث المكتملة</p>
                                    <h5 class="font-weight-bolder mb-0">

                                        <span class="text-success text-sm font-weight-bolder">{{ Helper::CountSF() }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-start">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <div class="col-md-5">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">الاشعارات</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <i class="far fa-calendar-alt me-2" aria-hidden="true"></i>
                            <small>{{ date('Y-m-d') }}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 " style="height: 400px;overflow-y:scroll">
                    <ul class="list-group p-0">
                        @foreach (Auth::user()->Notifications as $item)
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg"
                                style="background-color:#f5f5f5">
                                <a href="{{ $item->data['link'] }}" style="color: #8f8e8e">
                                    <div class="d-flex align-items-start">
                                        <button
                                            class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                class="fas fa-arrow-down" aria-hidden="true"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm mx-1"
                                                style="color: rgb(68, 47, 255) !important">{{ $item->data['title'] }}
                                            </h6>
                                            <span class="text-xs">{{ $item->data['time'] }}</span>
                                        </div>
                                    </div>
                                    {{-- <div
                                    class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    - $ 2,500
                                </div> --}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
