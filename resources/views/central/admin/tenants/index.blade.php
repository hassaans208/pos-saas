@extends('central.admin.partials.app')
@section('title', 'Tenants')
@section('body')
<x-page-heade pageTitle="Tenants" :breadcrumb="$breadcrumb"></x-page-heade>
<x-table-layout 
:collection="$table['collection']"
:title="$table['title']"
:head="$table['head']"
:row="$table['row']"
:delete="$table['delete']"
:edit="$table['edit']"
:create="$table['create']"
:createRoute="$table['create_route']"
:deleteRoute="$table['delete_route']"
:editRoute="$table['edit_route']"
:print="$table['print']"
:action="$table['action']"
:excel="$table['excel']"
:pdf="$table['pdf']"
:reload="$table['reload']"
:docx="$table['docx']"
:options="$table['options']"

>
</x-table-layout>
@endsection