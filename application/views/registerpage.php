<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</head>

<body class="login-body">
    <div class="container"
        style="min-height: 100%; min-height: 100vh; display: flex;text-align: center; align-items: center; vertical-align: middle;">
        <div class="card border-0 shadow my-5 my-auto">
            <div class="card-body my-5" style="display: inline-block;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo base_url('assets/loginill.png');?>" alt="" class="img-responsive" style="width: 500px; height: 500;">
                        </div>
                        <div class="col-md-6 border-dark border-left">
                            <!-- <img src="loginill.png" alt="" width=500> -->
                            <!-- Default form register -->
                            <form class="text-center border border-light p-5" action="#!">

                                <p class="h4 mb-4">Sign up</p>

                                <div class="form-row mb-4">
                                    <div class="col">
                                        <!-- First name -->
                                        <input type="text" id="defaultRegisterFormFirstName" class="form-control"
                                            placeholder="First name">
                                    </div>
                                    <div class="col">
                                        <!-- Last name -->
                                        <input type="text" id="defaultRegisterFormLastName" class="form-control"
                                            placeholder="Last name">
                                    </div>
                                </div>

                                <!-- E-mail -->
                                <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4"
                                    placeholder="E-mail">

                                <!-- Password -->
                                <input type="password" id="defaultRegisterFormPassword" class="form-control"
                                    placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                    At least 8 characters and 1 digit
                                </small>
                                <!-- Sign up button -->
                                <a href="<?php echo site_url('SuccessController/index'); ?>" target="_blank"><button class="btn btn-info my-4 btn-block" type="submit">Sign in</button></a>
                            </form>
                            <!-- Default form register -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>