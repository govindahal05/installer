@extends('layouts.master')

@section('title', trans('messages.environment.title'))
@section('container')

    <form method="post" action="{{ route('environmentSave') }}">
        <textarea class="textarea" name="envConfig">{{ $envConfig }}</textarea>

        <div class="buttons buttons--right">
             <button class="button button--light" type="submit">{{ trans('messages.environment.save') }}</button>
        </div>
    </form>
    @if(!isset($environment['errors']))
    <div class="buttons">
        <a class="button" href="{{ route('requirements') }}">
            {{ trans('messages.next') }}
        </a>
    </div>
    @endif
@stop
