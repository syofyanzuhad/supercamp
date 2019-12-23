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
    <label for="kelas" class="col-md-3 control-label">Kelas</label>
    <div class="col-md-6">
        <select id="kelas" type="text" class="form-control" name="kelas" required>
            <option value=""> -- Pelajaran-- </option>
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
    <label for="kuota" class="col-md-3 control-label">Kuota</label>
    <div class="col-md-3">
    <input id="kuota" type="number" class="form-control" name="kuota" autofocus required>
    <span class="help-block with-errors"></span>
    </div>
</div>

<div class="form-group">
    <label for="durasi" class="col-md-3 control-label">Durasi</label>
    <div class="col-md-3">
    <input id="durasi" type="text" class="form-control" name="durasi" autofocus required>
    <span class="help-block with-errors"></span>
    </div>
</div>
        
<div class="form-group">
    <label for="waktu" class="col-md-3 control-label">Gelombang</label>
    <div class="col-md-2">
        <select id="gelombang" type="text" class="form-control" name="gelombang" required>
            <option value=""> -- Gelombang-- </option>
            @for ($i = 1; $i < 5; $i++)
                @if ($i == $i)
                <option value="{{ $i }}" type="selected">G {{$i}}</option>                
                @endif
            @endfor
        </select>
        <span class="help-block with-errors"></span>
    </div>
    <div class="col-md-2">
        <select id="bulan" type="text" class="form-control" name="bulan" required>
            <option value=""> -- Bulan-- </option>
            @foreach($month as $list)
                @if ($list->id_month == $list->id_month)
                <option value="{{ $list->id_month }}" type="selected">{{ $list->month }}</option>                
                @endif
            @endforeach
        </select>
        <span class="help-block with-errors"></span>
    </div>
    <div class="col-md-2">
        <input id="tahun" type="text" class="form-control" name="tahun" required>
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

</div>
    
    <div class="modal-footer">
    <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
    </div>
    
    </form>

        </div>
    </div>
    </div>