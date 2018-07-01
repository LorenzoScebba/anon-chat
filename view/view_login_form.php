<h3 class="text-center my-5">Login</h3>
<main class="container justify-content-center" style="height: 100%">
    <form method="post" action="controller/userValidation.php">
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" autofocus>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="text-center mt-5"><button type="submit" class="btn btn-primary">Submit</button></div>
    </form>
</main>