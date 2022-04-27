<ol class="breadcrumb">
  <li><a href="index.php?p=admin.incidents.dashboard">Accueil</a></li>
  <li class="active"><a href="https://maiin.thinkpeace-sahel.dev/index.php?p=admin.categories.index">Gestion des catégories</a></li>
</ol>
<div class="row">
    <div class="col col-12 col-sm-12">
        <legend>- Les catégories d'incidents</legend>

        <p>
            <a href="?p=admin.categories.add" class="btn btn-success"> <span class="glyphicon glyphicon-plus-sign"></span> Nouvelle catégorie</a>
        </p>

        <div class='table-responsive'>
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom de la catégorie</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $category): ?>
                <tr>
                    <td><?= $category->id; ?></td>
                    <td><?= $category->category_name; ?></td>
                    <td>
                        <a style="margin-left:7px; font-size: 12px;" class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $category->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a style="margin-left:5px; font-size: 12px;" class="btn btn-danger" onclick="if (!confirm('Êtes-vous certain ?')) { return false }" href="?p=admin.categories.delete&id=<?= $category->id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                    </tbody>
            </table>
        </div>

    </div>
</div>
