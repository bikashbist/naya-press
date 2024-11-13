
$(document).on('click','#delete', function () {
    var id = $(this).data('id');
    var url = $(this).data('url');
    $object=$(this);
    if (confirm("Do you want to delete??")) {
        $.ajax ({
            url: url,
            type: 'DELETE',
            dataType: "JSON",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
            data: {
                "id": id,
            },
            success: function(response){
                console.log(response);
                // $($object).parents('tr').remove();
                alert('Successfully Deleted!!');
                location.reload(true);
            },
            error: function(xhr) {
                console.log(xhr.responseText); // this line will save you tons of hours while debugging
               // do something here because of error
              } 
        });
    }
    else {

    }
 
});

$(document).on('click','#restore', function () {
    var id = $(this).data('id');
    var url = $(this).data('url');
    // alert(url);
    $object=$(this);
    if (confirm("Do you want to restore??")) {
        $.ajax ({
            url: url,
            type: 'PUT',
            dataType: "JSON",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
            data: {
                "id": id,
            },
            success: function(response){
                console.log(response);
                $($object).parents('tr').remove();
                alert('Successfully Restored!!');
            },
            error: function(xhr) {
                console.log(xhr.responseText); // this line will save you tons of hours while debugging
               // do something here because of error
            }
        });
    }
    else {
    
    }

});

$('.dropdown-click').on('click',function() {
    var value=$(this).attr('href');
            window.location.href = value;  
    });
    