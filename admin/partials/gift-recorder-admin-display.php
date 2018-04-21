<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <h1>Setting Page for Gift Recorder</h1>
    </div> <!-- /col -->
  </div> <!-- /row -->
  <div class="row">
    <div class="col col-md-6 input-panel">
      <div class="form-group row">
  <label for="text-input" class="col-2 col-form-label">Full Name</label>
  <div class="col-10">
    <input class="form-control" type="full-name" name="full-name" id="text-input">
  </div>
</div>
<div class="form-group row">
  <label for="search-input" class="col-2 col-form-label">Search</label>
  <div class="col-10">
    <input class="form-control" type="search" name="search" id="search-input">
  </div>
</div>
<div class="form-group row">
  <label for="email-input" class="col-2 col-form-label">Email</label>
  <div class="col-10">
    <input class="form-control" type="email" id="email-input">
  </div>
</div>
<div class="form-group row">
  <label for="url-input" class="col-2 col-form-label">URL</label>
  <div class="col-10">
    <input class="form-control" type="url" name="url" id="url-input">
  </div>
</div>
<div class="form-group row">
  <label for="tel-input" class="col-2 col-form-label">Telephone</label>
  <div class="col-10">
    <input class="form-control" type="tel" name="telephone" id="tel-input">
  </div>
</div>
<div class="form-group row">
  <label for="password-input" class="col-2 col-form-label">Password</label>
  <div class="col-10">
    <input class="form-control" type="password" name="password" id="password-input">
  </div>
</div>
<div class="form-group row">
  <label for="number-input" class="col-2 col-form-label">Number</label>
  <div class="col-10">
    <input class="form-control" type="number" name="number" id="number-input">
  </div>
</div>
<div class="form-group row">
  <label for="datetime-local-input" class="col-2 col-form-label">Date and time</label>
  <div class="col-10">
    <input class="form-control" type="datetime-local" name="datetime-local-input" id="datetime-local-input">
  </div>
</div>
<div class="form-group row">
  <label for="date-input" class="col-2 col-form-label">Date</label>
  <div class="col-10">
    <input class="form-control" type="date" name="date-input" id="date-input">
  </div>
</div>
<div class="form-group row">
  <label for="month-input" class="col-2 col-form-label">Month</label>
  <div class="col-10">
    <input class="form-control" type="month" name="month-input" id="month-input">
  </div>
</div>
<div class="form-group row">
  <label for="week-input" class="col-2 col-form-label">Week</label>
  <div class="col-10">
    <input class="form-control" type="week" name="week-input" id="week-input">
  </div>
</div>
<div class="form-group row">
  <label for="time-input" class="col-2 col-form-label">Time</label>
  <div class="col-10">
    <input class="form-control" type="time" name="time-input" id="time-input">
  </div>
</div>
<div class="form-group row text-center">
  <div class="col-5">
    <input class="form-control btn btn-primary" type="submit" name="submit" value="Save" id="submit">
  </div>
  <div class="col-5">
    <input class="form-control btn btn-secondary" type="button" name="reset" value="Reset" id="reset">
  </div>
</div>
  </div> <!-- /col -->
    </div> <!-- /row -->
</div> <!-- /container-fluid -->