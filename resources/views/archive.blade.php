@extends('layouts.app')

@section('title')
    الارشفة
@endsection
@section('content')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12">
            <h2 class="h4 mb-1">البحث في الارشيف</h2>
            <div class="card shadow">

                <div class="card-body">
                    <form method="GET" action="">

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="inputState">اسم الطالب</label>
                                <select id="inputState" name="student" class="form-control select2">
                                    <option value="">Choose...</option>
                                    @foreach ($student as $val)
                                        <option @selected(old('student') == $val->id) value="{{ $val->id }}">
                                            {{ $val->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">اسم المشرف</label>
                                <select name="superviser" class="form-control select2">
                                    <option value="">Choose...</option>
                                    @foreach ($superviser as $val)
                                        <option @selected(old('superviser') == $val->id) value="{{ $val->id }}">
                                            {{ $val->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                        <button class="btn btn-primary btn-block " type="submit">بحث</button>
                        {{-- <p class="mt-5 mb-3 text-muted text-center">© 2020</p> --}}
                    </form>
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>العنوان باللغة العربية</th>
                        
                                    <th>الطالب</th>
                                    <th>الحالة</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($thesis as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{ $item->title_thesis }}</td>
                                        
                                        <td>{{ $item->students->name }}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <span>في انتظار الموافقة</span>
                                            @elseif($item->status == 1)
                                                <span>قيد العمل</span>
                                            @elseif($item->status == 2)
                                                <span>مكتملة</span>
                                            @elseif($item->status == 3)
                                                <span>مرفوضة</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('thesesShow.admin', $item->id) }}"
                                                class="btn btn-primary">عرض</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->
@endsection
