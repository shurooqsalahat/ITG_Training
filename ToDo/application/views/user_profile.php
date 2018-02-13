<!DOCTYPE html>

<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<head>
    <title>Login V6
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.12.4.js">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        body {
            background: #fff;
            color: #333;
            font-family: Lato, sans-serif;
        }

        .container {
            display: block;
            width: 400px;
            margin: 100px auto 0;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li * {
            float: left;
        }

        li, h3 {
            clear: both;
            list-style: none;
        }

        input, button {
            outline: none;
        }

        button {
            background: none;
            border: 0px;
            color: #888;
            font-size: 15px;
            width: 60px;
            margin: 10px 0 0;
            font-family: Lato, sans-serif;
            cursor: pointer;
        }

        button:hover {
            color: #333;
        }

        /* Heading */
        h3,
        label[for='new-task'] {
            color: #333;
            font-weight: 700;
            font-size: 15px;
            border-bottom: 2px solid #333;
            padding: 30px 0 10px;
            margin: 0;
            text-transform: uppercase;
        }

        input[type="text"] {
            margin: 0;
            font-size: 18px;
            line-height: 18px;
            height: 18px;
            padding: 10px;
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 6px;
            font-family: Lato, sans-serif;
            color: #888;
        }

        input[type="date"] {
            margin: 0;
            font-size: 18px;
            line-height: 18px;
            height: 18px;
            padding: 10px;
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 6px;
            font-family: Lato, sans-serif;
            color: #888;
        }

        input[type="text"]:focus {
            color: #333;
        }

        /* New Task */
        label[for='new-task'] {
            display: block;
            margin: 0 0 20px;
        }

        input {
            width: 65%;
        }

        label[for='data'] {
            width: 35%;
            font-family: Lato, sans-serif;
            color: #888;
        }

        p > button:hover {
            color: #0FC57C;
        }

        /* Task list */
        li {
            overflow: hidden;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }

        li > input[type="checkbox"] {
            margin: 0 220px;
            position: relative;
            top: 15px;
        }

        li > label {
            font-size: 18px;
            line-height: 40px;
            width: 237px;
            padding: 0 0 0 11px;
        }

        li > input[type="text"] {
            width: 226px;
        }

        li > .delete:hover {
            color: #CF2323;
        }

        /* Completed */
        #completed-tasks label {
            text-decoration: line-through;
            color: #888;
        }

        /* Edit Task */
        ul li input[type=text] {
            display: none;
        }

        ul li.editMode input[type=text] {
            display: block;
        }

        ul li.editMode label {
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="post" action="<?php echo base_url(); ?>lists/test">
        <p>
            <label for="new-task">Add Item </label>
        <div>
            <label for="data">Task Data</label>
            <input id="new-task" name="task_name" type="text">
        </div>
        <div>
            <label for="data"> Start Date </label>
            <input type="date" name="start" ;>
        </div>
        <div>
            <label for="data"> End Date </label>
            <input style"width:200px;" type="date" name="end">
        </div>
        </p>
        <input type="submit" name="bsubmit" value="Submit 2">
        <h3>Todo
        </h3>
        <ul id="incomplete-tasks">
            <?php if (isset($_SESSION['lists'])) {
                $list_data = $_SESSION['lists'];
                for ($i = 0; $i < count($list_data); $i++) {
                    if ($list_data[$i]['is_completed'] == 0) {
                        echo '<li><input type="checkbox" name="status" onchange="update(this);"  value="' . $list_data[$i]['event_id'] . '" ><label>' . $list_data[$i]['event_name'] . '</label><label> start  ' . $list_data[$i]['event_start'] . '</label><label> end  ' . $list_data[$i]['event_end'] . '</label> <input type="text"><button class="delete" onclick="delete_list(this);" " value="' . $list_data[$i]['event_id'] . '" >Delete</button></li> ';
                    }
                }
                echo '</ul>';
                echo '<h3>Completed</h3> <ul id="completed-tasks">';
                for ($i = 0; $i < count($list_data); $i++) {
                    if ($list_data[$i]['is_completed'] == 1) {
                        echo '<li><input type="checkbox" id="chk" checked onchange="update(this);" value="' . $list_data[$i]['event_id'] . '"><label>' . $list_data[$i]['event_name'] . '</label><label> start  ' . $list_data[$i]['event_start'] . '</label><label> end  ' . $list_data[$i]['event_end'] . '</label> <input type="text"><button class="delete" onclick="delete_list(this); "  value="' . $list_data[$i]['event_id'] . '"$>Delete</button></li> ';
                    }
                }
                echo '</ul>';
            }
            ?>
            <div>
                <button onclick="logout();"> logout
                </button>
    </form>
</div>
</div>
<div id="dialog" style="display: none" align="center">
    Are you sure you want to delete ?
    <div id="delete" style="float:left; margin-top:55px;">
        <button style>Delete
        </button>
    </div>
    <div id="cancle" style=" float:right; margin-top:55px;">
        <button style>cancel
        </button>
    </div>
</div>
<script>
    $("#add").click(function () {
            var name = $('input[name="task_name"]').val();
            var start = $('input[name="start"]').val();
            var end = $('input[name="end"]').val();
            var todayDate = new Date();
            if (!name || !start || !end) {
                alert('empty, You must fill all fields');
                return;
            }
            if (Date.parse(start) < Date.parse(todayDate)) {
                alert('Past date ! Be carefull');
                return;
            }
            if ((new Date(start).getTime() > new Date(end).getTime())) {
                alert('Start date must be less than end date');
                return;
            }
            window.location.href = "<?php echo base_url();?>lists/list/" + name + "/" + start + "/" + end;
        }
    );
</script>
<script type="text/javascript">
    function delete_list(item) {
        var x = item.value;
        $("#dialog").dialog({
                title: "jQuery Dialog",
                width: 450,
                height: 150,
            }
        );
        $("#delete").click(function () {
                window.location.href = "<?php echo base_url();?>lists/delete_list/" + x;
            }
        );
        $("#cancle").click(function () {
                $('#dialog').dialog('close');
            }
        );
    }
</script>
<script>
    function update(item) {
        var x = item.value;
        if ($('#chk').is(':checked')) {
            window.location.href = "<?php echo base_url();?>lists/update_list/" + x;
        }
        else {
            window.location.href = "<?php echo base_url();?>lists/update_list/" + x;
        }
    }
</script>
<script>
    function logout() {
        window.location.href = "<?php echo base_url();?>user/logout";
    }
</script>
</body>
</html>
​