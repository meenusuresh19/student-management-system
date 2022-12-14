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
                                    <h4 class="mb-sm-0">Student Mark</h4>
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
                                            <a href="{{ route('admin.createMark') }}">
                                                <button type="button" class="data-toggle-action-tooltip btn btn-outline-primary btn-circle btn-sm confirm-action-primary">New Student</button>
                                            </a>
                                        </div>
                                            <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Student Name</th>
                                                <th>Maths</th>
                                                <th>Science</th>
                                                <th>History</th>
                                                <th>Term</th>
                                                <th>Total Mark</th>
                                                <th>Created On</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            @foreach ($student_mark as $data)
                                                <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $data->student->name}}</td>
                                                <td>{{ $data->maths}}</td>
                                                <td>{{ $data->science}}</td>
                                                <td>{{ $data->history}}</td>
                                                <td>{{ $data->term_name}}</td>
                                                <td>{{ $data->maths + $data->science +$data->history}}</td>
                                                <td>{{ $data->created_at}}</td>
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
                        <h5 class="modal-title" id="exampleModalLabel">View </h5>
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
                                                    <label>Student Name:</label>
                                                    <div>
                                                        <select name="InputName" id="InputName" class="form-control" required>
                                                            <option value=""> -- Select One --</option>
                                                            @foreach ($student_mark as $data)
                                                                <option value="{{ $data->student->id }}"@if(old('InputName')== '{{ $data->student->id }}') selected @endif>{{ $data->student->name }}</option>
                                                            @endforeach 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label>Term:</label>
                                                    <div>
                                                        <select name="InputTerm" id="InputTerm" class="form-control" required>
                                                            <option value=""> -- Select One --</option>
                                                            @foreach ($term as $data)
                                                                <option value="{{ $data->id }}"@if(old('InputTerm')== '{{ $data->id }}') selected @endif>{{ $data->name }}</option>
                                                            @endforeach 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label>Maths Mark:</label>
                                                    <input type="number"id="InputMaths" name="InputMaths" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label>Science Mark:</label>
                                                    <input type="number"id="InputScience" name="InputScience" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label>History Mark:</label>
                                                    <input type="number"id="InputHistory" name="InputHistory" class="form-control" required/>
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
            $('#InputName').val(val.student_id);
            $('#InputMaths').val(val.maths);
            $('#InputHistory').val(val.history);
            $('#InputScience').val(val.science);
            $('#InputTerm').val(val.term);
            // $('#InputTeacher').val(val.reporting_teacher);

        };
        function sweet_form(id){
            var red = "{{ url('admin/removeStudentmark') }}/"+id ;
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
        var maths = $('#InputMaths').val();
        var id = $('#InputId').val();
        var history = $('#InputHistory').val();
        var term = $('#InputTerm').val();
        var science = $('#InputScience').val();
        console.log(id);
        $.ajax({
            url: "{{ route('admin.studentMarkupdate') }}",
            type:'POST',
            data: {
                _token:"{{ csrf_token() }}",
                InputName : name,
                InputMaths : maths,
                InputId : id,
                InputHistory : history,
                InputTerm : term,
                InputScience : science,
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
