@extends('layouts.app')

@section('title')
    الاطروحات
@endsection
@section('content')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">ادارة الاطروحات</h2>
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title">الاطروحات قيد عمل</h5>
                </div>
                <div class="card-body">

                    <!-- table -->
                    <table class="table table-borderless table-hover" id='datatable'>
                        <thead>
                            <tr>
                                <th></th>
                                <th>العنوان باللغة العربية</th>
                                <th>العنوان باللغة الانجليزية</th>
                                <th>الطالب</th>
                                <th>الحالة</th>
                                <th>تحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($thesis as $item)
                                <tr>
                                    @if ($item->thesis->status == 1 || $item->thesis->status == 0)
                                        <td></td>
                                        <td>{{ $item->thesis->title_thesis }}</td>
                                        <td>{{ $item->thesis->en_title }}</td>
                                        <td><a href="{{ route('profile.st',$item->thesis->students_id) }}"> {{ Helper::username($item->thesis->students_id) }} </a></td>
                                        <td>
                                            <span >
                                                @if ($item->thesis->status == 1)
                                                    <i class="fa-solid fa-circle text-success"></i>
                                                    قيد العمل
                                                @elseif($item->thesis->status == 0)
                                                    <i class="fa-solid fa-circle text-danger"></i>
                                                    في انتظار الموافقة
                                                @elseif($item->thesis->status == 2)
                                                    <i class="fa-regular fa-circle-check"></i>الاطروحة مكتملة
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            @if ($item->thesis->status == 1)
                                                <a href="{{ route('finish', $item->thesis->id) }}"
                                                    class="btn btn-success">اكتملت الاطروحة</a>
                                                <a href="{{ route('thesis.show', $item->thesis->id) }}"
                                                    class="btn btn-primary">عرض</a>
                                            @elseif($item->thesis->status == 0)
                                                لم تتم الموافقة على الاطروحة من المنسق
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="mb-0 text-muted">
                        {{-- {{ $theses->links() }} --}}
                    </nav>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->
@endsection
