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

$(document).on('click', '#addCard', function(){
    var senddata = { action: "addCard", cardname: $('#cardname').val(), minutes: $('#minutes').val(), cardDescription: $('#cardDescription').val(), listid: $('#listid').val(), status: $('#statusselect option:selected').val()}
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

$('.openeditmodalbtn').click(function() {
    $('#listID').val($(this).data('id'));
    $('#editlistname').attr('placeholder',($(this).data('name')));
});

$('.openaddCardmodalbtn').click(function() {
    $('#listid').val($(this).data('id'));
});