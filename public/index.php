<?php


// $asta = scandir("users");
// echo "<pre>";
// $arr = [];
// for($i = 2; $i < count(scandir("users")); $i++) {
//     $content = file_get_contents("users/$asta[$i]");
//     $arr[] = json_decode($content, true);
// }

?>

<?php include_once "blocks/header.php"; ?>

    <form class="adduser">
        <h2>add user</h2>
        <div class="block">
            <label for="name"> name</label>
            <input type="text" name="name" id="name"><br>
        </div>
        <div class="block">
            <label for="email"> email</label>
            <input type="text" name="email" id="email"><br>
        </div>
        <div class="block">
            <label for="phone"> phone</label>
            <input type="text" name="phone" id="phone"><br>
        </div>

        <div class="block">
            <button onclick="addUser()">send</button>
            <button type="reset">reset</button>
        </div>
    </form>

    <form class="editUser" onclick="event.preventDefault()">
        <h2>edit user</h2>
        <input type="hidden" name="idUser" id="oldName" value="">
        <div class="block">
            <label for="name"> name</label>
            <input type="text" name="name" id="name"><br>
        </div>
        <div class="block">
            <label for="email"> email</label>
            <input type="text" name="email" id="email"><br>
        </div>
        <div class="block">
            <label for="phone"> phone</label>
            <input type="text" name="phone" id="phone"><br>
        </div>

        <div class="block">
            <button onclick="updateUser()">send</button>
            <button type="reset">reset</button>
        </div>
    </form>
    <div class="content">

    </div>
    <!-- <button class="add">add new user</button> -->
<?php /*include_once "blocks/footer.php";*/ ?>