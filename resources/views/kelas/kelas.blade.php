@extends('layouts/app')

@section('title_page')
    Kelas - 
@endsection

@section('title')
    Kelas
@endsection

@section('breadcrumb')
@parent
    <li>Kelas</li>
@endsection

@section('content') 

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Kelas </h3>
                <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle "></i> Tambah</a>
                <a onclick="deleteAll()" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
            </div>
            <div class="box-body">
                <form method="post" id="form-produk">
                    {{ csrf_field() }}
                    <table class="table table-responsive table-striped">
                    <thead>
                    <tr>
                        <th width="20"><input type="checkbox" value="1" id="select-all"></th>
                        <th width="20">No</th>
                        <th>Pelajaran</th>
                        <th>Kuota</th>
                        <th>Gelombang</th>
                        <th>Tanggal</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Durasi</th>
                        <th>Status</th>
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

@include('kelas.form')

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
                "url" : "{{ route('class/show') }}",
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
                if(save_method == "add") url = "{{route('class.store')}}";
                else url = "class/"+id;
                
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
            $('.modal-title').text('Tambah Kelas');
            $('#kuota').attr('readonly', false);
            $('#durasi').attr('readonly', false);
            $('#gelombang').attr('readonly', false);
            $('#bulan').attr('readonly', false);
            $('#tahun').attr('readonly', false);
        }

        function editForm(id){
            save_method = "edit";
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
            url : "class/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data){
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Kelas');
                
                $('#id').val(data[0].id);
                $('#kelas').val(data[0].subject).attr('readonly', false);
                $('#kuota').val(data[0].quota).attr('readonly', true);
                $('#durasi').val(data[0].duration).attr('readonly', true);
                $('#gelombang').val(data[0].class_wave).attr('readonly', true);
                $('#bulan').val(data[0].class_month).attr('readonly', true);
                $('#tahun').val(data[0].class_year).attr('readonly', true);
                $('#status').val(data[0].status_lesson);

            },
            error : function(){
                alert("Tidak dapat menampilkan data!");
            }
            });
        }

        function deleteData(id){
            if(confirm("Apakah yakin data akan dihapus?")){
            $.ajax({
                url : "class/"+id,
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
                url : "class/delete",
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