@extends('layouts.app')

@section('title', trans('messages.add').' '.trans('messages.mainapp.menu.counter'))

@section('content')
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem">{{ trans('messages.add') }} {{ trans('messages.mainapp.menu.counter') }}</h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="{{ route('dashboard') }}">{{ trans('messages.mainapp.menu.dashboard') }}</a></li>
                        <li><a href="{{ route('counters.index') }}">{{ trans('messages.mainapp.menu.counter') }}</a></li>
                        <li class="active">{{ trans('messages.add') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3" style="padding-top:10px;padding-bottom:10px">
                <a class="btn-floating waves-effect waves-light orange tooltipped right" href="{{ route('counters.index') }}" data-position="top" data-tooltip="{{ trans('messages.cancel') }}"><i class="mdi-navigation-arrow-back"></i></a>
                <form id="add" action="{{ route('counters.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="name">{{ trans('messages.name') }}</label>
                            <input id="name" type="text" name="name" placeholder="{{ trans('messages.mainapp.menu.counter') }} {{ trans('messages.name') }}" value="{{ old('name') }}" data-error=".name">
                            <div class="name">
                                @if($errors->has('name'))<div class="error">{{ $errors->first('name') }}</div>@endif
                            </div>
                        </div>
                    </div>


                  <div class="row">
                        <div class="input-field col s12">
                              <select class="browser-default" id="vendor" data-error=".vendor" name="vendor">
                                <option value="">Select User</option>
                                  @foreach($users as $key => $data)        
                                        <option value="{{$data->id}}">{{$data->username}}  </option> 
                                  @endforeach
                              </select>
                              <div class="vendor">
                                @if($errors->has('vendor'))<div class="error">{{ $errors->first('vendor') }}</div>@endif
                            </div>
                        </div>
                    </div>

                <div class="row">
                        <div class="input-field col s12">
                            <select class="browser-default" id="dep" data-error=".dep" name="dep">
                                 <option value="">Select {{ trans('messages.mainapp.menu.department') }}</option>
                            </select>
                            <div class="name">
                                @if($errors->has('dep'))<div class="error">{{ $errors->first('dep') }}</div>@endif
                            </div>
                        </div>
                </div>



                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light right" type="submit">
                                {{ trans('messages.save') }}<i class="mdi-content-save left"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("#add").validate({
            rules: {
                name: {
                    required: true
                },
                vendor: {
                    required: true
                },
                dep: {
                    required: true
                },
            },
            errorElement : 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });

$('#vendor').on('change',function(){
      var v_id =$(this).val();
      var _token = $('input[name="_token"]').val();
       if (v_id == '') 
     {
       $('#dep').prop('disabled',true);
     }
     else
     {
       $('#dep').prop('disabled',false);
       $.ajax({
            url:'{{ route('post_fetch') }}',
            type:"POST",
            data:{'v_id' : v_id,_token:_token,},
            dataType: 'json',
            success:function(result){
                 $('#dep').html(result);
            }
       });
     }
    });

</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
@endsection
