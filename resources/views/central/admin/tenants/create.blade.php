@extends('tenant.admin.partials.app')
@section('title', 'Create a Tenant')
@section('body')

<x-page-heade pageTitle="Create a Tenant" :breadcrumb="$breadcrumb"></x-page-heade>
<x-from-layout route="" title="Add a New Tenant">
    <x-input-box name="full_name" required="" value="" label="Full Name"></x-input-box>
    <x-input-box name="new_name" required="" value="" label="Full Name"></x-input-box>
    <x-input-box name="full_name" required="" value="" label="Full Name"></x-input-box>
    <x-input-box name="full_name" required="" value="" label="Full Name"></x-input-box>
    <x-input-box name="full_name" required="" value="" label="Full Name"></x-input-box>

</x-from-layout>
       
@endsection
