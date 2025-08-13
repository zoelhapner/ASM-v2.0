@extends('tablar::page') {{-- Atau sesuaikan dengan layout Tabler kamu --}}

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            {{-- Sidebar Navigasi --}}
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="list-group list-group-transparent">
                            
                            
                            <a href="#" 
                                class="list-group-item list-group-item-action"
                                data-tab="profile"
                                data-url="{{ route('employees.profile', $employee->id) }}">
                                    Data Diri
                            </a>

                            <a href="#" 
                                class="list-group-item list-group-item-action"
                                data-tab="educations"
                                data-url="{{ route('employees.educations', $employee->id) }}">
                                    Riwayat Pendidikan
                            </a>

                            <a href="#" 
                                class="list-group-item list-group-item-action"
                                data-tab="workers"
                                data-url="{{ route('employees.workers', $employee->id) }}">
                                    Riwayat Pekerjaan
                            </a>

                            <a href="#" 
                                class="list-group-item list-group-item-action"
                                data-tab="families"
                                data-url="{{ route('employees.families', $employee->id) }}">
                                    Data Keluarga
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Konten Dinamis --}}
            <div class="col-md-9" id="tab-content">
                @if (request('tab') == 'educations')
                    @include('employees.tab.educations')
                @else
                    @include('employees.tab.profile')
                @endif
            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    $('.list-group-item').click(function (e) {
        e.preventDefault();

        const url = $(this).data('url');
        const $container = $('#tab-content');

        // Set active class
        $('.list-group-item').removeClass('active');
        $(this).addClass('active');

        // Load tab content via AJAX
        $.get(url, function (res) {
            $container.html(res);
        }).fail(function () {
            $container.html('<div class="alert alert-danger">Gagal memuat data.</div>');
        });
    });
});
</script>

<script>
    $(function () {
        const tab = "{{ session('tab') }}";

        if (tab) {
            const $target = $(`a[data-tab="${tab}"]`);

            if ($target.length) {
                $target.trigger('click');
            }
        }
    });
</script>

<script>
function confirmDelete(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Hapus data?',
        text: "Data akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.submit();
        }
    });
}
</script>


@endsection
