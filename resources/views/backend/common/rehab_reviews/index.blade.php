@extends('backend.layouts.master')
@section('title', 'Rehab Review List')
@push('css')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('lightbox/css/lightbox.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">All Rehab Review List</h5>
                                <p class="text-sm mb-0">
                                    Rehab Review data.
                                </p>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                   
                                       
                                  
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table id="datatable-basic" class="table table-flush" id="products-list">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
    @push('js')
        <script src="{{ asset('lightbox/js/lightbox.js') }}"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true
                });

                $('#datatable-basic').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    dom: 'Bflrtip',
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    language: {
                        'paginate': {
                            'previous': '<strong><<strong>',
                            'next': '<strong>><strong>'
                        }
                    },
                   
                    ajax: "{{ route(Request::segment(1) . '.rehab-review-lists.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                       
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'review_title',
                            name: 'review_title'
                        },
                        {
                            data: 'rating',
                            name: 'rating'
                        },
                        {
                            data: 'status'
                        },
                       
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: true
                        },
                    ]
                });
            });
                    //Delete Admin
        $(document).on('click', '#deleteBtn', function() {
            if (!confirm('Are You Sure?')) return;
            $id = $(this).attr('rid');
            //console.log($roomid);
            $info_url = url +'/'+ '{{Request::segment(1)}}'+'/delete-rehab-review/' + $id;
            $.ajax({
                url: $info_url,
                method: "DELETE",
                type: "delete",
               success: function(data) {
                    if (data) {
                        toastr.warning('success', 'Rehab Review Delete  Successfully');
                        $('#datatable-basic').DataTable().ajax.reload();
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

            function updateStatus(el) {
                if (el.checked) {
                    var status = 1;
                } else {
                    var status = 0;
                }
                $.post("{{ route(Request::segment(1) . '.rehabreviewsStatus') }}", {
                        _token: '{{ csrf_token() }}',
                        id: el.value,
                        status: status
                    },
                    function(data) {
                        if (data == 1) {
                            toastr.success('success', 'Rehab Review Status updated successfully');
                        } else {
                            toastr.danger('danger', 'Something went wrong');
                        }
                    });
            }

           
        </script>
    @endpush
