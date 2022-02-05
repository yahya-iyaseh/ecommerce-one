<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ asset('adminTemplate/img/logo/logo.png') }}" rel="icon">
  <title>Sharwa</title>
  <link href="{{ asset('summernote/summernote-lite.css') }}" rel="stylesheet">

  <link href="{{ asset('adminTemplate/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('adminTemplate/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('adminTemplate/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminTemplate/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  @notifyCss
  <style>
    .inset-0 {
      z-index: 999 !important;
    }

  </style>

</head>

<body id="page-top">
  <x:notify-messages />
  @notifyJs
  <div id="wrapper">
