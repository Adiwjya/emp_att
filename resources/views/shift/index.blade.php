@extends('layouts.main')

@section('tittle')
    Shift
@endsection

@section('page_name')
    Shift
@endsection

@section('optional-btn')
    <div class="btn-group float-right m-t-15">
        <button type="button" class="btn btn-outline-dark waves-effect waves-light" onclick="add();"><span class="m-l-5"><i class="fa fa-plus"></i></span> Shift </button>
    </div>
@endsection

@section('content')

@include('shift.script')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <table id="example" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>Shift</th>
                        <th>Jam Mulai</th>
                        <th>Jam Berakhir</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shift as $sft)
                    <tr>
                        <th>{{ $sft->shift }}</th>
                        <th>{{ $sft->shift_start }}</th>
                        <th>{{ $sft->shift_end }}</th>
                        <th>
                            <div style="text-align: center;" class="button-list">
                                <a class="btn btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('{{ $sft->id }}')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>&nbsp;
                                <form action="shift/delete/{{ $sft->id }}" method="POST" class="d-inline">
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
                <form action="shift/store" method="POST" id="form" class="form-horizontal">
                    @csrf
                    <input type="hidden" value="" id="id" name="id"/> 
                    <div class="form-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Jenis Shift</label>
                                    <div class="col">
                                        <select class="form-control" id="shift" name="shift">
                                            <option value="Pagi">Pagi</option>
                                            <option value="Siang">Siang</option>
                                            <option value="Malam">Malam</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Jam Mulai</label>
                                    <div class="col">
                                        <input class="form-control" type="time" id="shift_start" name="shift_start">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Jam Berakhir</label>
                                    <div class="col">
                                        <input class="form-control" type="time" id="shift_end" name="shift_end">
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