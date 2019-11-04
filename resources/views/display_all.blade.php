

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    @foreach($responses as $r)
        <p>{{ $r['location'] }}</p>
        <p>{{ $r['address'] }}</p>
        <p>{{ $r['img'] }}</p>
        <a><Button onclick="handleClick()"> Edit </Button></a>
    @endforeach

    <form id="myForm" action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input id="submit" type="button" value="Upload Image" name="submit">
    </form>
<script> 

    function handleClick(){
        var body = {
            estate_id : "1",
            user_id : "1:"
        }
        $.ajax({
            type: 'POST',
            cache: false,
            contentType: "application/json",
            dataType: 'JSON',
            processData: false,
            url: 'http://127.0.0.1:8000/api/rooms/get_detail',
            // data: body,
            data: JSON.stringify(body),

            success: function(data) {
                alert("Data sending was successful");
            }
        });
        // request.send( JSON.stringify(body));
        console.log("this.reqponseText");

    }

    function handleEditClicked(post_id){
        var body = {
            id : post_id,
        }
        $.ajax({
            type: 'POST',
            cache: false,
            contentType: "application/json",
            dataType: 'JSON',
            processData: false,
            url: 'http://127.0.0.1:8000/api/rooms/get_detail',
            // data: body,
            data: JSON.stringify(body),

            success: function(data) {
                console.log(data);
            }
        });
    }


    document.getElementById('submit').addEventListener('click',
    function(){
        var formData = new FormData(document.getElementById('myForm'));
        $.ajax({
            type: 'POST',
            cache: false,
            contentType: false,
            dataType: 'JSON',
            processData: false,
            url: 'http://127.0.0.1:8000/api/rooms/get_detail',
            data: formData,

            success: function(data) {
                console.log("finish");
            }
        });
    })

</script>
</body>
</html>