@extends('layouts.app')

@section('title', trans('messages.add').' '.trans('messages.mainapp.menu.department'))

@section('content')
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem">{{ trans('messages.add') }} {{ trans('messages.mainapp.menu.department') }}</h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="{{ route('dashboard') }}">{{ trans('messages.mainapp.menu.dashboard') }}</a></li>
                        <li><a href="{{ route('departments.index') }}">{{ trans('messages.mainapp.menu.department') }}</a></li>
                        <li class="active">{{ trans('messages.add') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3" style="padding-top:10px;padding-bottom:10px">
                <a class="btn-floating waves-effect waves-light orange tooltipped right" href="{{ route('departments.index') }}" data-position="top" data-tooltip="{{ trans('messages.cancel') }}"><i class="mdi-navigation-arrow-back"></i></a>
                <form id="add" action="{{ route('departments.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="name">{{ trans('messages.name') }}</label>
                            <input id="name" type="text" name="name" placeholder="{{ trans('messages.mainapp.menu.department') }} {{ trans('messages.name') }}" value="{{ old('name') }}" data-error=".name">
                            <div class="name">
                                @if($errors->has('name'))<div class="error">{{ $errors->first('name') }}</div>@endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="letter">{{ trans('messages.department.letter') }}</label>
                            <input id="letter" type="text" name="letter" placeholder="{{ trans('messages.department.letter') }}" value="{{ old('letter') }}" data-error=".letter">
                            <div class="letter">
                                @if($errors->has('letter'))<div class="error">{{ $errors->first('letter') }}</div>@endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="start">{{ trans('messages.department.start') }}</label>
                            <input id="start" type="text" name="start" placeholder="{{ trans('messages.department.start') }}" value="{{ old('start') }}" data-error=".start">
                            <div class="start">
                                @if($errors->has('start'))<div class="error">{{ $errors->first('start') }}</div>@endif
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col s12">
                            <label for="Vendor"> Select User for this Department or Store</label>
                              <select class="browser-default" id="vendor" data-error=".dep" name="vendor">
                                  @foreach($users as $key => $data)        
                                        <option value="{{$data->id}}">{{$data->username}}  </option> 
                                  @endforeach
                              </select>
                              <div class="vendor">
                                @if($errors->has('vendor'))<div class="error">{{ $errors->first('vendor') }}</div>@endif
                            </div>
                        </div>
                    </div>

                    
                    @if (Auth::user()->role =="SA")
                        <div class="row">
                        <div class="col s12">
                            <label for="Vendor"> Select Company</label>
                              <select class="browser-default" id="company" data-error=".company" name="company">
                                  @foreach($companies as $data)        
                                        <option value="{{$data->id}}">{{$data->name}}  </option> 
                                  @endforeach
                              </select>
                              <div class="vendor">
                                @if($errors->has('company'))<div class="error">{{ $errors->first(' company') }}</div>@endif
                            </div>
                        </div>
                    </div>
                    @else
                    <input type="hidden" name="company" value="{{Auth::user()->company}}">
                    @endif
                   

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
                start: {
                    required: true,
                    digits: true
                },
                vendor: {
                    required: true,
                },
                company:{
                    required: true,
                }
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
    </script>
@endsection
