@extends('layouts.main')

@section('tittle')
    Libur Nasional
@endsection

@section('page_name')
    Libur Nasional
@endsection

@section('optional-btn')
    <div class="btn-group float-right m-t-15">
        <button type="button" class="btn btn-outline-dark waves-effect waves-light" onclick="add();"><span class="m-l-5"><i class="fa fa-plus"></i></span> Libur Nasional </button>
    </div>
@endsection

@section('content')

@include('libur.script')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <table id="example" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Tgl</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($holiday as $hld)
                    <tr>
                        <th>{{ $hld->hari }}</th>
                        <th>{{ $hld->tgl }}</th>
                        <th>
                            <div style="text-align: center;" class="button-list">
                                <a class="btn btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('{{ $hld->id }}')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>&nbsp;
                                <form action="holiday/delete/{{ $hld->id }}" method="POST" class="d-inline">
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
                <form action="holiday/store" method="POST" id="form" class="form-horizontal">
                    @csrf
                    <input type="hidden" value="" id="status" name="status"/> 
                    <div class="form-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Tgl Libur Nasional</label>
                                    <div class="col">
                                        <input id="tgl" name="tgl" class="form-control" type="date">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Hari Libur</label>
                                    <div class="col">
                                        <textarea class=" form-control" name="hari" id="hari" ></textarea>
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