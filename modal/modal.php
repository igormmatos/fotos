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
          <input type="password" class="form-control" id="pwd" name="pwd" required>
        </div>
        <div class="form-group">
<<<<<<< HEAD
          <label for="caminho">Local:</label>
=======
          <label for="caminho">Fotografia:</label>
>>>>>>> bf2d5491e17b92b48582307ad0171ea9bdf6b728
          <input type="file" class="form-control" name="fileToUpload" required>
        </div>
        <div class="form-group">
          <label for="alt">Nome Fotografia:</label>
          <input type="text" class="form-control" id="foto" name="alt" required>
        </div>
        <div class="form-group">
          <label for="desc">Descrição Fotografia:</label>
          <input type="text" class="form-control" id="desc" name="desc" required>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn text-light" style="background-color: #2e0000">Adicionar</button>
      </div>
    </form>
  </div>
</div>
</div>
