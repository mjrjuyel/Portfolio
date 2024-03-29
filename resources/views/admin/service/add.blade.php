@extends('layouts.admin')
@section('content')
<p>>Admin > Service > Registration :</p>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <form method="post" action="{{ route('dashboard.service.insert') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-dark">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card_header"><i class="fa-brands fa-servicestack header_icon"></i> Insert Service</h3>
                        </div>
                        <div class="col-md-4 text-end"><a href="{{ route('dashboard.service') }}"
                                class="btn btn-sm btn-primary btn_header">
                                <i class="fa-solid fa-globe"></i> All Service </a>
                        </div>
                    </div>
                </div>
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
                                <input type="text" class="form-control" name="title" value="">
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
                                <input type="text" class="form-control" name="icon" value="">
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
                                    value=""></textarea>
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
                        <button type="submit" class="btn btn-primary button">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
