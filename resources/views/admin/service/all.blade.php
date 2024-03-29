@extends('layouts.admin')
@section('content')
@if(Session::has('success'))
    <script type="text/javascript">
        swal({
            title: "Success!",
            text: "{{ Session::get('success') }}",
            icon: "success",
            button: "OK",
            timer: 5000,
        });

    </script>
@endif
@if(Session::has('error'))
    <script type="text/javascript">
        swal({
            title: "Opps!",
            text: "{{ Session::get('error') }}",
            icon: "error",
            button: "OK",
            timer: 5000,
        });

    </script>
@endif
<p>>Admin > Service :</p>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card_header"><i class="fa-brands fa-servicestack header_icon"></i> All Service</h3>
                    </div>
                    <div class="col-md-4 text-end"><a href="{{ route('dashboard.service.add') }}"
                            class="btn btn-sm btn-primary btn_header">
                            <i class="fa-solid fa-user-plus"></i> Add Service</a>
                    </div>
                </div>
            </div>
            <div class="row m-80">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table id="myTable" class="table table-border table-striped text-center custom_table">
                        <thead class="heading_col">
                            <tr>
                                <th>Service Title</th>
                                <th>Service Detail</th>
                                <th>Service Icon</th>
                                <th>Creator</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allser->count() > 0)
                                @foreach($allser as $data)
                                    <tr class="table_font">
                                        <td>{{ $data->ser_title }}</td>
                                        <td>
                                            {{ Str::words($data->ser_detail,10) }}
                                        </td>
                                        <td>
                                            {{$data->ser_icon}}
                                        </td>
                                        <td>{{ $data->creator->name }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-primary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Manage
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="{{ url ('dashboard/service/view/'.$data->ser_slug) }}">View</a>
                                                    </li>

                                                    <li><a class="dropdown-item"
                                                            href="{{ url ('dashboard/service/edit/'.$data->ser_slug) }}">Edit</a>
                                                    </li>

                                                    <li><a class="dropdown-item" id="softDelete" href="#"
                                                            data-bs-toggle="modal" data-bs-target="#softDelete_modal"
                                                            data-id="{{ $data->id }}">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h2>No Data IS Available !</h2>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class=""></div>
            </div>
            <div class="card-header bg-dark">
                <div class="col-12">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button onclick="window.print()" type="button" class="btn btn-primary">Print</button>
                        <a href="{{route('dashboard.service.pdf')}}" type="button" class="btn btn-dark">PDf</a>
                        <button type="button" class="btn btn-primary">Excel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ===== Modal Options ==== -->
<div id="softDelete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route ('dashboard.service.softdel') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-warning">
                    <h4 class="modal-title" id="primary-header-modalLabel">Service category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body modal_body">
                    Are You Sure want to Delete?
                    <input type="text" name="modal_id" id="modal_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
