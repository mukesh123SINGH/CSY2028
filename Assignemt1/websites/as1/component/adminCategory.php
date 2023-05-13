<main>
    <a href="/admin/addCategory.php" class="auctionLink">add Category</a>
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th colspan="2">operation</th>
            </tr>

        </thead>
        <tbody>
            <?php
            foreach ($categories as $value) {
                echo "<tr><td>{$value['name']}</td><td><a class='text-yellow underline-none' href='/admin/editCategory.php?pk={$value['id']}'>edit</a></td></td><td><a class='text-red underline-none'  href='/admin/deleteCategory.php?pk={$value['id']}'>delete</a></td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>