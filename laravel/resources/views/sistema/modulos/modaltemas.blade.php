  <!-- Modal -->
  <div class="modal fade" id="modalTemas" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Selecione o Tema</h4>
        </div>
        <div class="modal-body">

          <div class="alert alert-danger ocultar erro_tema">
    
          </div>
          
            <table id="tableTemas" class="cell-border" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Pergunta</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
               
                </tbody>
            </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>


   <!-- Modal de carregando -->
  <div class="modal fade" id="modalCarregando" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
              <div class="carregando">
                <center>  
                  <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
                  Carregando...
                </center>
              </div>

        </div>
      </div>
    </div>
  </div>
