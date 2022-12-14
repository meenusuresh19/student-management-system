 
@extends('layouts.app')
@section('content')
            <div class="main-content">

                <div class="page-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.student_marklist') }}">Student Marks</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New</li>
                    </ol>
                    </nav>
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">New Student Marks</h4>

                                    <div class="page-title-right">
                                    <input type="button" class="data-toggle-action-tooltip btn btn-outline-primary btn-circle btn-sm confirm-action-primary" value="Back" onclick="history.back()">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert border-0 alert-dismissible fade show py-2">
                                <div class="alert alert-danger">
                                        <div class="ms-3">
                                            <h6 class="mb-0 text-dark">Danger Alerts</h6>
                                            <div class="text-dark">{{ $message }}</div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                        <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                    <form action="{{ route('admin.markstore') }}" method="POST"class="custom-validation" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>name</label>
                                                    <div>
                                                        <select name="InputName" id="InputName" class="form-control" required>
                                                            <option value=""> -- Select One --</option>
                                                            @foreach ($students as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                            @endforeach 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label>Term</label>
                                                    <div>
                                                        <select name="InputTerm" id="InputTerm" class="form-control" required>
                                                            <option value=""> -- Select One --</option>
                                                            @foreach ($term as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                            @endforeach 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label>Maths Mark</label>
                                                    <div>
                                                        <input type="number"id="InputMaths" name="InputMaths" class="form-control"value="{{ old('InputMaths') }}" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label>Science Mark</label>
                                                    <div>
                                                        <input type="number"id="InputScience" name="InputScience" class="form-control"value="{{ old('InputScience') }}" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label>History Mark</label>
                                                    <div>
                                                        <input type="number"id="InputHistory" name="InputHistory" class="form-control"value="{{ old('InputHistory') }}" required/>
                                                    </div>
                                                </div>
                                            </div>
                                             
                                        </div>
                                        <div class="mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div><!-- container-->
                </div><!-- page -->
            </div><!-- main-->
@endsection