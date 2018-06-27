<h3 class="text-center my-5">Register a new user</h3>
<main class="container justify-content-center" style="height: 100%">
    <form method="post" action="controller/userRegistration.php">
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off" autofocus required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="nickname">Nickname</label>
            <input name="nickname" type="text" class="form-control" id="nickname" aria-describedby="nicknameHelp" placeholder="Enter a nickname" autocomplete="off" required>
            <small id="nicknameHelp" class="form-text text-muted"><b>DON'T</b> use your real name.</small>
        </div>
        <div class="text-center mt-5"><button type="submit" class="btn btn-primary">Submit</button></div>
    </form>
</main>