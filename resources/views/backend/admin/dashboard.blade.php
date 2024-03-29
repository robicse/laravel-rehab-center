@extends('backend.layouts.master')
@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card  mb-4">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total User</p>
                                            <h5 class="font-weight-bolder">
                                                <span class="small"> </span><span id="counter1" countTo="{{count($users)}}"></span>
                                               
                                            </h5>
                                            <p class="mb-0">
                                                <a class="text-success text-sm font-weight-bolder" href="{{ route(Request::segment(1) . '.users.index') }}">
                                                <span >Go</span>
                                                to  List   </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                            <i class="ni ni-user-run text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card  mb-4">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Rehab
                                            </p>
                                            <h5 class="font-weight-bolder">
                                                <span class="small"> </span><span id="counter2" countTo="{{count($rehabcenters)}}"></span>
                                               
                                            </h5>
                                            <p class="mb-0">
                                                <a class="text-success text-sm font-weight-bolder" href="{{ route(Request::segment(1) . '.rehab-lists.index') }}">
                                                    <span >Go</span>
                                                    to  List   </a>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                            <i class="ni ni-shop text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card  mb-4">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Blog</p>
                                            <h5 class="font-weight-bolder">
                                                <span class="small"> </span><span id="counter3" countTo="{{count($blogs)}}"></span>
                                               
                                            </h5>
                                            <p class="mb-0">
                                                <a class="text-success text-sm font-weight-bolder" href="{{ route(Request::segment(1) . '.blogs.index') }}">
                                                    <span >Go</span>
                                                    to  List   </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                            <i class="ni ni-vector text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card  mb-4">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Review</p>
                                            <h5 class="font-weight-bolder">
                                                <span class="small"> </span><span id="counter4" countTo="{{count($rehabreviews)}}"></span>
                                               
                                            </h5>
                                            <p class="mb-0">
                                                <a class="text-success text-sm font-weight-bolder" href="{{ route(Request::segment(1) . '.rehab-review-lists.index') }}">
                                                    <span >Go</span>
                                                    to  List   </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Rehab Listing overview</h6>
                         @php
                        $previewyear=\App\models\RehabCenter::whereYear('created_at',date("Y",strtotime("-1 year")))->count('id')?:0;
                       
                        $currentyear=\App\models\RehabCenter::whereYear('created_at',date("Y"))->count('id')?:0;
                   
                      @endphp 
                         
                        <p class="text-sm mb-0">
                            @if($currentyear<$previewyear)
                            <i class="fa fa-arrow-down text-danger"></i>
                            <span class="font-weight-bold"> {{date('Y')-1}} To </span>  {{date('Y')}}
                            @else
                                <i class="fa fa-arrow-up text-success"></i>
                                <span class="font-weight-bold"> {{date('Y')-1}} To </span>  {{date('Y')}}
                            
                            @endif
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            @foreach ($sliders as $slider)
                            @if($loop->index==0)
                            
                            <div class="carousel-item h-100 active"
                                style="background-image: url('{{@$slider->image}}'); background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">{{@$slider->short_description}}</h5>
                                    <p> {{@$slider->long_description}}</p>
                                </div>
                            </div>
                          @else
                          <div class="carousel-item h-100"
                          style="background-image: url('{{@$slider->image}}'); background-size: cover;">
                          <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                              <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                  <i class="ni ni-camera-compact text-dark opacity-10"></i>
                              </div>
                              <h5 class="text-white mb-1">{{@$slider->short_description}}</h5>
                              <p> {{@$slider->long_description}}</p>
                          </div>
                      </div> 
                            @endif
                            @endforeach
                       
                        </div>
                        <button class="carousel-control-prev w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

  <script>
	
    $(document).ready(function () {
        for (let i = 0; i <3; i++) {
            if (document.getElementById('counter'+i)) {
      const countUp = new CountUp('counter'+i, document.getElementById('counter'+i).getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
        }
        
     // Count To
       var ctx1 = document.getElementById("chart-line").getContext("2d");
       var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
       rehabdata=@json(($reviewdata)); 
       previewyear=@json(($previewyear)); 
       var previousYears = {
            Jan : previewyear[1],
            Feb: previewyear[2],
            Mar: previewyear[3],
            Apr: previewyear[4],
            May: previewyear[5],
            Jun: previewyear[6],
            Jul: previewyear[7],
            Aug: previewyear[8],
            Sep: previewyear[9],
            Oct: previewyear[10],
            Nov: previewyear[11],
            Dec: previewyear[12]
       };
       var currentdateHash = {
            Jan : rehabdata[1],
            Feb: rehabdata[2],
            Mar: rehabdata[3],
            Apr: rehabdata[4],
            May: rehabdata[5],
            Jun: rehabdata[6],
            Jul: rehabdata[7],
            Aug: rehabdata[8],
            Sep: rehabdata[9],
            Oct: rehabdata[10],
            Nov: rehabdata[11],
            Dec: rehabdata[12]
      };



        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
       
        new Chart(ctx1, {
            data: {
            datasets: [{
            type: "bar",
            label: "Previous Year",
            weight: 5,
            tension: 0.4,
            borderWidth: 0,
            pointBackgroundColor: "#3A416F",
            borderColor: "#3A416F",
            backgroundColor: '#3A416F',
            borderRadius: 4,
            borderSkipped: false,
            data:previousYears,
            maxBarThickness: 10,
          },
          {
            type: "line",
            label: "Current Year",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            pointBackgroundColor: "#5e72e4",
            borderColor: "#5e72e4",
            borderWidth: 3,
            backgroundColor:gradientStroke1 ,
            data:currentdateHash,
            fill: true,
          }
        ],
                
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    
    });
    </script>
@endpush
