<main>
    <ul class="productList">
        <?php
        foreach ($data as $product) :
          
            $amount =  $product['amount'] ?? 0;
            $editStr = "";
            if (isset($_SESSION['user'])) {
                $_SESSION['user']['email'] == $product['user'] && $editStr = "<a href='/editAuction.php?pk={$product['id']}' class='auctionLink more ml-3 bg-edit'>edit <i class=' fa fa-edit'></i></a><a href='/deleteAuction.php?pk={$product['id']}' class='more auctionLink bg-red ml-3'>delete</a>";
            }
            echo "<li>
            <img src='{$product['image']}' alt='product name'>
            <article>
                <h2>{$product['title']}</h2>
                <h3>{$product['catName']}</h3>
                <p>{$product['description']}</p>
                <p class='price'>Current bid: £{$amount}</p>
                <a href='/auctionPage.php?pk={$product['id']}' class='more auctionLink'>More &gt;&gt;</a>
                {$editStr}
            </article>
        </li>";
        endforeach;
        ?>
    </ul>
</main>