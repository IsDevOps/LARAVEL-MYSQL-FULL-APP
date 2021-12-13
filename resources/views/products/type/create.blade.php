@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">@if(!empty($type)){{__('Update Type')}}@else{{__('Add Type')}}@endif</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{url('products/type')}}" class="btn btn-sm btn-primary">{{ __('< Back') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="post" action="@if(!empty($type)){{route('products.type.update', $type)}}@else{{route('products.type.store')}}@endif" autocomplete="off" >
                            @csrf
                            @if(!empty($type)) @method('put') @endif
                            <h6 class="heading-small text-muted mb-4">{{ __('Fill the informations below') }}</h6>
                            <div class="row pl-lg-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="{{ __('Name') }}" value="@if(!empty($type)){{$type->name}}@endif" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="created_by" name="created_by" value="{{Auth::id()}}" />
                            <input type="hidden" id="updated_by" name="updated_by" value="{{Auth::id()}}" />
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
