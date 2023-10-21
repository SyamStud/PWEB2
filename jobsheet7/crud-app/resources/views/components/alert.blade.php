@if ($errors->any())
    <script>
        Toast.fire({
            icon: 'error',
            title: 'Seluruh data wajib diisi'
        })
    </script>
@endif

@if (Session::has('addSuccess'))
    <script>
        Toast.fire({
            icon: 'success',
            title: 'Data berhasil ditambahkan'
        })
    </script>
@endif

@if (Session::has('editSuccess'))
    <script>
        Toast.fire({
            icon: 'success',
            title: 'Data berhasil diedit'
        })
    </script>
@endif

@if (Session::has('deleteSuccess'))
    <script>
        Toast.fire({
            icon: 'success',
            title: 'Data berhasil dihapus'
        })
    </script>
@endif