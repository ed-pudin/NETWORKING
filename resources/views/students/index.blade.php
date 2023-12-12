@extends('struct')
@section('Content')

<livewire:index-student :companies="$companies" :allInterests="$allInterests"/>
<script src="{{asset('js/format.js')}}"></script>

<script>

    window.addEventListener('contentChanged', event => {
        var classes = [];

        $(".all-areas button").each(function(){
            let hash = "#"
            let c = hash.concat(intToRGB(hashCode($(this)[0].innerText)));
            $(this)[0].style.backgroundColor = c;
        });
    });

    document.addEventListener("livewire:load", function(event) {
        var classes = [];

        $(".all-areas button").each(function(){
            let hash = "#"
            let c = hash.concat(intToRGB(hashCode($(this)[0].innerText)));
            $(this)[0].style.backgroundColor = c;
        });

    });

    Livewire.on('load', function (filter, index){
        var classes = [];

        $(".all-areas button").each(function(){
            let hash = "#"
            let c = hash.concat(intToRGB(hashCode($(this)[0].innerText)));
            $(this)[0].style.backgroundColor = c;
        });
    });


    Livewire.on('filter', function (filter, index){
        var classes = [];

        document.getElementById("selected-area").innerHTML =
        `
        <button type="button" class="btn-primary" id="${index}">${filter}<i class="bi bi-x-circle-fill" onclick="show(${index})"></i></button>
        `
        document.getElementById("search-input").setAttribute("readonly" , "readonly" , false);
        $(".selected-area button").each(function(){
            let hash = "#"
            let c = hash.concat(intToRGB(hashCode($(this)[0].innerText)));
            $(this)[0].style.backgroundColor = c;
        });

        $(".all-areas button#"+index).css('display', 'none');
    });
    
    Livewire.on('unlock-btn', function (filter, index){
        var btnAnt = document.getElementById("btn-pag-ant");
        btnAnt.disabled = false;
    });
    
    Livewire.on('lock-btn', function (filter, index){
        var btnAnt = document.getElementById("btn-pag-sig");
        btnAnt.disabled = true;
    });

    function show(index){

        $("#selected-area button#"+index).remove();

        $(".all-areas button#"+index).show();

        Livewire.emit('deleteFilter');
        document.getElementById("search-input").removeAttribute("readonly"  , false);
    }
</script>

@endsection
