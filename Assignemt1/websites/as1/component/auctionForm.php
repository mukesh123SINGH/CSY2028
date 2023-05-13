<main>

    <h1><?php
        $edit ??= false;
        echo $edit ? "edit" : "add"
        ?>auction</h1>

    <form action="#" method="post" enctype="multipart/form-data">
        <label>title</label> <input type="text" value="<?php
                                                        echo  $currentItem["title"] ?? ""
                                                        ?>" name=" data[title]" required />
        <label>description</label>
        <textarea class="textarea" name="data[description]" required><?php
                                                                        echo $currentItem["description"] ?? ""
                                                                        ?></textarea>
        <label>category</label>
        <select name="data[categoryId]">
            <?php
            foreach ($categories as $item) {
                $selected = "";
                if ($currentItem && $item["id"] == $currentItem["categoryId"]) $selected = "selected";
                echo "<option value='{$item['id']}'{$selected} >{$item['name']}</option>";
            }
            ?>
        </select>
        <label>auction end date</label>
        <input type="datetime-local" name="data[endDate]" value="<?php echo $currentItem['endDate'] ?? "" ?>" min="<?php echo date("Y-m-d\TH:i") ?>">
        <label>chose a file</label><input type="file" name="image" accept="image/*">
        <input type="submit" value="Submit" name="submit" />
    </form>
</main>