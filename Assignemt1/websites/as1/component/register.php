<main>
    <h1> <?php
            $register ??= "true";
            echo $register ? "register" : "admin";
            ?> form</h1>
    <form action="#" method="post">
        <label>name</label> <input type="text" value="<?php echo $formData['name'] ?? "" ?>" name="data[name]" required />
        <label>email</label> <input type="email" name="data[email]" value="<?php echo $formData['email'] ?? "" ?>" required />
        <label>password</label> <input type="password" name="data[password]" required />
        <input type="submit" value="Submit" name="submit" />
    </form>
</main>