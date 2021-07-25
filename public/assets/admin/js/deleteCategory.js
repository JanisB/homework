$(function () {
    $(".delete").on('click', function() {
        if(confirm("Accept Delete?")){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                url: "categories/" + $(this).attr('rel'),
                complete: function() {
                    alert("News Deleted!");
                    location.reload();
                }
            })
        }
    });
});
