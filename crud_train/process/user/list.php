<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Age</th>
        <th scope="col">Image</th>
        <th scope="col">EDIT & DELETE</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($user as $value) : ?>
        <tr>

            <td><?= $value->getId(); ?></td>
            <td><?= $value->getName(); ?></td>
            <td><?= $value->getAge(); ?></td>
            <td><?= $value->getAddress(); ?></td>
            <td><img width="50px" src="images/<?= $value->getImage(); ?>"></td>
            <td>
                <a href="process/user/edit.php?id=<?php echo $value->getID(); ?>">
                    <button type="button" class="btn btn-outline-info">Edit
                    </button>
                </a>
                <a href="process/user/delete.php?id=<?php echo $value->getID(); ?>">
                    <button type="button" class="btn btn-outline-danger"
                            onclick="return confirm('bạn có chắc chắn muốn xóa không ?')">Delete
                    </button>
                </a>

            </td>
        </tr>

    <?php endforeach; ?>

</table>