<script type="text/javascript">
    
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
        table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf']
        });
        table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
    });

    function add(){
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('#form').attr('action', 'holiday/store');
    }

    function ganti(id){
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Ganti Barang'); // Set title to Bootstrap modal title
        
        //Ajax Load data from ajax
        $.ajax({
            url : "holiday/change/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data2){
                $('[name="hari"]').val(data2.hari);
                $('[name="tgl"]').val(data2.tgl);
                $('#form').attr('action', 'holiday/update/'+data2.id);
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data');
            }
        });
    }

</script>