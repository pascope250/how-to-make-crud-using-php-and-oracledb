$(document).ready(function () {
    // create crud for product using ajax
    allproducts();
    $(document).on('submit', '#submitp', function (e) {
        e.preventDefault();
        var form = new FormData($(this)[0]); // Changed $("#submitp")[0] to $(this)[0]
        form.append('insert', true);
        $.ajax({
            url: 's.php',
            method: 'post',
            data: form,
            processData: false, // Add processData: false
            contentType: false, // Add contentType: false
            success: function (data) {

                allproducts();
                $("#exampleModal").modal('hide');

                toastr.success('New Record Added successful!');                
            }
        });
    });

    $(document).on('click', '#deletep', function(){
        var deletes = $(this).data('id');
        $.ajax({
            url: 's.php',
            method: 'get',
            data: {'delete': deletes},
            beforeSend: function(){
                if(!confirm("Are you sure want to delete this data")){
                    return false;
                }
            },
            success: function (data){
                    toastr.success('Data Deleted successful!');
                allproducts();
            }
        })
    })


    $(document).on('click', '#edit', function(){
        var edit = $(this).data('id');
        $.ajax({
            url: 's.php',
            method: 'get',
            data: {'edit': edit},
            success: function(data){
                $("#edit_view").html(data);
            }
        })
    })

    $(document).on('submit', '#updatepp', function (e) {
        e.preventDefault();
       
        var form = new FormData($(this)[0]); 
        form.append('update', true);

        $.ajax({
            url: 's.php',
            method: 'post',
            data: form,
            processData: false, // Add processData: false
            contentType: false, // Add contentType: false
            success: function (data) {
                toastr.success('Data updated successful!');
                allproducts();
                $("#exampleModal1").modal('hide');
            }
        });
    });

})









function allproducts() {
    $.ajax({
        url: 's.php',
        method: 'get',
        data: { all_product: true },
        success: function (data) {
            $("#view_p").html(data);
        }
    })
}