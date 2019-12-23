@extends('layouts/app')

@section('title_page')
    Mentor - 
@endsection

@section('title')
    Mentor
@endsection

@section('breadcrumb')
@parent
    <li>Mentor</li>
@endsection

@section('content') 

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Mentor </h3>
                <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle "></i> Tambah</a>
                <a onclick="deleteAll()" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
            </div>
            <div class="box-body">
                <form method="post" id="form-produk">
                    {{ csrf_field() }}
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="20"><input type="checkbox" value="1" id="select-all"></th>
                        <th width="20">No</th>
                        <th width="100">Mentor</th>
                        <th width="100">Aksi</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

@include('mentor/form')

@endsection

@section('script')
<script type="text/javascript">
    var table, save_method;
    $(function fetchdata(){
        table = $('.table').DataTable({
        "autoWidth": false,
        "responsive": true,
        "processing" : true,
        "serverside" : true,
        "ajax" : {
            "url" : "{{ route('mentor/show') }}",
            "type" : "GET"
        },
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false
            }],
            'order': [1, 'asc']
        }); 
    });

    $(function(){
        $('#select-all').click(function(){
            $('input[type="checkbox"]').prop('checked', this.checked);
        });

        $('#modal-form form').validator().on('submit', function(e){
            if(!e.isDefaultPrevented()){
            var id = $('#id').val();
            if(save_method == "add") url = "{{route('mentor/store')}}";
            else url = "mentor/"+id;
            
            $.ajax({
                url : url,
                type : "POST",
                data : $('#modal-form form').serialize(),
                dataType: 'JSON',
                success : function(data){
                if(data.msg=="error"){
                    alert('Kelas sudah ada!');
                    $('#id').focus().select();
                }else{
                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                }            
                },
                error : function(){
                alert("Tidak dapat menyimpan data!");
                }   
            });
            return false;
        }
        });
    });

    function addForm(){
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();            
        $('.modal-title').text('Tambah Pelajaran');
        $('#kuota').attr('readonly', false);
    }

    function editForm(id){
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
        url : "mentor/"+id+"/edit",
        type : "GET",
        dataType : "JSON",
        success : function(data){
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Nama');
            
            $('#id').val(data[0].id_mentor);
            $('#mentor').val(data[0].mentor);

        },
        error : function(){
            alert("Tidak dapat menampilkan data!");
        }
        });
    }

    function deleteData(id){
        if(confirm("Apakah yakin data akan dihapus?")){
        $.ajax({
            url : "mentor/"+id,
            type : "POST",
            data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
            success : function(data){
            table.ajax.reload();
            },
            error : function(){
            alert("Tidak dapat menghapus data!");
            }
        });
        }
    }

    function deleteAll(){
        if($('input:checked').length < 1){
        alert('Pilih data yang akan dihapus!');
        }else if(confirm("Apakah yakin akan menghapus semua data terpilih?")){
        $.ajax({
            url : "mentor/delete",
            type : "POST",
            data : $('#form-produk').serialize(),
            success : function(data){
            table.ajax.reload();
            },
            error : function(){
            alert("Tidak dapat menghapus data!");
            }
        });
        }
    }

    $(document).ready(function(table) {
        setInterval(fetchdata, 3000);
    });
</script>

@endsection