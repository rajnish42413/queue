@extends('layouts.app')

@section('title', trans('messages.add').' '.trans('messages.company.company'))

@section('content')
    <div id="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title col s5" style="margin:.82rem 0 .656rem">{{ trans('messages.add') }} {{ trans('messages.company.company') }}</h5>
                    <ol class="breadcrumbs col s7 right-align">
                        <li><a href="{{ route('dashboard') }}">{{ trans('messages.mainapp.menu.dashboard') }}</a></li>
                        <li><a href="{{ route('company.index') }}">{{ trans('messages.company.company') }}</a></li>
                        <li class="active">{{ trans('messages.add') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3" style="padding-top:10px;padding-bottom:10px">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title" style="line-height:0;font-size:22px">{{ trans('messages.company.company') }} {{ trans('messages.add') }}</span>
                            <div class="divider" style="margin:10px 0 10px 0"></div>
                            <form id="company" action="{{ route('company.store') }}" method="post">
                                {{ csrf_field() }}
                               <div class="row">
                                    <div class="input-field col s12">
                                        <label for="name">{{ trans('messages.name') }}</label>
                                        <input id="name" type="text" name="name" placeholder="{{ trans('messages.name') }}" value="" data-error=".cname">
                                        <div class="cname">
                                            @if($errors->has('name'))<div class="error">{{ $errors->first('name') }}</div>@endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="email">{{ trans('messages.users.email') }}</label>
                                        <input id="email" type="text" name="email" placeholder="{{ trans('messages.users.email') }}" value="" data-error=".cemail">
                                        <div class="cemail">
                                            @if($errors->has('email'))<div id="name-error" class="error">{{ $errors->first('email') }}</div>@endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="address">{{ trans('messages.company.address') }}</label>
                                        <textarea id="address" class="materialize-textarea" name="address" placeholder="{{ trans('messages.company.address') }}" data-error=".address" style="min-height:67px"></textarea>
                                        <div class="address">
                                            @if($errors->has('address'))<div class="error">{{ $errors->first('address') }}</div>@endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="phone">{{ trans('messages.company.phone') }}</label>
                                        <input id="phone" type="text" name="phone" placeholder="{{ trans('messages.company.phone') }}" value="" data-error=".phone">
                                        <div class="phone">
                                            @if($errors->has('phone'))<div id="name-error" class="error">{{ $errors->first('phone') }}</div>@endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="location">{{ trans('messages.company.location') }}</label>
                                        <input id="location" type="text" name="location" placeholder="{{ trans('messages.company.location') }}" value="" data-error=".location">
                                        <div class="location">
                                            @if($errors->has('location'))<div id="name-error" class="error">{{ $errors->first('location') }}</div>@endif
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light right" type="submit">
                                            {{ trans('messages.save') }}<i class="mdi-action-swap-vert left"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
 $("#company").validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        email: true
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
