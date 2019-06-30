<?php   
  require 'vendor/inc/dash_head.php'; 
  require 'vendor/inc/dash_nav.php'; 
?>  

<div class="container">
<h2>Liste des sections </h2>
<table class="table">
  <thead>
    <tr>
      <th><abbr title="id">#</abbr></th>
      <th>Titre</th>
      <th><abbr title="Content">Contenu</abbr></th>
      <th><abbr title="Image">Image</abbr></th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th>1</th>
      <td><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Leicester City</a> <strong>(C)</strong>
      </td>
      <td>38</td>
      <td>23</td>
    </tr>
  </tbody>
</table>
</div>
<br>
<div class="container">
<h2>Ajouter une section : </h2>
<form method="POST" action="index.php?ctrl=section&action=add" class="control" enctype="multipart/form-data">
    <div class="field">
        <label for="title" class="label">Titre</label>
        <div class="control">
            <input class="input" type="text" placeholder="Titre" name="title" id="title">
        </div>
    </div>
    <div class="field">
        <label for="desc" class="label">Description</label>
        <div class="control">
            <textarea class="textarea" placeholder="Description" name="desc" id="desc"></textarea>
        </div>
    </div>
    <div class="field">
        <label for="mon_image" class="label">Veuillez ajouter une image à afficher</label>
        <div class="control">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
            <input type="file" name="mon_image" id="mon_image">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-link">Envoyer</button>
        </div>
    </div>
</form>
</div>


      
<?php   require 'vendor/inc/dash_foot.php'; ?>  