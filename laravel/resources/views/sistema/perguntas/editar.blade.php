@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Pergunta</div>

                <div class="panel-body">
                @include('sistema.partes.mensagens')
                          
                        {!! Form::model($pergunta, ['route' => ['sistema.perguntas.atualizar', $pergunta->id], 'method' =>'PUT', 'class' => 'form-horizontal', 'id'=>'form' ]) !!}

                            @include('sistema.perguntas.form')
                            
                            {!!Form::button('Salvar <i class="fa fa-floppy-o" aria-hidden="true"></i>',['class'=>'btn btn-success', 'type'=>'submit'])!!}
                            <a  class=" btn btn-info" href="{{ url('sistema/perguntas')}}"> Voltar</a>
                            
                       {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scriptTela')

<script type="text/javascript" src="{{url('js/tinymce/tinymce.min.js')}}"> </script>
<script type="text/javascript"> 

$(document).ready(function(){
    tinymce.init({ 
    selector:'textarea.pergunta_tiny',
    /*menubar: false,*/
    forced_root_block : '',
    language : 'pt_BR',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
            ],
    toolbar: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | imageupload | forecolor | backcolor',
  textcolor_map: [
    "000000", "Black",
    "993300", "Burnt orange",
    "333300", "Dark olive",
    "003300", "Dark green",
    "003366", "Dark azure",
    "000080", "Navy Blue",
    "333399", "Indigo",
    "333333", "Very dark gray",
    "800000", "Maroon",
    "FF6600", "Orange",
    "808000", "Olive",
    "008000", "Green",
    "008080", "Teal",
    "0000FF", "Blue",
    "666699", "Grayish blue",
    "808080", "Gray",
    "FF0000", "Red",
    "FF9900", "Amber",
    "99CC00", "Yellow green",
    "339966", "Sea green",
    "33CCCC", "Turquoise",
    "3366FF", "Royal blue",
    "800080", "Purple",
    "999999", "Medium gray",
    "FF00FF", "Magenta",
    "FFCC00", "Gold",
    "FFFF00", "Yellow",
    "00FF00", "Lime",
    "00FFFF", "Aqua",
    "00CCFF", "Sky blue",
    "993366", "Red violet",
    "FFFFFF", "White",
    "FF99CC", "Pink",
    "FFCC99", "Peach",
    "FFFF99", "Light yellow",
    "CCFFCC", "Pale green",
    "CCFFFF", "Pale cyan",
    "99CCFF", "Light sky blue",
    "CC99FF", "Plum"
  ],
    /*tiny com upload de imagem :*/
        setup: function(editor) {
            var inp = $('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
            $(editor.getElement()).parent().append(inp);

            inp.on("change",function(){
                var input = inp.get(0);
                var file = input.files[0];
                var fr = new FileReader();
                fr.onload = function() {
                    var img = new Image();
                    img.src = fr.result;
                    editor.insertContent('<img src="'+img.src+'"/>');
                    inp.val('');
                }
                fr.readAsDataURL(file);
            });

            editor.addButton( 'imageupload', {/*crieu o botao no tinny*/
                icon: 'image',
                tooltip: "Inserir imagem",
                onclick: function(e) {
                    inp.trigger('click');
                }
            });
        }

 });

    //FUNCAO NOVA

    var tipo=$('select[name="tipo"]').val();

    if(tipo=='praticar'){
    $('.praticar').removeClass('ocultar');
    $('.exercicio').addClass('ocultar');
    //console.log(tipo);


  }else if(tipo=='exercicios'){
    $('.exercicio').removeClass('ocultar');
    $('.praticar').addClass('ocultar');
    //console.log(tipo);

  }else{
    $('.praticar').addClass('ocultar');
    $('.exercicio').addClass('ocultar');



  }
    $('select[name="tipo"]').prop('disabled', true);


}); 

 $(document).on('change','select[name="tipo"]',function(){
  
  
  var tipo=$(this).val();


 if(tipo=='praticar'){
    $('.praticar').removeClass('ocultar');
    $('.exercicio').addClass('ocultar');
    //console.log(tipo);


  }else if(tipo=='exercicios'){
    $('.exercicio').removeClass('ocultar');
    $('.praticar').addClass('ocultar');
    //console.log(tipo);

  }else{
    $('.praticar').removeClass('ocultar');
    $('.exercicio').addClass('ocultar');



  }

});
</script>

@endpush

