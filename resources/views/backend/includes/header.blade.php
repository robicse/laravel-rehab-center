<nav class="navbar navbar-main navbar-expand-lg  px-0 mx-4 shadow-none border-radius-xl z-index-sticky " id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid">
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
            <a href="javascript:;" class="nav-link p-0">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                </div>
            </a>
        </div>
        <nav aria-label="breadcrumb" class="py-1 px-3">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm text-white active">
                    <a class="opacity-5 text-white" href="{{route(Request::segment(1).'.dashboard')}}">
                        <i class="ni ni-box-2"></i>
                    </a>
                </li>
            </ol>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="text-white" id="MyClockDisplay">
                </div>
            </div>
        </div>
        <ul class="navbar-nav  justify-content-end ">


            <li class="nav-item d-xl-none ps-3 d-flex align-items-center ">
                <a href="javascript:;" class="nav-link text-white pr-1" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                    </div>
                </a>
            </li>


            <li class="mb-2">
                <a href="javascript:;" class="nav-link text-white pr-1" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">

                    <i class="fa fa-bell cursor-pointer" id="seennotify"><sup>{{
                            auth()->user()->unreadNotifications->count()>0 }}</sup> </i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                    @foreach(auth()->user()->unreadNotifications as $notification)

                    <li>

                        <a class="dropdown-item border-radius-md" href="{{route(Request::segment(1).'.notifications.index')}}">
                            <div class="d-flex py-1">

                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold"> {!! ($notification->data['data']) !!}</span>
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        {{($notification->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </a>

                    </li>
                    @endforeach
                    @foreach(auth()->user()->readNotifications as $notification)

                    <li>

                        <a class="dropdown-item border-radius-md" href="{{route(Request::segment(1).'.notifications.index')}}">
                            <div class="d-flex py-1">

                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold"> {!! ($notification->data['data']) !!}</span>
                                    </h6>
                                    <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        {{($notification->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </a>

                    </li>
                    @endforeach

                </ul>

            </li>
            <li class="nav-item d-flex pe-1 align-items-center">
                <a href="{{ route('logout') }}" title="Sing Out Button"
                    class="nav-link text-white font-weight-bold pr-1" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">

                    <i class="fas fa-key me-sm-1"></i>
                    <span class="d-sm-inline d-none"></span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    </div>
</nav>