@extends('layouts.app')

@section('title')
    المشرفين
@endsection
@section('content')
    <div class="row">
        @php
            $cont = 0;
        @endphp
        @foreach ($supervision as $item)
            @php
                $cont++;
            @endphp
            @if ($item->order_staff == 1)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">المشرف الاول</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">بيانات المشرف</h6>
                                        <span class="mb-2 text-xs">الاسم: <span
                                                class="text-dark font-weight-bold ms-sm-2">{{ Helper::user($item->staff_id)->name }}</span></span>
                                        <span class="mb-2 text-xs">البريد الالكتروني: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ Helper::user($item->staff_id)->email }}</span></span>
                                        {{-- <span class="text-xs">الرقم: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span> --}}
                                    </div>
                                    <div class="ms-auto text-end">
                                        @if ($item->status == 1)
                                            <a class="btn btn-link text-success text-gradient px-3 mb-0"
                                                href="javascript:;">
                                                <i class="fa-solid fa-circle text-success"></i>تم الموافقة
                                            </a>
                                        @elseif($item->status == 0)
                                            <a class="btn btn-link text-warning text-gradient px-3 mb-0"
                                                href="javascript:;">
                                                <i class="fa-solid fa-circle text-danger"></i>في انتظار الموافقة
                                            </a>
                                        @else
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;">
                                                <i class="fa-solid fa-circle text-danger"></i>تم الرفض
                                            </a>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('changeSupervision1') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputState">تغيير المشرف الاول</label>
                                        <select id="inputState" name="staff" required class="form-control">
                                            <option value="">Choose...</option>
                                            @foreach ($staff as $val)
                                                <option @selected(old('staff') == $val->id) value="{{ $val->id }}">
                                                    {{ $val->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="id_supervision" value="{{ $item->id }}">
                                        @error('staff')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            @if ($item->order_staff == 2)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">المشرف الثاني</h5>
                            <a href="{{ route('Supervision.delete', $item->id) }}" class="btn btn-danger">الغاء المشرف</a>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">بيانات المشرف</h6>
                                        <span class="mb-2 text-xs">الاسم: <span
                                                class="text-dark font-weight-bold ms-sm-2">{{ Helper::user($item->staff_id)->name }}</span></span>
                                        <span class="mb-2 text-xs">البريد الالكتروني: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ Helper::user($item->staff_id)->email }}</span></span>
                                        {{-- <span class="text-xs">الرقم: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span> --}}
                                    </div>
                                    <div class="ms-auto text-end">
                                        @if ($item->status == 1)
                                            <a class="btn btn-link text-success text-gradient px-3 mb-0"
                                                href="javascript:;">
                                                <i class="fa-solid fa-circle text-success"></i>تم الموافقة
                                            </a>
                                        @elseif($item->status == 0)
                                            <a class="btn btn-link text-warning text-gradient px-3 mb-0"
                                                href="javascript:;">
                                                <i class="fa-solid fa-circle text-danger"></i>في انتظار الموافقة
                                            </a>
                                        @else
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;">
                                                <i class="fa-solid fa-circle text-danger"></i>تم الرفض
                                            </a>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('changeSupervision1') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputState">تغيير المشرف الثاني</label>
                                        <select id="inputState" name="staff" required class="form-control">
                                            <option value="">Choose...</option>
                                            @foreach ($staff as $val)
                                                <option @selected(old('staff') == $val->id) value="{{ $val->id }}">
                                                    {{ $val->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="id_supervision" value="{{ $item->id }}">
                                        @error('staff')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        @if (count($supervision) == 1)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">المشرف الثاني</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-footer">
                            <form action="{{ route('Supervision.create') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputState">اضافة مشرف ثاني</label>
                                        <select id="inputState" name="staff" required class="form-control">
                                            <option value="">Choose...</option>
                                            @foreach ($staff as $val)
                                                <option @selected(old('staff') == $val->id) value="{{ $val->id }}">
                                                    {{ $val->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="id_thesis" value="{{ $item->thesis_id }}">
                                        @error('staff')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
