<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Register</title>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="../resources/scripts/external/moment.js"></script>

    <link rel="stylesheet" href="../resources/stylesheets/registerForm.css">



</head>
<body>

    <div style="display:none" id="errorMessage" class="alert alert-danger"> </div>
    <div id="submitSuccessMessage" class="alert alert-success"<?php if($message=="" || $messageType!="success"){echo("style='display:none'");} ?>><h4><?php echo($message)?></h4></div>
    <div id="submitErrorMessage" class="alert alert-danger"<?php if($message=="" || $messageType!="error"){echo("style='display:none'");} ?>><h4><?php echo($message)?></h4></div>
    <div id="registration-form-holder" class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form id="registration-form" action="/register.php" method="post">
                    <div class="pannel-group">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title panel-title-primary text-center">Registration Form</h1>
                            </div>
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h1 class="panel-title panel-title-secundary text-center">Guest Information</h1>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label for="personalIdentification">Personal Identification:</label>
                                                <input id="personalIdentification" type="text" class="form-control" name="personalIdentification"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label for="firstName">First Name:</label>
                                                <input id="firstName" type="text" class="form-control" name="firstName"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label for="lastName">Last Name:</label>
                                                <input id="lastName" type="text" class="form-control" name="lastName"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label for="email">Email:</label>
                                                <input id="email" type="text" class="form-control" name="email"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label for="includeEmailList">Include in email list:</label>
                                                <input id="includeEmailList" type="checkbox" name="includeEmailList" value="0"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h1 class="panel-title panel-title-secundary text-center">Cruise Preference</h1>
                                    </div>
                                    <div class="panel-body">
                                        <div class="text-center row">
                                            <div class="col-sm-4 form-group">
                                                <label for="brandRoyal">Royal:</label>
                                                <input id="brandRoyal" type="radio" name="brand" value="R"/>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label for="brandAzamara">Azamara:</label>
                                                <input id="brandAzamara" type="radio" name="brand" value="Z"/>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label for="brandCelebrity">Celebrity:</label>
                                                <input id="brandCelebrity" type="radio" name="brand" value="C"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label for="ship">Select a ship:</label>
                                                <select id="ship" class="form-control" name="ship">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label for="sailDate">Select a sail date:</label>
                                                <input id="sailDate" type="date" class="form-control" name="sailDate"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h1 class="panel-title panel-title-secundary text-center">Comments</h1>
                                    </div>
                                    <div class="panel-body">
                                        <textarea rows="4" id="comments" class="form-control" name="comments" aria-label="comments"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" id="submitButton">Submit</button>
                                        <button class="btn btn-default" id="resetButton">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../resources/scripts/registerForm.js"></script>
</html>