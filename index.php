<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Make url tiny</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style>
        div#result {
            margin-top: 50px;
            text-align: center;
            font-size: 20px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2>Welcome to my hand-made TinyURL site</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <form id="minimize">
                        <fieldset>
                            <div class="form-group">
                                <label for="link">Enter your URL to minimize</label>
                                <input class="form-control" type="url" name="link" placeholder="https://www.example.com" id="link">
                            </div>
                            <button type="submit" class="btn btn-primary" id="create">Create</button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12" id="result">
                    Your tiny URL is:
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
       $('#create').on('click', function(e){

           var data = $('#minimize').serialize();
           $.ajax({
               url: 'action.php',
               type: "POST",
               data:  data,
               success: function (result) {
                   $('#result').html(result);
               }
           });
           e.preventDefault();
           $('#minimize input').val('');
       });
    });
</script>
</body>
</html>