<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
    <form class="form-horizontal" 
    {{-- action="participant/1"  --}}
    data-toggle="validator" method="post">
    {{ csrf_field() }} {{ method_field('POST') }}
    
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
    <h3 class="modal-title"></h3>
    </div>
        
<div class="modal-body">

<input type="hidden" id="id" name="id">
<div class="form-group">
    <label for="photo" class="col-md-3 control-label">Foto</label>
    <div class="col-md-6">
    <input id="photo" type="text" class="form-control" name="photo" autofocus required>
    <span class="help-block with-errors"></span>
    </div>
</div>

<div class="form-group">
    <label for="id_number" class="col-md-3 control-label">Nomor ID</label>
    <div class="col-md-6">
    <input id="id_number" type="number" class="form-control" name="id_number" autofocus required>
    <span class="help-block with-errors"></span>
    </div>
</div>
        
<div class="form-group">
    <label for="nama" class="col-md-3 control-label">Nama</label>
    <div class="col-md-6">
    <input id="nama" type="text" class="form-control" name="nama" required>
    <span class="help-block with-errors"></span>
    </div>
</div>

<div class="form-group">
    <label for="kelas" class="col-md-3 control-label">Pelajaran</label>
    <div class="col-md-6">
    <select id="kelas" type="text" class="form-control" name="kelas" required>
        <option value=""> -- Pilih Pelajaran-- </option>
        @foreach($kelas as $list)
            @if ($list->id_classname == $list->id_classname)
            <option value="{{ $list->id_classname }}" type="selected">{{ $list->classname }}</option>                
            @endif
        @endforeach
    </select>
    <span class="help-block with-errors"></span>
    </div>
</div>

<div class="form-group">
    <label for="waktu" class="col-md-3 control-label">Gelombang</label>
    <div class="col-md-2">
        <input id="gelombang" type="number" class="form-control" name="gelombang" required>
        <span class="help-block with-errors"></span>
    </div>
    <div class="col-md-2">
        <input type="hidden" id="month" name="month">
        <input id="bulan" type="text" class="form-control" name="bulan" required>
        <span class="help-block with-errors"></span>
    </div>
    <div class="col-md-2">
        <input id="tahun" type="text" class="form-control" name="tahun" required>
        <span class="help-block with-errors"></span>
    </div>
</div>

<div class="form-group">
    <label for="phone" class="col-md-3 control-label">No Handphone</label>
    <div class="col-md-3">
    <input id="phone" type="number" class="form-control" name="phone" required>
    <span class="help-block with-errors"></span>
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-md-3 control-label">Email</label>
    <div class="col-md-3">
    <input id="email" type="email" class="form-control" name="email" required>
    <span class="help-block with-errors"></span>
    </div>
</div>

<div class="form-group">
    <label for="kota" class="col-md-3 control-label">Kota</label>
    <div class="col-md-3">
    <input id="kota" type="text" class="form-control" name="kota" required>
    <span class="help-block with-errors"></span>
    </div>
</div>

<div class="form-group">
    <label for="tanggal_lahir" class="col-md-3 control-label">Tempat Tanggal Lahir</label>
    <div class="col-md-3">
        <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" required>
        <span class="help-block with-errors"></span>
    </div>
    <div class="col-md-3">
        <input id="tanggal_lahir" type="text" class="form-control" name="tanggal_lahir" required>
        <span class="help-block with-errors"></span>
    </div>
</div>

<div class="form-group">
    <label for="alamat" class="col-md-3 control-label">Alamat</label>
    <div class="col-md-6">
    <input id="alamat" type="text" class="form-control" name="alamat" required>
    <span class="help-block with-errors"></span>
    </div>
</div>

<div class="form-group">
    <label for="status" class="col-md-3 control-label">Status</label>
    <div class="col-md-3">
        <select id="status" type="text" class="form-control" name="status" required>
            <option value=""> -- Pilih Status-- </option>
            @foreach($status as $list)
                @if ($list->id_status == $list->id_status)
                <option value="{{ $list->id_status }}" type="selected">{{ $list->status }}</option>                
                @endif
            @endforeach
        </select>
        <span class="help-block with-errors"></span>
    </div>
</div>

<div class="form-group">
    <label for="kaos" class="col-md-3 control-label">Kaos</label>
    <div class="col-md-2">
    <input id="kaos" type="text" class="form-control" name="kaos" required>
    <span class="help-block with-errors"></span>
    </div>
</div>

</div>
    
    <div class="modal-footer">
    <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
    </div>
    
    </form>

        </div>
    </div>
    </div>