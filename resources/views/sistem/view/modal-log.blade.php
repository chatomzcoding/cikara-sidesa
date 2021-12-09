<div class="modal fade" id="log">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title"><i class="fas fa-user-clock text-info"></i> LOG -  {{ $judul }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body p-3">
            <section class="p-3 bg-light" style="overflow-y: scroll; height: 350px">
               {!! DbCikara::showlogall($log) !!}
            </section>
        </div>
        <div class="modal-footer text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
        </div>
        </form>
    </div>
    </div>
</div>