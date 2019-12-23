@extends('layouts/app')

@section('title_page')
    Pendaftar - 
@endsection

@section('title')
    Pendaftar
@endsection

@section('breadcrumb')
@parent
    <li>Pendaftar</li>
@endsection

@section('content') 

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Pendaftar</h3>
                {{-- <a onclick="deleteAll()" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a> --}}
            </div>
            <div class="box-body">
                <form method="post" id="form-participant">
                        {{ csrf_field() }}
                        <table class="table table-striped">
                        <thead>
                        <tr>
                            {{-- <th width="20"><input type="checkbox" value="1" id="select-all"></th> --}}
                            <th width="20">No</th>
                            <th>Pelajaran</th>
                            <th>Gel</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Nama</th>
                            <th>Kota</th>
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

@include('pendaftar.form')

@endsection

@section('script')
<script type="text/javascript">
    var table, save_method;
    $(function(){
        table = $('.table').DataTable({
        "autoWidth": false,
        "responsive": true,
        "processing" : true,
        "serverside" : true,
        "ajax" : {
            "url" : "{{ route('register/show') }}",
            "type" : "GET"
        },
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false
            }],
            'order': [1, 'asc']
        }); 
        
        $('#select-all').click(function(){
            $('input[type="checkbox"]').prop('checked', this.checked);
        });

        $('#modal-form form').validator().on('submit', function(e){
            if(!e.isDefaultPrevented()){
            var id = $('#id').val();
            // if(save_method == "add") url = "route('participant.store')";
            // else
            // url = "participant/"+id;
            
            $.ajax({
                url : "participant/"+id,
                type : "POST",
                data : $('#modal-form form').serialize(),
                dataType: 'JSON',
                success : function(data){
                if(data.msg=="error"){
                    alert('Nomor ID sudah terdaftar!');
                    $('#nomor_id').focus().select();
                }else
                {
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

    // function addForm(){
    //     save_method = "add";
    //     $('input[name=_method]').val('POST');
    //     $('#modal-form').modal('show');
    //     $('#modal-form form')[0].reset();            
    //     $('.modal-title').text('Tambah Produk');
    //     $('#kode').attr('readonly', false);
    // }

    function editForm(id){
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
        url : "participant/"+id+"/edit",
        type : "GET",
        dataType : "JSON",
        success : function(data){
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Participant');
            
            $('#id').val(data[0].id_participant);
            $('#photo').val(data[0].image);
            $('#id_number').val(data[0].id_number).attr('readonly', true);
            $('#nama').val(data[0].name);
            $('#kelas').val(data[0].id_classname);
            $('#gelombang').val(data[0].student_date).attr('readonly', true);
            $('#month').val(data[0].student_month);
            $('#bulan').val(data[0].month).attr('readonly', true);
            $('#tahun').val(data[0].student_year).attr('readonly', true);
            $('#tanggal_lahir').val(data[0].birth_date).attr('readonly', true);
            $('#tempat_lahir').val(data[0].birth_place).attr('readonly', true);
            $('#kaos').val(data[0].t_shirt);
            $('#status').val(data[0].status_user);
            $('#phone').val(data[0].phone);
            $('#email').val(data[0].email);
            $('#kota').val(data[0].city);
            $('#alamat').val(data[0].address);
            
        },
        error : function(){
            alert("Tidak dapat menampilkan data!");
        }
        });
    }

    function deleteData(id){
        if(confirm("Apakah yakin data akan dihapus?")){
        $.ajax({
            url : "participant/"+id,
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

    // function deleteAll(){
    //     if($('input:checked').length < 1){
    //     alert('Pilih data yang akan dihapus!');
    //     }else if(confirm("Apakah yakin akan menghapus semua data terpilih?")){
    //     $.ajax({
    //         url : "participant/delete",
    //         type : "POST",
    //         data : $('#form-participant').serialize(),
    //         success : function(data){
    //         table.ajax.reload();
    //         },
    //         error : function(){
    //         alert("Tidak dapat menghapus data!");
    //         }
    //     });
    //     }
    // }

</script>

@endsection