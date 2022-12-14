@extends('layouts.app')
@section('content')
<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Student Details</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        @if ($message = Session::get('success'))
                        <div class="alert border-0 alert-dismissible fade show py-2">
                            <div class="alert alert-success">
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-dark">Success Alerts</h6>
                                        <div class="text-dark">{{ $message }}</div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <?php $i=1 ?>
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <div class="pb-3">
                                            <a href="{{ route('admin.student.create') }}">
                                                <button type="button" class="data-toggle-action-tooltip btn btn-outline-primary btn-circle btn-sm confirm-action-primary">New Student</button>
                                            </a>
                                        </div>
                                            <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Reporting Teacher</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            @foreach ($student_details as $data)
                                                <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $data->name}}</td>
                                                <td>{{ $data->age}}</td>
                                                <td><?php if ($data->gender == 0){ echo "Male"; } else{ echo "Female"; } ?> </td>
                                                <td>{{ $data->teachername}}</td>
                                                <td>
                                                    <a class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm confirm-action-success"data-bs-toggle="modal" data-bs-target="#editModal"onclick="edit( {{ $data }} )" href="{{ route('admin.student.edit',$data->id) }}">Edit</a>
                                                    <button type="button"onclick="sweet_form({{$data->id}})" class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger" >Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div><!-- container -->
                </div><!-- page-->
            </div><!-- main content -->
    
             <!-- view modal -->
             <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 650px;">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                    <form id="formsubmit" method="POST" enctype="multipart/form-data">
                                   @csrf
                                        <input type="hidden" id="InputId" name="InputId"/>
                                        
                                       
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label>Name:</label>
                                                    <div>
                                                        <input type="text"  id="InputName" name="InputName" class="form-control" required /> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label>Age:</label>
                                                    <div>
                                                        <input type="number"  id="InputAge" name="InputAge" class="form-control" required /> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label>Gender:</label>
                                                    <div>
                                                        <select id="InputGender" name="InputGender" class="form-control"required>
                                                            <option value=""> -- Select One --</option>
                                                            <option value="1" @if(old('InputGender')== '1') selected @endif>Female</option>
                                                            <option value="0"@if(old('InputGender')== '0') selected @endif>Male</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label>Reporting Teacher:</label>
                                                    <select name="InputTeacher" id="InputTeacher" class="form-control" required>
                                                        <option value=""> -- Select One --</option>
                                                        @foreach ($teachers as $data)
                                                            <option value="{{ $data->id }}"@if(old('InputTeacher')== '{{ $data->id }}') selected @endif>{{ $data->name }}</option>
                                                        @endforeach 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-0">
                                            <div>
                                                <button type="button"id="form_submit" class="btn btn-primary waves-effect waves-light me-1">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div> <!-- end col -->
                        </div> <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('script')
<script>
        function edit(val){
            $('#InputId').val(val.id);
            $('#InputName').val(val.name);
            $('#InputAge').val(val.age);
            $('#InputGender').val(val.gender);
            console.log(val.gender);
            $('#InputTeacher').val(val.reporting_teacher);

        };
        function sweet_form(id){
            var red = "{{ url('admin/removeStudent') }}/"+id ;
            swal.fire({
                title: 'Are you sure to delete?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#28a745',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, cancel!',
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(location).attr('href', red);
                }
            })			
	    }
</script>
<script>
    $('#form_submit').on('click', function() {
        var name = $('#InputName').val();
        var age = $('#InputAge').val();
        var id = $('#InputId').val();
        var gender = $('#InputGender').val();
        var teacher = $('#InputTeacher').val();
        console.log(id);
        $.ajax({
            url: "{{ route('admin.studentUpdate') }}",
            type:'POST',
            data: {
                _token:"{{ csrf_token() }}",
                InputName : name,
                InputAge : age,
                InputGender : gender,
                InputId : id,
                InputTeacher : teacher,
                },
            success: function (response){
                $('#editModal').hide(); 
                Swal.fire({
                icon: 'success',
                title: 'saved',
                showConfirmButton: false,
                })
                location.reload();
            },
            error: function (response) {

            }
        });
    });
    </script>
@endsection
