@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Novo Modulo</div>

                <div class="panel-body">
                @include('sistema.partes.mensagens')
                          
                       {!! Form::open(['route' => 'sistema.modulos.cadastrar', 'class'=>'form-horizontal','enctype' =>'multipart/form-data', 'id'=>'formModulo']) !!}
                            @include('sistema.modulos.form')
                            {!!Form::button('Salvar <i class="fa fa-floppy-o" aria-hidden="true"></i>',['class'=>'btn btn-success', 'id'=>'sendModulo'])!!}
                            <a  class=" btn btn-info" href="{{ url('sistema/modulos')}}"> Voltar <i class="fa fa-list-alt" aria-hidden="true"></i></a>
                            
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
    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | imageupload',
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
  var tableTemas = $('#tableTemas').DataTable({ //cria a datatable
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
  
        $("#imageModulo").addClass('ocultar');
        $('.remover_imagem_modulo') .addClass('ocultar')

        $('.imagem_modulo').click(function(){

            
            $('#imagem').click();
            
            

            /*----------------------PREVIEW DA IMAGE DO MODULO-------------------*/
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
                           $('[name="input_imagem_modulo"]').val(files[0].name); 
                            $("#imageModulo").css("background-image", "url("+this.result+")");
                            $("#imageModulo").removeClass('ocultar');
                            $('.remover_imagem_modulo').removeClass('ocultar');
                            $('.imagem_modulo').addClass('ocultar');
                        }
                    }
            });

        });

        /*funcao do modal das Temas*/
    $(document).on('click', '.modalTemas', function(){

        $('.modalCarregando').click();

        $.ajax({
            type: 'get',
            url: '{{ url('sistema/modulos/temas')}}',
            dataType:'json',
        })
        .done(function(data, textStatus, jqXHR){
          console.log(data);
          tableTemas.clear().draw();//limpa a table antes 
          $.each( data, function( key, value ) {
            obj = JSON.parse(value);
                tableTemas.row.add( [
                obj.nome,
                '<button type="button" class="btn btn-primary" onclick="adicionarModulosTemas(\''+obj.nome+'\','+obj.id+');" > Adicionar Tema </button>',
            ] ).draw( false );
          });

          $('.abrirModalTemas').click();//abre o modal
          $("#modalCarregando").modal('hide');//fecha o modal
          
        })
        .fail(function(jqXHR){
            console.log(jqXHR.responseText);
            $('#alerts').html(jqXHR.responseText);
            $("#modalCarregando").modal('hide');//fecha o modal
        });
    });

     
$('[data-toggle="tooltip"]').tooltip();//tooltip
}); 


//adiciona Temas ao tema
function adicionarModulosTemas(nome, id){
    
          var idx = $('input[name="modulos_temas['+id+'][id]"]').val();

          if(idx){
            $('.erro_tema').removeClass('ocultar');
            $('.erro_tema').text('Essa tema já está associada ao Modulo.');
            //$('.erro_tema').delay(5000).fadeOut().addClass('ocultar');
          }else{
              $('.moduloTema').removeClass('ocultar');
              $('.erro_tema').addClass('ocultar');

              var codigo ='<tr><td>'+nome+'<input type="hidden" name="modulos_temas['+id+'][id]" value="'+id+'"></td>';
              codigo+='<td><button type="button" onclick="removerModuloTema('+id+')" class="btn btn-danger">Remover tema</button></td></tr>';

              $('.corpo').append(codigo);
          }

  //$("#modalPerguntas").modal('hide');//fecha o modal
  
}

//remove o preview da imagem
function remover(){
          $("#imageModulo").addClass('ocultar'); 
          $('.imagem_modulo').removeClass('ocultar');
          $('[name="imagem"]').val('');
          $('[name="input_imagem_modulo"]').val(''); 
          $('.remover_imagem_modulo') .addClass('ocultar')
    }

//remover a pergunta tema

function removerModuloTema(id){
          $('input[name="modulos_temas['+id+'][id]"]').parent().parent().remove();
}


/*AJAX QUE GRAVA O TEMA*/

$(document).on('click', '#sendModulo', function() {
    $('.modalCarregando').click();

    $.ajax({
        type:'post',
        url: '{{ url('sistema/modulos/cadastrar')}}',
        dataType: 'json',
        data: $('#formModulo').serialize(),
    })
    .done(function(data, textStatus, jqXHR){
        $('#formModulo').submit();
    })
    .fail( function(jqXHR){
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