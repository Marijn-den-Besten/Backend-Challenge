$(document).on('click', '#addList', function(){
    var senddata = { action: "addList", listname: $('#listname').val()}
    $.ajax({
        type: 'POST',
        url: 'resources/inc/Database.php',
        data: senddata,
        dataType: "json",
        error: function(data){
            console.log(data)
        },
        success: function(data){
            window.location.reload();
        }
    })
})