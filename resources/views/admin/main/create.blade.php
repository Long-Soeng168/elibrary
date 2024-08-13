@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Create Main Menu')" class="p-4" />

        @livewire('main-create')

    </div>
@endsection
