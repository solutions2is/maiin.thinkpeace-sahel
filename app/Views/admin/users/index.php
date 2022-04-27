<div class="row">
    <div class="col col-12 col-sm-12">
        <legend>- Tous les comptes utilisateurs</legend>

        <p>
            <a href="?p=admin.users.add" class="btn btn-primary"> <span class="glyphicon glyphicon-plus-sign"></span> Nouveau compte</a>
        </p>

        <div class='table-responsive'>
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prénom - Nom</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user->id; ?></td>
                    <td><?= $user->first_name; ?> <?= strtoupper($user->last_name); ?></td>
                    <td><?= $user->username; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->user_type_id; ?></td>
                    <td><?= $user->enabled == '0' ? '<span class="label label-danger">Inactif</span>' : '<span class="label label-success">Actif</span>' ; ?></td>
                    <td>
                        <a class="text-primary" href="?p=admin.users.edit&id=<?= $user->id; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a style="margin-left:5px;" class="text-danger" onclick="if (!confirm('Êtes-vous certain ?')) { return false }" href="?p=admin.users.delete&id=<?= $user->id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>

    </div>
</div>