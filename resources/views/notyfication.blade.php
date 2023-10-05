@extends('layouts.app')

@section('title')
    الاشعارات
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
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
                <div class="card-body pt-4 " style="height: 380px;overflow-y:scroll">
                    <ul class="list-group p-0">
                        @foreach (Auth::user()->Notifications as $item)
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg"
                                style="background-color:#f5f5f5">
                                <a href="{{ $item->data['link'] }}" style="color: #8f8e8e">
                                    <div class="d-flex align-items-start">
                                        <button
                                            class="btn btn-icon-only mx-3 btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                class="fas fa-bell" aria-hidden="true"></i></button>
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
@endsection
