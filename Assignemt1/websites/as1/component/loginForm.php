<main>
    <h1>login</h1>
    <form action="#" method="post">
        <label>email</label> <input type="text" value="<?php echo $data["email"] ?? "" ?>" name="data[email]" required />
        <label>password</label> <input type="password" name="data[password]" required />
        <input type="submit" value="Submit" name="submit" />
    </form>
</main>