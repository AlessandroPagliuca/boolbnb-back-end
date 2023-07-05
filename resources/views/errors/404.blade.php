@extends('errors.minimal')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../scss/partials/_404.scss">
    <title>Document</title>
</head>
<body>
    <div class="about">
    <a class="bg_links social portfolio" href="https://www.rafaelalucas.com" target="_blank">
       <span class="icon"></span>
    </a>
    <a class="bg_links social dribbble" href="https://dribbble.com/rafaelalucas" target="_blank">
       <span class="icon"></span>
    </a>
    <a class="bg_links social linkedin" href="https://www.linkedin.com/in/rafaelalucas/" target="_blank">
       <span class="icon"></span>
    </a>
    <a class="bg_links logo"></a>
 </div>
 <!-- end about -->

     <section class="wrapper">

         <div class="container">

             <div id="scene" class="scene" data-hover-only="false">


                 <div class="circle" data-depth="1.2"></div>

                 <div class="one" data-depth="0.9">
                     <div class="content">
                         <span class="piece"></span>
                         <span class="piece"></span>
                         <span class="piece"></span>
                     </div>
                 </div>

                 <div class="two" data-depth="0.60">
                     <div class="content">
                         <span class="piece"></span>
                         <span class="piece"></span>
                         <span class="piece"></span>
                     </div>
                 </div>

                 <div class="three" data-depth="0.40">
                     <div class="content">
                         <span class="piece"></span>
                         <span class="piece"></span>
                         <span class="piece"></span>
                     </div>
                 </div>

                 <p class="p404" data-depth="0.50">404</p>
                 <p class="p404" data-depth="0.10">404</p>

             </div>

             <div class="text">
                 <article>
                     <p>Uh oh! Looks like you got lost. <br>Go back to the homepage if you dare!</p>
                     <a href="{{ route('host.apartments.index') }}"><button>i dare!</button></a>
                 </article>
             </div>

         </div>
     </section>

</body>
</html>
<!-- about -->
