<?= $this->extend('layout/default/main') ?>
<?= $this->section('konten') ?>

<section class="section">
    <div class="section-header">
        <h1>Tes Modal</h1>
    </div>
    <div class="section-body">
<!-- Delete modal -->
    <button class="btn btn-danger btn-sm" data-confirm="Hapus data?|Yakin ingin hapus data?" data-confirm-yes="modalDelete(dir)">del</button>

       <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>

        <!--  -->
    </div>
    
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        2
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- END Modal -->

<?= $this->endSection() ?>