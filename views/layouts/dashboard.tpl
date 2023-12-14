<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{block name='title' nocache}Dashboard{/block} | File Sharing App</title>
    <link href="{asset file='bootstrap/css/bootstrap.min.css'}" rel="stylesheet">
    <link href={asset file="font-awesome/css/all.min.css"} rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Montserrat:wght@500&family=Teko&display=swap" rel="stylesheet">
    <script src="{asset file='js/jquery/jquery.min.js'}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{asset file='js/htmx.min.js'}"></script>
    {block name='style' nocache}{/block}
</head>
<body style="background-color: #F3F7FA;">

{*  Header Block  *}
{block name='header'}
    {include file='components/dashboard/header.tpl'}
{/block}


{block name='body'}No Content Here..{/block}

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>