<?php
$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jQuery.min.js"></script>

</head>

<body>
    <form method="post" action="">
        <div>
            <input type="text" id="name" name="name" placeholder="Edit your name" class="w-full p-2 rounded bg-transparent border-b-2 border-white text-white placeholder-white focus:outline-none">
        </div>
        <button type="submit" id="submit" class="w-full py-2 bg-white text-purple-700 font-bold rounded">submit</button>
    </form>
</body>

</html>

<script>
    $(document).ready(function () {
    $('#submit').click(function () {
        var data = {
            name: $('#name').val(),
            id: '<?=$id?>', // Get the ID from an input field for better security
        };

        console.log('Sending data:', JSON.stringify(data));

        $.ajax({
            url: 'edit_user.php', // Your API endpoint
            type: 'POST', 
            contentType: 'application/json', // Ensure the server expects JSON
            data: JSON.stringify(data),
            dataType: 'json',
            success: function (response) {
                console.log('Response:', response);

                if (response.status === 'success') {
                    // Redirect to home.php if the update is successful
                    window.location.href = 'list_user.php';
                } else {
                    // Log error and show an alert
                    console.error('Error:', response.message);
                    alert('Error: ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', status, error);
                alert('An unexpected error occurred. Please try again.');
            },
        });
    });
});

</script>