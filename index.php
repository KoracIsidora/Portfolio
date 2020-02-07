<?php
$msg = '';
$msgClass = '';

if (filter_has_var(INPUT_POST, 'submit')) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($email) && !empty($name) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = 'Please use a valid email';
            $msgClass = 'alert-danger';
        } else {
            $toEmail = 'korac.isidora@gmail.com';
            $subject = 'Contact Request From ' . $name;
            $body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>' . $name . '</p>
					<h4>Email</h4><p>' . $email . '</p>
					<h4>Message</h4><p>' . $message . '</p>
				';

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

            $headers .= "From: " . $name . "<" . $email . ">" . "\r\n";

            if (mail($toEmail, $subject, $body, $headers)) {
                $msg = 'Your email has been sent';
                $msgClass = 'alert-success';
            } else {
                $msg = 'Your email was not sent';
                $msgClass = 'alert-danger';
            }
        }
    } else {
        $msg = 'Please fill in all fields';
        $msgClass = 'alert-danger';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Isidora Korac | Portfolio</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <section id="home" data-aos="fade-up">
            <h1>Welcome!</h1>
            <p class="lead">My name is Isidora Korac and I am Front End Developer</p>
        </section>
        <section id="about" data-aos="fade-up">
            <h1>About Me <i class="far fa-smile-beam"></i></h1>
            <p class="lead"> My name is Isidora Korac, and I have recently started developing web pages.
                I finished <a href='https://itbootcamp.rs/' target='blank_'>IT Bootcamp</a> course, within which I learned Web Development.
                If you decide to continue reading my portfolio, you will be able to
                see some of my recent projects.
                I am trying to learn more every day and to gain new knowledge with every
                project I do. I consider myself hard-working, capable and very motivated person.
                Always opened for learning and improving myself.
                My CV can be found <a href="assets/cv.pdf" target="blank_">here</a>. </p>
        </section>
        <section id="projects" data-aos="fade-up">
            <h1>Projects</h1>
            <p>Some of the projects I did so far:</p>
            <div class="proj">
                <a href="https://koracisidoraportfoli.000webhostapp.com/" target="blank_"><img src="assets/forum.png" alt="forum" /></a>
                <a href="http://gamesplatform.000webhostapp.com/" target="blank_"><img src="assets/game.png" alt="Game" /></a>
                <p class="lead">All of my work can be found at my <a href="https://github.com/KoracIsidora" target="blank_">Git Hub</a> account.</p>
            </div>
        </section>
        <section id="contact" data-aos="fade-up">
            <h1>Contact</h1>
            <p class="lead">If you want to contact me, my email is korac.isidora@gmail.com, <br />
                but you can also send me a message here:
            </p>
            <?php if ($msg != '') : ?>
                <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            <?php endif; ?>
            <form method="post" class="lead" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                </div>
                <br>
                <button type="submit" name="submit" class="btn">SUBMIT</button>
            </form>
        </section>
        <footer class="lead">
            <label><a href="https://www.facebook.com/koraisidora" target="blank_">Facebook</a></label>
            <label><a href="https://www.instagram.com/isidora_kora/" target="blank_">Instagram</a></label>
            <label><a href="https://www.linkedin.com/in/isidora-korac-542522175/" target="blank_">LinkedIn</a></label>
            <label><a href="https://github.com/KoracIsidora" target="blank_">Git Hub</a></label>
            <label>&copy; Isidora Korac 2020</label>
        </footer>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 1000
            });
        </script>
        <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0.0/dist/smooth-scroll.polyfills.min.js"></script>
        <script type="text/javascript" src="index.js"></script>
</body>

</html>