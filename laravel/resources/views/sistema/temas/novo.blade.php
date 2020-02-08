@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Novo Tema</div>

                <div class="panel-body">
                @include('sistema.partes.mensagens')
                          
                       {!! Form::open(['route' => 'sistema.temas.cadastrar', 'class'=>'form-horizontal','enctype' =>'multipart/form-data', 'id'=>'formTema']) !!}
                            @include('sistema.temas.form')
                            {!!Form::button('Salvar <i class="fa fa-floppy-o" aria-hidden="true"></i>',['class'=>'btn btn-success', 'id'=>'sendTema'])!!}
                            <a  class=" btn btn-info" href="{{ url('sistema/temas')}}"> Voltar <i class="fa fa-list-alt" aria-hidden="true"></i></a>
                            
                       {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div id="alerts">
    
</div>
@endsection

@section('style')
<link href="{{ url('js/datatable/css/jquery.dataTables.css') }}" rel="stylesheet">
@endsection


@push('scriptTela')


<script type="text/javascript" src="{{url('js/datatable/js/jquery.dataTables.min.js')}}"> </script>
<script type="text/javascript"> 

$(document).ready(function(){
    tinymce.init({ 
    selector:'textarea.descricao_area',
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
  var tablePerguntas = $('#tablePerguntas').DataTable({ //cria a datatable
        "language": {//traduz por portugues
           "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
        "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        }
    }
  });
  
        $("#imageTema").addClass('ocultar');
        $('.remover_imagem_tema') .addClass('ocultar')

        $('.imagem_tema').click(function(){

            
            $('#imagem').click();
            
            

            /*----------------------PREVIEW DA IMAGE DO TEMA-------------------*/
             $("#imagem").on("change", function(){

                    if(this.files[0].size > 2097152){
                        alert('Selecione uma imagem menor que 2 Mb');
                        $('[name="imagem"]').val('');
                        return false;
                    }

                    var files = !!this.files ? this.files : [];
                    if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                    
                    if (/^image/.test( files[0].type)){ // only image file
                            var reader = new FileReader(); // instance of the FileReader
                            reader.readAsDataURL(files[0]); // read the local file
                        
                        reader.onloadend = function(){ // set image data as background of div
                           $('[name="input_imagem_tema"]').val(files[0].name); 
                            $("#imageTema").css("background-image", "url("+this.result+")");
                            $("#imageTema").removeClass('ocultar');
                            $('.remover_imagem_tema').removeClass('ocultar');
                            $('.imagem_tema').addClass('ocultar');
                        }
                    }
            });

        });

        /*funcao do modal das perguntas*/
    $(document).on('click', '.modalPerguntas', function(){

        $('.modalCarregando').click();

        $.ajax({
            type: 'get',
            url: '{{ url('sistema/temas/perguntas')}}',
            dataType:'json',
        })
        .done(function(data, textStatus, jqXHR){
          //console.log(data);
          tablePerguntas.clear().draw();//limpa a table antes 
          $.each( data, function( key, value ) {
            obj = JSON.parse(value);
                tablePerguntas.row.add( [
                obj.pergunta,
                '<button type="button" class="btn btn-primary" onclick="adicionarPerguntaTema(\''+obj.pergunta+'\','+obj.id+');" > Adicionar Pergunta </button>',
            ] ).draw( false );
          });

          $('.abrirModalPerguntas').click();//abre o modal
          $("#modalCarregando").modal('hide');//fecha o modal
          
        })
        .fail(function(jqXHR){
            console.log(jqXHR.responseText);
        });
    });

     
$('[data-toggle="tooltip"]').tooltip();//tooltip
}); 


//adiciona perguntas ao tema
function adicionarPerguntaTema(pergunta, id){
    
          var idx = $('input[name="perguntas_temas['+id+'][id]"]').val();

          if(idx){
            $('.erro_pergunta').removeClass('ocultar');
            $('.erro_pergunta').text('Essa pergunta já está associada ao tema.');
            //$('.erro_pergunta').delay(5000).fadeOut().addClass('ocultar');
          }else{
              $('.perguntaTema').removeClass('ocultar');
              $('.erro_pergunta').addClass('ocultar');

              var codigo ='<tr><td>'+pergunta+'<input type="hidden" name="perguntas_temas['+id+'][id]" value="'+id+'"></td>';
              codigo+='<td><button type="button" onclick="removerPerguntaTema('+id+')" class="btn btn-danger">Remover pergunta</button></td></tr>';

              $('.corpo').append(codigo);
          }

  //$("#modalPerguntas").modal('hide');//fecha o modal
  
}

//remove o preview da imagem
function remover(){
          $("#imageTema").addClass('ocultar'); 
          $('.imagem_tema').removeClass('ocultar');
          $('[name="imagem"]').val('');
          $('[name="input_imagem_tema"]').val(''); 
          $('.remover_imagem_tema') .addClass('ocultar')
    }

//remover a pergunta tema

function removerPerguntaTema(id){
          $('input[name="perguntas_temas['+id+'][id]"]').parent().parent().remove();
}


/*AJAX QUE GRAVA O TEMA*/

$(document).on('click', '#sendTema', function() {
    $('.modalCarregando').click();

    $.ajax({
        type:'post',
        url: '{{ url('sistema/temas/cadastrar')}}',
        dataType: 'json',
        data: $('#formTema').serialize(),
    })
    .done(function(data, textStatus, jqXHR){
        $('#formTema').submit();
    })
    .fail( function(jqXHR){
        $('*').css('cursor','auto');
        if(jqXHR.status == 422){
            var  msg = " ";
            $('.erros').empty();
            $('.erros').removeClass('ocultar');

            $.each(jqXHR.responseJSON, function(key, value){
                msg = value+"\n";
                $('.erros').append('<ul><li>'+msg+'</li></ul>');
            });
              $('html, body').animate({scrollTop:0}, 'slow');//volta pro topo
        }else{
            $('#alerts').html(jqXHR.responseText);
        }

        $("#modalCarregando").modal('hide');//fecha o modal
    });



});


</script>

@endpush