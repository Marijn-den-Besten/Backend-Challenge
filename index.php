<?
include("resources/inc/Database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>

<header>
    <h1>Lijkt verdomde veel op trello</h1>
</header>

<body>
    <div id="container" class="w-100">
        <div class="row">
            <?php
            $lists = getLists();

            foreach($lists as $list){
                echo
                '<div class="col">',
                    '<div class="card">',
                        '<div class="card-header">',
                            '<div class="row">',
                                '<div class="col">',
                                    '<a>'.$list['listname'].'</a>',
                                '</div>',
                                '<div class="col">',
                                    '<button data-id="'.$list['id'].'" class="deletelistbtn btn btn-danger float-right">&cross;</button>',
                                    '<button data-id="'.$list['id'].'" data-name="'.$list['listname'].'" data-toggle="modal" data-target="#edit-list-modal" class="openeditmodalbtn btn btn-info float-right">Edit</button>',
                                '</div>',
                            '</div>',
                        '</div>',
                        '<div class="card-body">';
                        foreach(getItems($list['id']) as $item) {
                            echo
                            '<div class="row">',
                                '<div class="card w-100" id="'.$item['id'].'">',
                                    '<div class="card-header">',
                                        '<a>' . $item['cardname'] . '</a>',
                                    '</div>',
                                    '<div class="card-body">',
                                        '<a>' . $item['minutes'] . ' Minutes</a>',
                                        '<br>',
                                        '<a>' . $item['description'] . '</a>',
                                        '<br>',
                                        '<a>' . getStatusById($item['status'])['statusname'] . '</a>',
                                    '</div>',
                                '</div>',
                            '</div>';
                        }
                            echo
                            '<div class="row">',
                                '<div class="col">',
                                    '<button data-id="'.$list['id'].'" data-toggle="modal" data-target="#add-card-modal" class="openaddCardmodalbtn btn btn-secondary float-right">&plus;</button>',
                                '</div>',
                            '</div>',
                        '</div>',
                    '</div>',
                '</div>';
            } ?>
            <div class="col">
                <button data-toggle="modal" data-target="#new-list-modal" class="btn btn-success">Add list</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="new-list-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 for="fname">Add List</h2>
                </div>
                <div class="modal-body">
                    <form id="newlist-form">
                        <label style="width: 100%;">
                            Name:
                            <input type="text" class="form-control" id="listname" name="listname" placeholder="Name">
                        </label>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="addList" class="btn btn-success">Save</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="edit-list-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 for="fname">Edit List</h2>
                </div>
                <div class="modal-body">
                    <form id="newlist-form">
                        <label style="width: 100%;">
                            New name:
                            <input type="text" class="form-control" id="editlistname" name="editlistname" placeholder="Name">
                        </label>
                            <input type="hidden" id="listID" name="listID" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="editList" class="btn btn-success">Edit</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="add-card-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 for="fname">Add card</h2>
                </div>
                <div class="modal-body">
                    <form id="newcard-form">
                        <label style="width: 100%;">
                            Name:
                            <input type="text" class="form-control" id="cardname" name="cardname" placeholder="Name">
                        </label>
                        <label style="width: 100%;">
                            Time(minutes):
                            <input type="number" class="form-control" id="minutes" name="minutes" placeholder="Duur">
                        </label>
                        <label style="width: 100%;">
                            Description:
                            <textarea type="text" id="cardDescription" class="form-control" name="cardDescription" placeholder="Beschrijving"></textarea>
                        </label>

                        <label style="width: 100%;">
                            Status:
                            <select id="statusselect" class="form-control">
                                <?php
                                    foreach (getStatuses() as $status) {
                                        echo
                                            '<option value="'.$status['id'].'">'.$status['statusname'].'</option>';
                                    }
                                ?>
                            </select>
                        </label>

                        <input type="hidden" id="listid" name="listid" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="addCard" class="btn btn-success">Add</button>
                </div>
            </div>

        </div>
    </div>
</body>

<footer>&copy; Marijn den Besten</footer>

<!-- Bootstrap -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="resources/scripts/script.js"></script>
</html>