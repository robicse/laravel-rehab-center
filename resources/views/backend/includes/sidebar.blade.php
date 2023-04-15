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
                <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link active"
                    aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
                <div class="collapse  show" id="dashboardsExamples">
                    <ul class="nav ms-4">
                        
                        <li class="nav-item {{Request::is(Request::segment(1) .'/roles*') ? 'active' : ''}}">
                            <a class="nav-link " href="{{route(Request::segment(1) . '.roles.index')}}">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal">Roles  </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#vrExamples">
                                <span class="sidenav-mini-icon"> V </span>
                                <span class="sidenav-normal"> Virtual Reality <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="vrExamples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="../../pages/dashboards/vr/vr-default.html">
                                            <span class="sidenav-mini-icon text-xs"> V </span>
                                            <span class="sidenav-normal"> VR Default </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="../../pages/dashboards/vr/vr-info.html">
                                            <span class="sidenav-mini-icon text-xs"> V </span>
                                            <span class="sidenav-normal"> VR Info </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
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
            <li class="nav-item {{Request::is(Request::segment(1) .'/categories*') ? 'active' : ''}}">
                <a class="nav-link"
                    href="{{route(Request::segment(1) . '.categories.index')}}">
                    <div
                        class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Category  </span>
                </a>
            </li> 
          
            <li class="nav-item {{Request::is(Request::segment(1) .'/sliders*') ? 'active' : ''}}">
                <a class="nav-link"
                    href="{{route(Request::segment(1) . '.sliders.index')}}">
                    <div
                        class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Slider  </span>
                </a>
            </li> 
           
           
            <li class="nav-item">
                <hr class="horizontal dark" />
                <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">DOCS</h6>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#basicExamples" class="nav-link " aria-controls="basicExamples"
                    role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-spaceship text-dark text-sm"></i>
                    </div>
                    <span class="nav-link-text ms-1">Basic</span>
                </a>
                <div class="collapse " id="basicExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                href="#gettingStartedExample">
                                <span class="sidenav-mini-icon"> G </span>
                                <span class="sidenav-normal"> Getting Started <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="gettingStartedExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="https://www.creative-tim.com/learning-lab/bootstrap/quick-start/argon-dashboard"
                                            target="_blank">
                                            <span class="sidenav-mini-icon text-xs"> Q </span>
                                            <span class="sidenav-normal"> Quick Start </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard"
                                            target="_blank">
                                            <span class="sidenav-mini-icon text-xs"> L </span>
                                            <span class="sidenav-normal"> License </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="https://www.creative-tim.com/learning-lab/bootstrap/overview/argon-dashboard"
                                            target="_blank">
                                            <span class="sidenav-mini-icon text-xs"> C </span>
                                            <span class="sidenav-normal"> Contents </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="https://www.creative-tim.com/learning-lab/bootstrap/build-tools/argon-dashboard"
                                            target="_blank">
                                            <span class="sidenav-mini-icon text-xs"> B </span>
                                            <span class="sidenav-normal"> Build Tools </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false"
                                href="#foundationExample">
                                <span class="sidenav-mini-icon"> F </span>
                                <span class="sidenav-normal"> Foundation <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="foundationExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="https://www.creative-tim.com/learning-lab/bootstrap/colors/argon-dashboard"
                                            target="_blank">
                                            <span class="sidenav-mini-icon text-xs"> C </span>
                                            <span class="sidenav-normal"> Colors </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="https://www.creative-tim.com/learning-lab/bootstrap/grid/argon-dashboard"
                                            target="_blank">
                                            <span class="sidenav-mini-icon text-xs"> G </span>
                                            <span class="sidenav-normal"> Grid </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="https://www.creative-tim.com/learning-lab/bootstrap/typography/argon-dashboard"
                                            target="_blank">
                                            <span class="sidenav-mini-icon text-xs"> T </span>
                                            <span class="sidenav-normal"> Typography </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="https://www.creative-tim.com/learning-lab/bootstrap/icons/argon-dashboard"
                                            target="_blank">
                                            <span class="sidenav-mini-icon text-xs"> I </span>
                                            <span class="sidenav-normal"> Icons </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#componentsExamples" class="nav-link "
                    aria-controls="componentsExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-dark text-sm"></i>
                    </div>
                    <span class="nav-link-text ms-1">Components</span>
                </a>
                <div class="collapse " id="componentsExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/alerts/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> A </span>
                                <span class="sidenav-normal"> Alerts </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/badge/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> B </span>
                                <span class="sidenav-normal"> Badge </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/buttons/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> B </span>
                                <span class="sidenav-normal"> Buttons </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/cards/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal"> Card </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/carousel/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal"> Carousel </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/collapse/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal"> Collapse </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/dropdowns/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> D </span>
                                <span class="sidenav-normal"> Dropdowns </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/forms/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> F </span>
                                <span class="sidenav-normal"> Forms </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/modal/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> M </span>
                                <span class="sidenav-normal"> Modal </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/navs/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> N </span>
                                <span class="sidenav-normal"> Navs </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/navbar/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> N </span>
                                <span class="sidenav-normal"> Navbar </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/pagination/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal"> Pagination </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/popovers/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal"> Popovers </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/progress/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> P </span>
                                <span class="sidenav-normal"> Progress </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/spinners/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal"> Spinners </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/tables/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> T </span>
                                <span class="sidenav-normal"> Tables </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link "
                                href="https://www.creative-tim.com/learning-lab/bootstrap/tooltips/argon-dashboard"
                                target="_blank">
                                <span class="sidenav-mini-icon"> T </span>
                                <span class="sidenav-normal"> Tooltips </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="https://github.com/creativetimofficial/ct-argon-dashboard-pro/blob/main/CHANGELOG.md"
                    target="_blank">
                    <div
                        class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-align-left-2 text-dark text-sm"></i>
                    </div>
                    <span class="nav-link-text ms-1">Changelog</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 my-3">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-60 mx-auto" src="../../assets/img/illustrations/icon-documentation.svg"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="https://www.creative-tim.com/learning-lab/bootstrap/overview/argon-dashboard" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
    </div>
</aside>