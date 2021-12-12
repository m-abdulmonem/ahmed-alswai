<?php
use MRDEVELOPER\Vendor\Language\Lang;
?>
<div class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid" src="data:image/jpeg;base64,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" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>This Is The First Slide</h3>
                    <p>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="..." alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>...</h3>
                    <p>...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="..." alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>...</h3>
                    <p>...</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="sections">
    <div class="container">

        <div id="about" class="section about">
            <div class="section-top">
                <h3 class="section-title"><?php echo Lang::lang("ABOUT_US")?></h3>
            </div>
            <div class="section-content">
                <div class="col-sm-3">
                    <div class="img">
                        <img src="/Site/images/index.jpeg" alt="Img" class="rounded-circle">
                    </div>
                </div>
                <div class="col-sm-8">
                    <h2>Entre Title Here</h2>
                    <p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <a href="#" class="btn btn-primary float-left">More AboutUS</a>
                </div>
            </div>
        </div>
        <!-- ./about -->
        <div id="suffle" class="section suffle">
            <div class="section-top">
                <h3 class="section-title"><?php echo Lang::lang("OUR_PROJECTS")?></h3>
            </div>

            <div class="section-content">
                <div class="container">

                    <div class="list">
                        <ul>
                            <li class="active">Category1</li>
                            <li>Category2</li>
                            <li>Category3</li>
                        </ul>
                    </div>
                    <center>
                        <div class="projects">
                            <div class="mix project">
                                <img src="/Site/images/index.jpeg" alt="Img1">
                                <h4>Project One</h4>
                                <p>Please Describ This Projrct Here </p>
                                <a class="btn btn-primary" href="#">Show</a>
                            </div>
                            <div class="mix project">
                                <img src="/Site/images/index.jpeg" alt="Img1">
                                <h4>Project Two</h4>
                                <p>Please Describ This Projrct Here </p>
                                <a class="btn btn-primary" href="#">Show</a>
                            </div>
                            <div class="mix project">
                                <img src="/Site/images/index.jpeg" alt="Img1">
                                <h4>Project Three</h4>
                                <p>Please Describ This Projrct Here </p>
                                <a class="btn btn-primary" href="#">Show</a>
                            </div>
                            <div class="mix project">
                                <img src="/Site/images/index.jpeg" alt="Img1">
                                <h4>Project Four</h4>
                                <p>Please Describ This Projrct Here </p>
                                <a class="btn btn-primary" href="#">Show</a>
                            </div>

                            <div class="mix project">
                                <img src="/Site/images/index.jpeg" alt="Img1">
                                <h4>Project Five</h4>
                                <p>Please Describ This Projrct Here </p>
                                <a class="btn btn-primary" href="#">Show</a>
                            </div>
                            <div class="mix project">
                                <img src="/Site/images/index.jpeg" alt="Img1">
                                <h4>Project Five</h4>
                                <p>Please Describ This Projrct Here </p>
                                <a class="btn btn-primary" href="#">Show</a>
                            </div>
                            <div class="mix project">
                                <img src="/Site/images/index.jpeg" alt="Img1">
                                <h4>Project Five</h4>
                                <p>Please Describ This Projrct Here </p>
                                <a class="btn btn-primary" href="#">Show</a>
                            </div>
                            <div class="mix project">
                                <img src="/Site/images/index.jpeg" alt="Img1">
                                <h4>Project Five</h4>
                                <p>Please Describ This Projrct Here </p>
                                <a class="btn btn-primary" href="#">Show</a>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <!-- ./suffle -->
        <div id="testimonials" class="section testimonials">
            <div class="section-top">
                <h3 class="section-title"><?php echo Lang::lang("TEST")?></h3>
            </div>
            <div class="section-content text-center testim">
               <div class="active">
                   <q>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                       consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                       cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</q>
                   <p>Mohamed</p>
               </div>
                <div>
                    <q>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</q>
                    <p>Ahmed</p>
                </div>
                <div>
                    <q>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</q>
                    <p>Ail</p>
                </div>
                <div>
                    <q>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</q>
                    <p>Ibrahim</p>
                </div>
                <div >
                    <q>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</q>
                    <p>Mohamed</p>
                </div>
                <div >
                    <q>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</q>
                    <p>Sara</p>
                </div>
            </div>
        </div>
        <!-- ./ testimonials -->
            <div class="home contact">
                <div class="section-top">
                    <h3 class="section-title"><?php echo Lang::lang("CONTACT_US") ?></h3>
                </div>
                <div class="section-content">
                    <div class="col-lg-4">
                        <div class="error-msg">

                        </div>
                        <div class="contact-form">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control name" name="name" placeholder="<?php echo Lang::lang("FULL_NAME") ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control email" name="email" placeholder="<?php echo Lang::lang("EMAIL") ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control sub" name="subject" placeholder="<?php echo Lang::lang("SUBJECT") ?>" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control msg" placeholder="<?php echo Lang::lang("MESSAGE_CONTENT") ?>" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary send" name="send" value="<?php echo Lang::lang("SEND") ?>">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.76983794852!2d31.18825199463881!3d30.05946979932545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2sCairo%2C+Cairo+Governorate!5e0!3m2!1sen!2seg!4v1496861896998" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


