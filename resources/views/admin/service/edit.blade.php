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
<p>>Admin > Service > Edit :</p>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <form method="post" action="{{ route ('dashboard.service.update') }}">
                @csrf
                <div class="card-header bg-dark">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card_header"><i class="fa-brands fa-servicestack header_icon"></i> Update Service
                                Information</h3>
                        </div>
                        <div class="col-md-2 text-end"><a
                                href="{{ url('dashboard/service/view/'.$edit->ser_slug) }}"
                                class="btn btn-sm btn-primary btn_header">
                                <i class="fa-solid fa-circle-info"></i></i> View Detail</a>
                        </div>
                        <div class="col-md-2 text-end"><a href="{{ route('dashboard.service') }}"
                                class="btn btn-sm btn-primary btn_header">
                                <i class="fa-solid fa-globe"></i> All Service </a>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $edit->id }}">
                <input type="hidden" name="slug" value="{{ $edit->ser_slug }}">
                <div class="row m-80">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        @if(Session::get('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}
                            </div>
                        @endif
                        @if(Session::get('error'))
                            <div class="alert alert-error">{{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <label class="col-form-label input_name"> Service Title <span class="err">*</span>
                                    :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="title" value="{{$edit->ser_title}}">
                                @error('title')
                                    <span class="text-danger invalid_msg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3 text-end">
                                <label class="col-form-label input_name"> Service Icon <span class="err">*</span>
                                    :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="icon" value="{{$edit->ser_icon}}">
                                @error('icon')
                                    <span class="text-danger invalid_msg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3 text-end">
                                <label class="col-form-label input_name"> Service Detail <span class="err">*</span>
                                    :</label>
                            </div>
                            <div class="col-md-5">
                                <textarea type="text" rows="4" style="resize:none;" class="form-control" name="detail"
                                    value="">{{$edit->ser_detail}}</textarea>
                                @error('detail')
                                    <span class="text-danger invalid_msg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="card-header bg-secondary">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary button">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
