@extends('tenant.shared-partials.app')
@section('title', 'Create a Tenant')
@section('body')

				@php
								$options = [['label' => 'User', 'value' => 'user'], ['label' => 'Admin', 'value' => 'admin']];
				@endphp
				<x-page-heade pageTitle="Create a Tenant" :breadcrumb="$breadcrumb"></x-page-heade>

				<x-from-layout route="tenants.store" title="Add a New Tenant">

								<div class="my-4 w-full">
												<h3 class="text-base font-bold dark:text-white">Owner Details</h3>
								</div>
								<div></div>
								<hr>
								<hr>
								<x-input-box name="full_name" required="1" value="" label="Full Name"></x-input-box>
								<x-input-box name="email" required="1" value="" label="Email"></x-input-box>
								<x-input-box name="password" required="1" value="" label="Password"></x-input-box>
								<x-input-box name="password_confirmation" required="1" value="" label="Password Confirmation"></x-input-box>
								<x-input-box name="phone_number" required="" value="" label="Phone Number"></x-input-box>
								<x-input-box name="postal_code" required="" value="" label="Postal Code"></x-input-box>
								<x-select-box :options="$options" label="Role" name="role" value="" required="1"></x-select-box>
								<div></div>
								<div class="my-4 w-full">
												<h3 class="text-base font-bold dark:text-white">Tenant Details</h3>
								</div>
								<div></div>
								<hr>
								<hr>
								<x-input-box name="tenant_id" required="1" value="" label="Tenant Sub Domain"></x-input-box>

				</x-from-layout>

@endsection
