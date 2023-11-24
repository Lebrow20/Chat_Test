<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <title>Discussion</title>
<!--     <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script> -->
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