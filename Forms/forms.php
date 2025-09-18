<?php
class Forms {

    private function submit_button($value) {
        // Use Bootstrap's button classes
        echo "<div class='d-grid gap-2'><button type='submit' class='btn btn-primary mt-3'>{$value}</button></div>";
    }

    public function signup() {
        ?>
        <div class="card mt-5 p-4 mx-auto" style="max-width: 450px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Sign Up</h2>
                <form action='mail.php' method='post'>
                    <div class="mb-3">
                        <label for='username' class="form-label">Username:</label>
                        <input type='text' id='username' name='username' class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for='email' class="form-label">Email:</label>
                        <input type='email' id='email' name='email' class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for='password' class="form-label">Password:</label>
                        <input type='password' id='password' name='password' class="form-control" required>
                    </div>
                    <?php $this->submit_button('Sign Up'); ?>
                </form>
                <div class="text-center mt-3">
                    <a href="login.php">Already have an account? Log in</a>
                </div>
            </div>
        </div>
        <?php
    }

    public function login() {
        ?>
        <div class="card mt-5 p-4 mx-auto" style="max-width: 450px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Log In</h2>
                <form action='submit_login.php' method='post'>
                    <div class="mb-3">
                        <label for='username' class="form-label">Username:</label>
                        <input type='text' id='username' name='username' class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for='password' class="form-label">Password:</label>
                        <input type='password' id='password' name='password' class="form-control" required>
                    </div>
                    <?php $this->submit_button('Log In'); ?>
                </form>
                <div class="text-center mt-3">
                    <a href="index.php">Don't have an account? Sign up</a>
                </div>
            </div>
        </div>
        <?php
    }
}
?>