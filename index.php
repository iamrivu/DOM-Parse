<!DOCTYPE html>
<html>
<head>
    <title>HTML DOM Parse with cURL</title>
    <link rel="stylesheet" type="text/css" href="lib/bs.min.css">
    <script type="text/javascript" src="lib/bs.min.js"></script>
    <script type="text/javascript" src="lib/jq.min.js"></script>
    <style type="text/css">
        .row {
            border: 30px;
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">HTML DOM Parse with cURL</a>
        </nav> <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form class="form-group" id="logfrm">
                    <input class="form-control" type="text" name="srch" id="srch" placeholder="search or type a keyword ..." required> <br>
                    <button class="btn btn-success" type="submit" name="submit" id="submit">Search</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-12" id="msg"></div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $("#submit").click(function(e) {
            e.preventDefault();
            var frmData = $("#logfrm").serialize();
            // console.log(frmData);
            $.ajax({
                type: "post",
                url: "curl_parse.php",
                data: frmData + "&action=register",
                success: function(data) {
                    $("#msg").html(data);
                }
            });
        });
    });
</script>