<div id="menu_navigation">
    <ul class="navul">
        <li><a class="atras  hover:bg-green-800" href="{{asset("orchard")}}" onclick="regresar()"><i class="fa-sharp fa-solid fa-circle-arrow-left"></i></a></li>
        <li class="navli"><a id="active1" class="hoverr" href="{{route('informacion',$datos_orchard->id)}}">Información</a></li>
        <li class="navli"><a id="active2" class="hoverr" href="{{route('calendario',$datos_orchard->id)}}">Calendario</a></li>
        <li class="navli"><a id="active3" class="hoverr" href="#" onclick="reco()">Recomendaciones</a></li>

    </ul>
</div>