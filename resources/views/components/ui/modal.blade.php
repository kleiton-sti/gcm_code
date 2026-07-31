<div class="modal fade" id="modalInativarGCM" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="formInativarGCM" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title">Inativar Guarda Civil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <p>
                        Você está prestes a inativar o Guarda Civil
                        <strong id="modalExcluirNome"></strong>.
                        Essa ação pode ser desfeita apenas por um administrador.
                    </p>

                    <label for="motivo_delete" class="form-label">
                        Motivo da exclusão <span class="text-danger">*</span>
                    </label>
                    <textarea
                        name="motivo_delete"
                        id="motivo_delete"
                        class="form-control"
                        rows="3"
                        minlength="10"
                        maxlength="255"
                        required
                    ></textarea>

                    @error('motivo_delete')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-regular fa-trash-can"></i>
                        Confirmar
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>