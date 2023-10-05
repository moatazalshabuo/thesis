<aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-4 rotate-caret"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute start-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('assets//img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="me-1 font-weight-bold">Argon Dashboard 2</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse px-0 w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text me-1">الرئيسية</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('noty') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-bell text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text me-1">الاشعارات</span>
                </a>
            </li>
            @if (auth()->user()->type_user == 1)
                <li class="nav-item mt-3">
                    <h6 class="ps-4 me-4 pe-2 text-uppercase text-xs font-weight-bolder opacity-6">الطلاب</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('students.create') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-user text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">اضافة طالب</span>
                    </a>
                    <a class="nav-link " href="{{ route('students.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">ادارة الطلاب</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 me-4 pe-2 text-uppercase text-xs font-weight-bolder opacity-6">اعضاء التدريس</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('staffs.create') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-user text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">اضافة عضو التدريس</span>
                    </a>
                    <a class="nav-link " href="{{ route('staffs.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">اعضاء التدريس</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 me-4 pe-2 text-uppercase text-xs font-weight-bolder opacity-6">ادارة الاطروحات</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('admin.create_thesis') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">اضافة اطروحة</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('theses.admin') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">اطروحات معلقة</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('theses.a.admin') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">اطروحات قيد العمل</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('theses.f.admin') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">اطروحات مكتملة</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('admin.cancel_thesis') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">اطروحات المرفوضة</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->type_user == 3)
                <li class="nav-item mt-3">
                    <h6 class="ps-4 me-4 pe-2 text-uppercase text-xs font-weight-bolder opacity-6">الاطروحات</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('theses.create') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">التقدم باطروحة</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('theses.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">التعديل على الاطروحة</span>
                    </a>
                </li>
                @php
                    $thesis = Helper::Thesis();
                @endphp
                @isset($thesis->id)
                    {{-- <li class="nav-item">
                        <a class="nav-link " href="{{ route('thesis.show', $thesis->id) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text me-1">{{ $thesis->title_thesis }}</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('st.supervision', $thesis->id) }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text me-1">تغيير المشرفين</span>
                        </a>
                    </li>
                @endisset
            @endif
            @if (auth()->user()->type_user == 2)
                <li class="nav-item mt-3">
                    <h6 class="ps-4 me-4 pe-2 text-uppercase text-xs font-weight-bolder opacity-6">الاطروحات</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('staff.Supervision') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">الاطروحات المشرف عليها</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('staff.fSupervision') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">الاطروحات المكتملة </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('staff.SupervisionRequests') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text me-1">طلبات الاشراف</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-dark btn-sm w-100 mb-3">تسجيل الخروج</button>
        </form>
    </div>
</aside>
