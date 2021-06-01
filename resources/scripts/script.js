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
});

$(document).on('click', '#editList', function(){
    var senddata = { action: "editList", listname: $('#editlistname').val(), listid: $('#listID').val()}
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
});

$(document).on('click', '.deletelistbtn', function(){
    var senddata = { action: "deleteList", listid: $(this).data('id')}
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
});
//
// $('#addList').click(function() {
//     $('#new-list-modal').modal('hide');
//     window.location.reload();
// });
//
// $('#editList').click(function() {
//     $('#edit-list-modal').modal('hide');
//     window.location.reload();
// });

$('.openeditmodalbtn').click(function() {
    $('#listID').val($(this).data('id'));
    $('#editlistname').attr('placeholder',($(this).data('name')));
});