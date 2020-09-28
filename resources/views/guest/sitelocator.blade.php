@extends('layouts.wrapper')

@section('stylesheets')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        position: relative;
        height: 100%;
    }

    #zipform {
        position: fixed;
        top: 50%;
        transform: translateY(-50%);
        left: 100px;
        width: 350px;
        z-index: 2;
    }

    #zipform-small {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        width: 65%;
        z-index: 2;
    }

    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
@endsection

@section('layout')
    <div id="root"></div>
@endsection