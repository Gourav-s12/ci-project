
<html>
<head>
    <title>Email Form</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<div class="container" style="margin-top:20px;">
    <h2>Email Form</h2>
    <br>
    <?php echo form_open('Welcome/sendemail'); ?>
    <div class="form-group">
        <label for="email"><h6>Email address</h6></label>
        <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter email','name'=>'email','value'=>set_value('email')])?>
        <small id="emailHelp" class="form-text text-muted">This email will not be shared with anyone else.</small>
        <span class='text-danger'>
              <?php echo form_error('email')?>
              <br>
        </span>
    </div>
    <div class="form-group">
        <label for="name"><h6>Name</h6></label>
        <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter name','name'=>'name','value'=>set_value('name')])?>
        <span class='text-danger'>
              <?php echo form_error('name')?>
              <br>
        </span>
    </div>
    <div class="form-group">
        <label for="subject"><h6>Subject</h6></label>
        <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter name','name'=>'subject','value'=>set_value('subject')])?>
        <!--<input type="text" class="form-control" id="subject" placeholder="Subject">-->
        <span class='text-danger'>
              <?php echo form_error('subject')?>
              <br>
        </span>
    </div>
    <div class="form-group">
        <label for="msg"><h6>Message</h6></label>
        <textarea class="form-control" name="msg" id="msg" rows="3"><?php echo set_value('msg')?></textarea>
        <span class='text-danger'>
              <?php echo form_error('msg')?>
              <br>
        </span>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Send Email</button>
    <?php echo form_close(); ?>
</div>

</body>
</html>
