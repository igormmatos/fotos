<div class="modal fade text-modal" id="add_foto">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <!-- Modal Header -->
      <form action="index.php" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h4 class="modal-title">Adicionar Fotografia</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <label for="pwd">Palavra Chave:</label>
          <input type="password" class="form-control" id="pwd" name="pwd" value="2423" required>
        </div>
        <div class="form-group">
          <label for="alt">Nome Fotografia:</label>
          <input type="text" class="form-control" id="foto" name="alt" required>
        </div>
        <div class="form-group">
          <label for="desc">Descrição Fotografia:</label>
          <input type="text" class="form-control" id="desc" name="desc" required>
        </div>
        <div class="form-group">
          <label for="caminho">Local:</label>
          <input type="file" class="form-control" name="fileToUpload" required>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary">Adicionar</button>
      </div>
    </form>
  </div>
</div>
</div>
