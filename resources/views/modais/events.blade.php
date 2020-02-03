
<div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Título do modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="message"></div>

                <form id="formEvent">
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label classlabeltitle">Titulo</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" readonly class="form-control classtitle" id="title">
                            <input type="hidden" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="start" class="col-sm-4 col-form-label">Data/hora Inicial</label>
                        <div class="col-sm-8">
                            <input type="text" name="start" class="form-control date-time" id="start">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end" class="col-sm-4 col-form-label">Data/hora Final</label>
                        <div class="col-sm-8">
                            <input type="text" name="end" class="form-control date-time" id="end">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="color" class="col-sm-4 col-form-label classlabelcolor">Cor do Evento</label>
                        <div class="col-sm-8">
                            <input type="color" name="color" class="form-control classcolor" id="color">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-4 col-form-label">Descrição</label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" cols="35" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label">Status/Aula</label>
                        <div class="col-sm-8">
                            <select name='status' id='status'
                                className='form-control'>
                                <option value="0"> Agendada - Alterar Status</option>
                                <option value="1"> Realizada</option>
                                <option value="2"> Cancelada</option>
                            </select>

                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger deleteEvent">Excluir</button>
                <button type="button" class="btn btn-primary saveEvent">Salvar</button>
            </div>
        </div>
    </div>
</div>

