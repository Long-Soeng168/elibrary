@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Thesis Topics')" />
        @livewire('thesis-category-table-data')
    </div>
@endsection
