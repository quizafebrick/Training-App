$('.delete-btn').click(function() {
        var student_id = $(this).attr('data-id');
        var student_name = $(this).attr('data-name');
        Swal.fire({
            title: "Are you sure you want to Delete?",
            text: "Once deleted, this student " + student_name + " will permanenty deleted",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            })
            .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    window.location = "/a/delete-student/" + student_id + ""
                }
            });
    })
