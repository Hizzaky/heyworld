<?= $this->extend('layout/default/main') ?>
<?= $this->section('konten') ?>

<section class="section">
    <div class="section-header">
        <h1>Tes Modal</h1>
    </div>
    <div class="section-body">

    <button class="btn btn-danger btn-sm" data-confirm="Hapus data?|Yakin ingin hapus data?" data-confirm-yes="fungsi()">del</button>

       <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
    modal 2
        </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
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


    <!-- Modal Add Product-->
    <form action="/product/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                </div>
                
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="product_price" placeholder="Product Price">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="product_category" class="form-control">
                        <option value="">-Select-</option>
                        
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function fungsi(){
        // window.location.href = "/ttttes";
        window.location.replace("/testes");


    }
</script>
<!-- End Modal Add Product-->
        <!--  -->
    </div>
    
</section>

<?= $this->endSection() ?>