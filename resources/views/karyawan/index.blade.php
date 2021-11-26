@extends('layouts.main')

@section('tittle')
    Karyawan
@endsection

@section('page_name')
    Karyawan
@endsection

@section('optional-btn')
    <div class="btn-group float-right m-t-15">
        {{-- <button type="button" class="btn btn-outline-dark waves-effect waves-light" onclick="reload();"><span class="m-l-5"><i class="fa fa-repeat"></i></span> Reload </button> --}}
        <button type="button" class="btn btn-outline-dark waves-effect waves-light" onclick="add();"><span class="m-l-5"><i class="fa fa-plus"></i></span> Karyawan </button>
    </div>
@endsection

@section('content')

@include('karyawan.script')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <table id="example" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Telp</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $emp)
                    <tr>
                        <th>{{ $emp->nik }}</th>
                        <th>{{ $emp->nama }}</th>
                        <th>{{ $emp->telp }}</th>
                        <th>{{ $emp->email }}</th>
                        <th>{{ $emp->alamat }}</th>
                        <th>
                            <div style="text-align: center;" class="button-list">
                                <a class="btn btn-warning" href="shiftshow/{{ $emp->id }}" title="Edit" ><i class="glyphicon glyphicon-pencil"></i> Shift</a>&nbsp;
                                <a class="btn btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('{{ $emp->id }}')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>&nbsp;
                                <form action="karyawan/delete/{{ $emp->id }}" method="POST" class="d-inline">
                                @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Delete</button>
                                </form>
                                {{-- <a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('{{ $emp->id }}')"><i class="glyphicon glyphicon-trash"></i> Delete</a> --}}
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end row -->

<!-- End content-page -->
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<!-- Bootstrap modal -->
<div class="modal fade bs-example-modal-lg" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="karyawan/store" method="POST" id="form" class="form-horizontal">
                    @csrf
                    <input type="hidden" value="" id="status" name="status"/> 
                    <div class="form-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label col-md-12">NIK</label>
                                    <div class="col">
                                        <input id="nik" name="nik" class="form-control" type="text" placeholder="NIK">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Nama Karyawan</label>
                                    <div class="col">
                                        <input id="nama" name="nama" class="form-control" type="text" placeholder="Nama Karyawan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Email</label>
                                    <div class="col">
                                        <input id="email" name="email" class="form-control" type="email" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">No Tlp</label>
                                    <div class="col">
                                        <input id="telp" name="telp" class="form-control" type="text" placeholder="No Tlp">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Alamat</label>
                                    <div class="col">
                                        <textarea class=" form-control" name="alamat" id="alamat" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- file uploads js -->
<script src="plugins/fileuploads/js/dropify.min.js"></script>

<script>
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong appended.'
        },
        error: {
            'fileSize': 'The file size is too big (1M max).'
        }
    });
</script>
@endsection