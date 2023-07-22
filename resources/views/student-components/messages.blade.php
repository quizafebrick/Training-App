{{-- ! ERROR MESSAGE ! --}}
@if ($errors->any())
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            background: '#f64341',
            color: '#ffff',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.resumeTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: "There's something wrong..."
        })
    </script>
@endif

@if (Session::has('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            background: '#f64341',
            color: '#ffff',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.resumeTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: "{{ Session::get('error') }}"
        })
    </script>
@endif

{{-- * SUCCESS MESSAGE * --}}
@if (Session::has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            background: '#59b259',
            color: '#ffff',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.resumeTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: "{{ session()->get('success') }}"
        })
    </script>
@endif
