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
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
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
                        'poppins' : 'Poppins'
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/76cb77d7ca.js" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
</body>
</html>
