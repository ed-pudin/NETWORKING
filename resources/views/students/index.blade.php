@extends('struct')
@section('Content')

<livewire:index-student :companies="$companies" :allInterests="$allInterests"/>

<script>

    window.addEventListener('contentChanged', event => {
          var classes = ["btn-animation3D", "btn-animation2D", "btn-databases", "btn-vfx"];

        $(".all-areas button").each(function(){
            $(this).addClass(classes[~~(Math.random()*classes.length)]);
        });
    });

    document.addEventListener("livewire:load", function(event) {
        var classes = ["btn-animation3D", "btn-animation2D", "btn-databases", "btn-vfx"];

        $(".all-areas button").each(function(){
            $(this).addClass(classes[~~(Math.random()*classes.length)]);
        });

    });

    Livewire.on('load', function (filter, index){
        var classes = ["btn-animation3D", "btn-animation2D", "btn-databases", "btn-vfx"];

        $(".all-areas button").each(function(){
            $(this).addClass(classes[~~(Math.random()*classes.length)]);
        });
    });


    Livewire.on('filter', function (filter, index){
        var classes = ["btn-animation3D", "btn-animation2D", "btn-databases", "btn-vfx"];

        document.getElementById("selected-area").innerHTML =
        `
        <button type="button" class="" id="${index}"> ${filter} <i class="bi bi-x-circle-fill" onclick="show(${index})"></i></button>
        `

        $(".selected-area button").each(function(){
            $(this).addClass(classes[~~(Math.random()*classes.length)]);
        });

        $(".all-areas button#"+index).css('display', 'none');
    });



    function show(index){

        $("#selected-area button#"+index).remove();

        $(".all-areas button#"+index).show();
    }
</script>

@endsection
