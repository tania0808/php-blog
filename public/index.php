<?php
session_start();
require '../app/core/autoload.php';
$app = new App();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Poppins';
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        main {
            background: #FAFAFA;
            height: 100%;
            min-height: 100vh;
        }

        textarea {
            resize: none;
        }

        ::file-selector-button {
            display: none;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                        grayBtn: '#4F4F4F',
                        hoverBtn: '#F2F2F2',
                    },
                    fontFamily: {
                        'poppins': 'Poppins'
                    },
                    borderRadius: {
                        'extra-large': '62px',
                    }
                }
            }
        }
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.1/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/76cb77d7ca.js" crossorigin="anonymous"></script>
    <script>
        function clearFileInput(name) {
            document.getElementById(name).value = "user_female.jpg";
        }

        function showImage(){
            if(this.files && this.files[0]){
                var obj = new FileReader();
                obj.onload = function (data){
                    var image = document.getElementById('image-to-delete');
                    image.src = data.target.result;
                }
                obj.readAsDataURL(this.files[0]);
            }
        }

    </script>
    <title></title>
</head>
<body>

</body>
</html>
