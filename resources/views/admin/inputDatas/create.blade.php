@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.inputData.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.input-datas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama_input_proses_data">{{ trans('cruds.inputData.fields.nama_input_proses_data') }}</label>
                <input class="form-control {{ $errors->has('nama_input_proses_data') ? 'is-invalid' : '' }}" type="text" name="nama_input_proses_data" id="nama_input_proses_data" value="{{ old('nama_input_proses_data', '') }}" required>
                @if($errors->has('nama_input_proses_data'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_input_proses_data') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputData.fields.nama_input_proses_data_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="data_satus">{{ trans('cruds.inputData.fields.data_satu') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('data_satus') ? 'is-invalid' : '' }}" name="data_satus[]" id="data_satus" multiple required>
                    @foreach($data_satus as $id => $data_satu)
                        <option value="{{ $id }}" {{ in_array($id, old('data_satus', [])) ? 'selected' : '' }}>{{ $data_satu }}</option>
                    @endforeach
                </select>
                @if($errors->has('data_satus'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_satus') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputData.fields.data_satu_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="data_duas">{{ trans('cruds.inputData.fields.data_dua') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('data_duas') ? 'is-invalid' : '' }}" name="data_duas[]" id="data_duas" multiple required>
{{--                    @foreach($data_duas as $id => $data_dua)--}}
{{--                        <option value="{{ $id }}" {{ in_array($id, old('data_duas', [])) ? 'selected' : '' }}>{{ $data_dua }}</option>--}}
{{--                    @endforeach--}}
                </select>
                @if($errors->has('data_duas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_duas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputData.fields.data_dua_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="data_tigas">{{ trans('cruds.inputData.fields.data_tiga') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('data_tigas') ? 'is-invalid' : '' }}" name="data_tigas[]" id="data_tigas" multiple required>
{{--                    @foreach($data_tigas as $id => $data_tiga)--}}
{{--                        <option value="{{ $id }}" {{ in_array($id, old('data_tigas', [])) ? 'selected' : '' }}>{{ $data_tiga }}</option>--}}
{{--                    @endforeach--}}
                </select>
                @if($errors->has('data_tigas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_tigas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputData.fields.data_tiga_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="data_empats">{{ trans('cruds.inputData.fields.data_empat') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('data_empats') ? 'is-invalid' : '' }}" name="data_empats[]" id="data_empats" multiple required>
{{--                    @foreach($data_empats as $id => $data_empat)--}}
{{--                        <option value="{{ $id }}" {{ in_array($id, old('data_empats', [])) ? 'selected' : '' }}>{{ $data_empat }}</option>--}}
{{--                    @endforeach--}}
                </select>
                @if($errors->has('data_empats'))
                    <div class="invalid-feedback">
                        {{ $errors->first('data_empats') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inputData.fields.data_empat_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
        var myResponse = [];
        var valuePertamaID = [];
        var valueKeduaID = [];
        var valueKetigaID = [];
        var namaDataSatu =[];
        var namaDataDua = [];
        var namaDataDuaByID =[];
        var namaDataTigaByID = [];

        $("#data_satus").change(function() {valuePertamaID = jQuery(this).val();
            namaDataSatu = [];
            // namaDataDua = [];
                jQuery.ajax({
                    url : 'getDatasSatu/' + valuePertamaID,
                    type : "GET",
                    dataType : "json",
                    success:function(response)
                    {
                        if(response){
                            myResponse = response
                            $.each(response, function(key, course){
                                console.log("INI KEY",course)
                                namaDataSatu.push(course);
                                console.log("DAH AH",namaDataSatu)
                            });

                            console.log(namaDataSatu,"DZUL PI KAR")
                            jQuery.ajax({
                                url : 'getDatasDua/' + namaDataSatu,
                                type : "GET",
                                dataType : "json",
                                success:function(responseNew)
                                {
                                    if(responseNew){
                                        console.log("KAWOAWKOAWKO",responseNew);
                                        jQuery('select[id="data_duas"]').empty();
                                        jQuery.each(responseNew, function(key,value){
                                            $('select[id="data_duas"]').append('<option value="'+ key +'">'+ value +'</option>');
                                        });
                                    }
                                    else
                                    {
                                        $('select[id="data_duas"]').empty();
                                    }
                                }
                            });
                        }
                    }
                });
            console.log(namaDataSatu,"HEHEH",myResponse)
        });

        jQuery('select[id="data_duas"]').change(function() {valueKeduaID = jQuery(this).val();
            namaDataDuaByID = [];
            // namaDataDua = [];
            jQuery.ajax({
                url : 'getDatasDuaByID/' + valueKeduaID,
                type : "GET",
                dataType : "json",
                success:function(response)
                {
                    if(response){
                        myResponse = response
                        $.each(response, function(key, value){
                            namaDataDuaByID.push(value);
                        });
                        console.log(namaDataDuaByID,"hohehohe")

                        jQuery.ajax({
                            url : 'getDatasTiga/' + namaDataDuaByID,
                            type : "GET",
                            dataType : "json",
                            success:function(responseNew)
                            {
                                if(responseNew){
                                    console.log("KAWOAWKOAWKO",responseNew);
                                    jQuery('select[id="data_tigas"]').empty();
                                    jQuery.each(responseNew, function(key,value){
                                        $('select[id="data_tigas"]').append('<option value="'+ key +'">'+ value +'</option>');
                                    });
                                }
                                else
                                {
                                    $('select[id="data_tigas"]').empty();
                                }
                            }
                        });
                    }
                }
            });
        });

        jQuery('select[id="data_tigas"]').change(function() {valueKetigaID = jQuery(this).val();
            namaDataTigaByID = [];
            // namaDataDua = [];
            jQuery.ajax({
                url : 'getDatasTigaByID/' + valueKetigaID,
                type : "GET",
                dataType : "json",
                success:function(response)
                {
                    if(response){
                        myResponse = response
                        $.each(response, function(key, value){
                            namaDataTigaByID.push(value);
                        });
                        console.log(namaDataTigaByID,"WOIWOIOWWOIWOI")

                        jQuery.ajax({
                            url : 'getDatasEmpat/' + namaDataTigaByID,
                            type : "GET",
                            dataType : "json",
                            success:function(responseNew)
                            {
                                if(responseNew){
                                    console.log("KAWOAWKOAWKO",responseNew);
                                    jQuery('select[id="data_empats"]').empty();
                                    jQuery.each(responseNew, function(key,value){
                                        $('select[id="data_empats"]').append('<option value="'+ key +'">'+ value +'</option>');
                                    });
                                }
                                else
                                {
                                    $('select[id="data_empats"]').empty();
                                }
                            }
                        });
                    }
                }
            });
        });

    });
</script>

@endsection
