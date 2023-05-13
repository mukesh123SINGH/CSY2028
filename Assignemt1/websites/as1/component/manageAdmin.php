<main>
    <a href="/admin/addAdmin.php" class="auctionLink">add admin</a>
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>email</th>
                <th colspan="2">operation</th>
            </tr>

        </thead>
        <tbody>
            <?php
            foreach ($data as $value) {
                echo "<tr><td>{$value['name']}</td><td>{$value['email']}</td><td><a class='text-yellow underline-none' href='/admin/editAdmin.php?pk={$value['email']}'>edit</a></td></td><td><a class='text-red underline-none'  href='/admin/deleteAdmin.php?pk={$value['email']}'>delete</a></td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>