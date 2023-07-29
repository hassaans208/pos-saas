@extends('central.admin.shared-partials.app')
@section('main')
    <div class="m-4">
        @yield('body')
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dark-mode').click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('central.theme') }}",
                    data: '',
                    success: function(data) {
                        // $("#html").load(location.href + "/#html");
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endpush
