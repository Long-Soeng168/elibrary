@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Main Menu')" />
        @livewire('main-table-data')
    </div>
@endsection
