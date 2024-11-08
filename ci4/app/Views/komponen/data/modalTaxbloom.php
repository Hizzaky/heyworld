<div class="modal fade" id="modalKataKerja" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKataKerjaLabel">tes
                    <?= $sub_title ?>
                    (<span id="modalPp"></span>)
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <hr>
            <div class="modal-body" style="padding:5px;">
                <div class="container">
                    <p class="card-text" style="text-align:justify">
                        <span id="modalRed" style="color:red"></span>
                        <span id="modalBlue" style="color:blue"></span>
                        <span id="modalGreen" style="color:green"></span>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>