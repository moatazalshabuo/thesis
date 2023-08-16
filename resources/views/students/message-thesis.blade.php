@extends('layouts.app')

@section('title')
    {{ $thesis->title_thesis }}
@endsection
@section('content')

    <div class="row">
        @if (Auth::id() == $thesis->supervisions[0]->staff_id)
            <div class="col-md-3">
                <div class="card mb-2">
                    <form method="post" action="{{ route('rate1') }}">
                        <div class="card-header">
                            <h5 class="card-title">نسبة الانجاز </h5>
                        </div>
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="id" value="{{ $thesis->id }}">
                            <input type="range" class="form-range" value="{{ $thesis->rate1 }}" min="1"
                                name="rate" max="100" oninput="this.nextElementSibling.value = this.value">
                            <output>{{ $thesis->rate1 }}</output>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="row mb-2">
                @if (Auth::id() == $thesis->students_id)

                    <div class="col-lg-6 col-sm-4 mb-lg-0 mb-4 ">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">نسبة الانجاز</p>
                                            <h5 class="font-weight-bolder mb-0">

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
                @endif
            </div>
        @endif

        <div class="col-md-8 card">
            <div class="card-body">
                @if ($thesis->students_id == Auth::id())
                    <form enctype="multipart/form-data" method="post" action="{{ route('discussion.store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>العنوان</label>
                                <input type="text" name="title" required class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>ادخل ملف جديد</label>
                                <input type="file" accept=".pdf, .doc, .docx" required class="form-control"
                                    name="file">
                            </div>
                        </div>
                        <input type="hidden" name="thesis_id" value="{{ $thesis->id }}">
                        <button class="btn btn-primary">حفظ</button>
                    </form>
                @endif
                <ul class="list-group mt-4">
                    @if ($Discussion)
                        @foreach ($Discussion as $item)
                            <li class="list-group-item">
                                <a href="{{ route('discussion.show', $item->id) }}"
                                    style="float: right;color:rgb(59, 59, 209)">{{ $item->title }} <br> <small
                                        style="color:rgb(124, 124, 124)">{{ $item->created_at }}</small>
                                </a>
                                <form method="post" action="{{ route('discussion.destroy', $item->id) }}"
                                    style="float: left">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn text-danger" type="submit">حذف</button>
                                </form>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">لا يوجد رسائل لعرضهن</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
