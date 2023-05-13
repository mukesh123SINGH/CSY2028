 <main>
     <article class="product">
         <?php
            if ($data) :
            ?>
             <img src="<?php
                        echo $data['image']
                        ?>" alt="product name" />
             <section class="details">
                 <h2><?php
                        echo $data['title']
                        ?></h2>
                 <h3><?php
                        echo $data['catName']
                        ?></h3>
                 <p>Auction created by <a href="#">
                         <?php
                            echo $data['author']
                            ?>
                     </a></p>
                 <p class="price">Current bid:£ <?php echo $data['amount'] ?? 0 ?></p>
                 <time><?php
                        $diff = (new DateTime($data['endDate']))->diff(new DateTime());
                        $str = "";
                        $valid = true;
                        if (new DateTime() >= new DateTime($data['endDate'])) {
                            $str = "auction time ended";
                            $valid = false;
                        } else {
                            $diff->y && ($str .= "{$diff->y} years");
                            $diff->m && ($str .= "{$diff->m} month");
                            $diff->d && ($str .= "{$diff->d} month");
                            $diff->h && ($str .= "{$diff->h} hour");
                            $diff->m && ($str .= "{$diff->m} minutes");
                            $diff->s &&  ($str .= "{$diff->s} seconds");
                            $str .= " remaining";
                        }
                        echo $str;
                        ?></time>
                 <?php
                    if ($valid && isUserLogin()) :
                    ?>
                     <form action="/bid.php" method="post" class="bid">
                         <input type="hidden" name="data[productId]" value="<?php
                                                                            echo $data['id'] ?>">
                         <input type="number" name="data[amount]" placeholder="Enter bid amount" min="<?php echo $data['amount'] ?? 0; ?>" />
                         <input type="submit" name="submit" value="Place bid" /">
                     </form>
                 <?php
                    endif;
                    ?>
             </section>
             <section class="description">
                 <p>
                     <?php
                        echo $data['description']
                        ?>
                 </p>
             </section>
             <section class="reviews">
                 <h2> review's of <?php
                                    echo   $data['author']
                                    ?></h2>
                 <ul>
                     <?php
                        foreach ($data['comment'] as $value) {
                            $value['createdAt'] = date("d/m/Y", strtotime($value['createdAt']));
                            echo " <li>
                 <strong>{$value['name']} said</strong> {$value['review']}<em>
                 {$value['createdAt']}</em>
             </li>";
                        }
                        ?>
                 </ul>
                 <?php
                    if (isUserLogin()) :
                    ?>
                     <form action="/review.php" method="post">
                        <input type="hidden" name="auctionId" value="<?php echo $data['id'] ?>">

                         <input type="hidden" name="data[auctionUser]" value="<?php
                                                                                echo $data['user'] ?>">
                         <label>Add your review</label> <textarea name="data[review]"></textarea>
                         <input type="submit" name="submit" value="Add Review" />
                     </form>
                 <?php
                    else :
                        echo "login to send review";
                    endif;
                    ?>
             </section>
     </article>
 <?php
            else :
                echo "not found";
            endif;
    ?>
 </main>