$(".delete-announcement-btn").click(function () {
    var announcement_id = $(this).attr("data-id");
    var announcement_title = $(this).attr("data-title");
    Swal.fire({
        title: "Are you sure you want to Delete?",
        text:
            "Once deleted, this announcement " +
            announcement_title +
            " will permanenty deleted",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            window.location = "/a/delete-announcement/" + announcement_id + "";
        }
    });
});
