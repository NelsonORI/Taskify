<?php

class layouts {
    public function heading($conf) {
        echo "Welcome to Taskify";
    }
    public function welcome($conf) {
        echo "<p>Sign up to keep track of your tasks.</p>";
    }
    public function footer($conf) {
        echo "<footer>
        Copyright &copy; " . date("Y") . " Taskify
        <br>Contact us at <a href='mailto:info@taskify.com'>info@taskify.com</a></footer>";
    }
}