@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.menu.title_singular') }}
    </div>
    <div class="card-body">
        <form action="{{ route("admin.menu.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('product') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.menu.fields.product') }}</label>

                <div class="mycheck">
                @foreach($results as $key => $result)
                        <input type="checkbox" id="{{$result->id}}" name="name" class="checkboxstyle" value="{{ old('status', isset($menu) ? $menu->status : '') }}">
                        {{$result->name}}

                    @endforeach
                </div>
                @if($errors->has('product'))
                    <p class="help-block">
                        {{ $errors->first('product') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.menu.fields.product_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('global.menu.fields.status') }}</label>
                <input type="checkbox" id="status" name="status" class="checkboxstyle" value="{{ old('status', isset($menu) ? $menu->status : '') }}">
                @if($errors->has('status'))
                    <p class="help-block">
                        {{ $errors->first('status') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.menu.fields.status_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cooking_date') ? 'has-error' : '' }}">
                <label for="cooking_date">{{ trans('global.menu.fields.cooking_date') }}</label>
                <input type="datetime-local" id="cooking_date" name="cooking_date" class="" value="{{ old('status', isset($menu) ? $menu->cooking_date : '') }}">
                @if($errors->has('cooking_date'))
                    <p class="help-block">
                        {{ $errors->first('cooking_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.menu.fields.cooking_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('delivery_itself') ? 'has-error' : '' }}">
                <label for="delivery_itself">{{ trans('global.menu.fields.delivery_itself') }}</label>
                <input type="checkbox" id="delivery_itself" name="delivery_itself" class="checkboxstyle" value="{{ old('delivery_itself', isset($menu) ? $menu->delivery_itself : '') }}">
                @if($errors->has('delivery_itself'))
                    <p class="help-block">
                        {{ $errors->first('delivery_itself') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.menu.fields.delivery_itself_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('free_delivery_radius') ? 'has-error' : '' }}">
                <label for="free_delivery_radius">{{ trans('global.menu.fields.free_delivery_radius') }}</label>
                <input type="number" id="free_delivery_radius" name="free_delivery_radius" class="form-control" value="{{ old('free_delivery_radius', isset($menu) ? $menu->free_delivery_radius : '') }}">
                @if($errors->has('free_delivery_radius'))
                    <p class="help-block">
                        {{ $errors->first('free_delivery_radius') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.menu.fields.free_delivery_radius_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('free_delivery_amount') ? 'has-error' : '' }}">
                <label for="free_delivery_amount">{{ trans('global.menu.fields.free_delivery_amount') }}</label>
                <input type="number" id="free_delivery_amount" name="free_delivery_amount" class="form-control" value="{{ old('free_delivery_amount', isset($menu) ? $menu->free_delivery_amount : '') }}">
                @if($errors->has('free_delivery_amount'))
                    <p class="help-block">
                        {{ $errors->first('free_delivery_amount') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.menu.fields.free_delivery_amount_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

<style>
    .mycheck {
        display: block;
    }
    .checkboxstyle {
        width: 25px;
        height: 25px;
        padding-bottom: 10px;
        padding-top: 10px;
        margin-left: 10px;
    }
</style>