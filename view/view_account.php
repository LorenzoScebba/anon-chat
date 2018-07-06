<?php include 'controller/checkLoggedIn.php'; ?>

<h3 class="my-5 text-center">My account</h3>

<main class="container">
    <form action="controller/userUpdateData.php" method="post">
        <div class="row">
            <div class="form-group col-6">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" readonly
                       value="<?php echo($user["email"] != null ? $user["email"] : "error") ?>">
            </div>
            <div class="form-group col-6">
                <label for="creationDate">Creation Date</label>
                <input type="text" class="form-control" id="creationDate" readonly
                       value="<?php echo($user["metadata"]->createdAt->date != null ? $user["metadata"]->createdAt->date . " " . $user["metadata"]->createdAt->timezone : "error") ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="nickname">NickName</label>
                <input name="nickname" type="text" class="form-control" id="nickname" placeholder="Enter Nickname"
                       value="<?php echo $user["displayName"]; ?>" pattern="(.{3,})" title="At least 3 characters"
                       autocomplete="off">
            </div>
            <div class="form-group col-6">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" required pattern="(.{6,})"
                       title="At least 6 characters" disabled placeholder="Not avaiable atm">
            </div>
        </div>
        <div class="text-center my-5">
            <button type="submit" class="btn btn-primary">Update data</button>
        </div>
    </form>
</main>
