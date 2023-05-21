<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{url('/')}} " target="_blank">
            <img src="{{ asset('backend/assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="ms-1 font-weight-bold">STAR</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link {{Request::is(Request::segment(1) .'/users*') ? 'active' : ''}} {{Request::is(Request::segment(1) .'/roles*') ? 'active' : ''}} {{Request::is(Request::segment(1) .'/databases*') ? 'active' : ''}}"
                    aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
                <div class="collapse {{Request::is(Request::segment(1) .'/users*') ? 'show' : ''}} {{Request::is(Request::segment(1) .'/roles*') ? 'show' : ''}} {{Request::is(Request::segment(1) .'/databases*') ? 'show' : ''}}" id="dashboardsExamples">
                    <ul class="nav ms-4">
                        
                        <li class="nav-item">
                            <a class="nav-link {{Request::is(Request::segment(1) .'/roles*') ? 'active' : ''}}" href="{{route(Request::segment(1) . '.roles.index')}}">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal">Roles  </span>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link {{Request::is(Request::segment(1) .'/users*') ? 'active' : ''}}" href="{{route(Request::segment(1) . '.users.index')}}">
                                <span class="sidenav-mini-icon"> U </span>
                                <span class="sidenav-normal">User  </span>
                            </a>
                        </li>
                       
                        <li class="nav-item {{Request::is(Request::segment(1) .'/databases*') ? 'active' : ''}}">
                            <a class="nav-link " href="{{route(Request::segment(1) . '.databases.index')}}">
                                <span class="sidenav-mini-icon"> D </span>
                                <span class="sidenav-normal"> Database Backup </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#rehabCenter" class="nav-link  {{Request::is(Request::segment(1) .'/rehab-lists*') ? 'show' : ''}}"
                    aria-controls="rehabCenter" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ungroup text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">ReHub Center <b class="badge badge-danger badge-sm">{{Helper::rehabadmnSeen()}}</b> </span>
                </a>
                <div class="collapse" id="rehabCenter">
                    <ul class="nav ms-4">
                        <li class="nav-item {{Request::is(Request::segment(1) .'/rehab-lists*') ? 'active' : ''}}">
                            <a class="nav-link " href="{{route(Request::segment(1) . '.rehab-lists.index')}}">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal">Rehab List </span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is(Request::segment(1) .'/rehab-review-lists*') ? 'active' : ''}}">
                            <a class="nav-link " href="{{route(Request::segment(1) . '.rehab-review-lists.index')}}">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal">Rehab Review <b class="badge badge-danger badge-sm">{{Helper::rehabreviewadmnSeen()}}</b></span>
                            </a>
                        </li>
                       
                        
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is(Request::segment(1) .'/blogs*') ? 'active' : ''}}"
                    href="{{route(Request::segment(1) . '.blogs.index')}}">
                    <div
                        class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-hat-3 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Blogs  </span>
                </a>
            </li> 
            <li class="nav-item">
                <a class="nav-link {{Request::is(Request::segment(1) .'/categories*') ? 'active' : ''}}"
                    href="{{route(Request::segment(1) . '.categories.index')}}">
                    <div
                        class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-money-coins text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Category  </span>
                </a>
            </li> 
          
            <li class="nav-item">
                <a class="nav-link {{Request::is(Request::segment(1) .'/sliders*') ? 'active' : ''}}"
                    href="{{route(Request::segment(1) . '.sliders.index')}}">
                    <div
                        class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-satisfied text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Slider  </span>
                </a>
            </li> 

            <li class="nav-item">
                <a class="nav-link {{Request::is(Request::segment(1) .'/setting*') ? 'active' : ''}}"
                    href="{{route(Request::segment(1) . '.setting.index')}}">
                    <div
                        class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-spaceship text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Setting </span>
                </a>
            </li> 
           
            <li class="nav-item">
                <a class="nav-link {{Request::is(Request::segment(1) .'/filemanager*') ? 'active' : ''}}"
                    href="{{url('/filemanager')}}" target="_blank">
                    <div
                        class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">File Manager  </span>
                </a>
            </li> 
            <li class="nav-item">
                <a class="nav-link {{Request::is(Request::segment(1) .'/subscribes*') ? 'active' : ''}}"
                    href="{{route(Request::segment(1) . '.subscribes.index')}}">
                    <div
                        class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Subscribe </span>
                </a>
            </li> 
            
            
        </ul>
    </div>

</aside>
