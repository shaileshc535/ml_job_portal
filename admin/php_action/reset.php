<!doctype html>
<html>

<head>
    <title>jQuery UI autocomplete with PHP and AJAX</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</head>

<body>

    <table>
        <tr>
            <td>Single selection</td>
            <td><input type='text' id='autocomplete'></td>
        </tr>

        <tr>
            <td>Selected User id</td>
            <td><input type='text' id='selectuser_id' /></td>
        </tr>

    </table>

    <!-- Script -->
    <script type='text/javascript'>
    $(function() {

        $("#autocomplete").autocomplete({
            source: function(request, response) {

                $.ajax({
                    url: "category_search.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#autocomplete').val(ui.item.label); // display the selected text
                $('#selectuser_id').val(ui.item.value); // save selected id to input
                return false;
            },
            focus: function(event, ui) {
                $("#autocomplete").val(ui.item.label);
                $("#selectuser_id").val(ui.item.value);
                return false;
            },
        });
    });

    function split(val) {
        return val.split(/,\s*/);
    }

    function extractLast(term) {
        return split(term).pop();
    }
    </script>

</body>

</html>