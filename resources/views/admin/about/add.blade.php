@extends('layouts.admin')
@section('content')
<p>>Admin > About > Update :</p>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <form method="post" action="{{ route('dashboard.about.update') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-dark">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card_header"><i class="fa-brands fa-servicestack header_icon"></i> Update
                                About</h3>
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
                                <label class="col-form-label input_name"> About Title <span class="err">*</span>
                                    :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="title" value="{{ $about->abo_title }}">
                                @error('title')
                                    <span class="text-danger invalid_msg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3 text-end">
                                <label class="col-form-label input_name"> About Subtitle <span class="err">*</span>
                                    :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="subtitle"
                                    value="{{ $about->abo_subtitle }}">
                                @error('subtitle')
                                    <span class="text-danger invalid_msg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3 text-end">
                                <label class="col-form-label input_name"> About Detail <span class="err">*</span>
                                    :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="detail"
                                    value="{{ $about->abo_detail }}">
                                @error('detail')
                                    <span class="text-danger invalid_msg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3 text-end">
                                <label class="col-form-label input_name"> About Button <span class="err">*</span>
                                    :</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="btn" value="{{ $about->abo_btn }}">
                                @error('btn')
                                    <span class="text-danger invalid_msg">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3 text-end">
                                <label class="col-form-label input_name"> About Picture <span class="err">*</span>
                                    :</label>
                            </div>
                            <div class="col-md-3">
                                <input type="file" class="form-control" name="image" value="">
                                @error('image')
                                    <span class="text-danger invalid_msg">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                @if($about->abo_pic!='')
                                    <img src="{{ asset('uploads/admin/about/'.$about->abo_pic) }}"
                                        class="img-fluid" height="200px" width="200px" style="oobject-fit:cover;">
                                @else
                                    <img src="{{ asset('uploads/admin/about/hero.png') }}"
                                        class="img-fluid" height="200px" width="200px" style="oobject-fit:cover;">
                                @endif
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
