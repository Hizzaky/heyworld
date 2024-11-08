<div class="modal fade" id="modalKataKerja" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKataKerjaLabel">Kata Kerja Taxonomi Bloom</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="height:75vh; overflow:auto">
                    <?= $table->generate($taxbloom) ?>
                </div>
            </div>
        </div>
    </div>
</div>