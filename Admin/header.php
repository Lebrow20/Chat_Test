<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css"/>
    <title>Discussion</title>
    <script src="javascript/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $('#resetFileSend').on('click', function (e) {
                let $el = $('#inputFile');
                $el.wrap('<form>').closest(
                    'form').get(0).reset();
                $el.unwrap();
            });
        });
    </script>
</head>